<?php
require ('config.php');

$validPages = array();

function addPageClass($className) {
    $validPages[] = $className;
}

loadDir(HOME_DIR . 'exceptions/');
loadDir(LIB_DIR, array(LIB_DIR . 'smarty'));
loadDir(PAGE_DIR);

define('DEFAULT_PAGE', 'Login');

/**
 * Loads all PHP files in a given directory and its sub-directories, excluding files and directories (if specified).
 *
 * @param string $directory the directory to
 * @param array $excluded (optional)
 */
function loadDir($directory, array $excluded = array())
{
    $files = scandir($directory);
    $subDirs = array();
    
    foreach ($files as $file)
    {
        
        // skip meta files, hidden files, and excluded directories.
        if (strncmp($file, '.', 1) == 0 || in_array($directory . $file, $excluded))
        {
            continue;
        }
        
        if (is_dir($directory . $file))
        {
            $subDirs[] = $directory . $file . '/';
            continue;
        }
        
        // load the target file
        require_once ($directory . $file);
    }
    
    foreach ($subDirs as $subDir)
    {
        loadDir($subDir, $excluded);
    }
}

/**
 * Returns content from GET array stored under $key or null if $key cant be found.
 *
 * @param string $key
 * @param mixed $default (optional) default value if $key cannot be found
 * @return (string &#124; NULL)
 */
function getVar($key, $default = null)
{
    if (isset($_GET[$key]) === true)
        return $_GET[$key];
    return $default;
}

/**
 * Returns content from POST array stored under $key or null if $key cant be found.
 *
 * @param string $key
 * @param mixed $default (optional) default value if $key cannot be found
 * @return (string &#124; NULL)
 */
function postVar($key, $default = null)
{
    if (isset($_POST[$key]) === true)
        return $_POST[$key];
    return $default;
}

/**
 * Returns content from POST array stored under $key or null if $key cant be found.
 *
 * @param string $key
 * @param string $default (optional) default value if $key cannot be found
 * @return (string &#124; NULL)
 */
function sessionVar($key, $default = null)
{
    if (isset($_SESSION[$key]) === true)
        return $_SESSION[$key];
    return $default;
}

/**
 */
function verifySession()
{
    $userId = sessionVar('user');
    if ($userId !== null)
    {
        return true;
    }
    return false;
}

/**
 * Configures RedBean for use.
 *
 * Specifies database connection information, turns on caching, and specifies how tables are mapped to classes in PHP.
 */
function configureRedBean()
{
    R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    R::$writer->setUseCache(true);
    RedBean_ModelHelper::setModelFormatter(new ITAdminModelFormatter());
}

/**
 * Creates a Smarty instance and configures it for immediate use.
 *
 * @return Smarty the new Smarty instance.
 */
function createSmarty()
{
    $smarty = new Smarty();
    
    $smarty->setTemplateDir(HOME_DIR . 'templates');
    $smarty->setCompileDir(HOME_DIR . 'smarty/templates_c');
    $smarty->setCacheDir(HOME_DIR . 'smarty/cache');
    $smarty->setConfigDir(HOME_DIR . 'smarty/configs');
    
    return $smarty;
}

session_start();
configureRedBean();
$smarty = createSmarty();

$pageName = getVar('page', DEFAULT_PAGE);
if (verifySession() == false || in_array($pageName, $validPages) == false) {
    $pageName = DEFAULT_PAGE;
}
$page = new $pageName();

//$smarty->testInstall();
$smarty->assign($page->getContent());
$smarty->display($page->getTemplate());

