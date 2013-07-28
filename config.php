<?php
// Path relative to domain
// if site is located under localhost/itadmin/, RELATIVE_PATH should be itadmin/
// if its located under localhost/, RELATIVE_PATH should be empty
define('RELATIVE_PATH', 'itadmin/');

define('HOME_DIR', realpath(dirname(__FILE__)) . '/');
define('LIB_DIR', HOME_DIR . 'lib/');
define('PAGES_DIR', HOME_DIR . 'pages/');
define('MODULES_DIR', HOME_DIR . 'modules/');
define('SMARTY_DIR', LIB_DIR . 'smarty/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'itv_v1');
define('DB_USER', 'entwickler');
define('DB_PASS', 'entwickler12');

define('PASSWORD_COST', 12);


define('DEBUG', false);
define('DEBUG_REDBEAN', false || DEBUG);
define('DEBUG_SMARTY', false || DEBUG);

?>