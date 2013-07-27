<?php
define('ITADMINISTRATION', 1);

require ('config.php');

loadDir(LIB_DIR, array(LIB_DIR . 'smarty'));

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

function configureRedBean() {
    R::setup();
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

$smarty = createSmarty();

$smarty->testInstall();


