<?php
// Path relative to domain
// if site is located under localhost/itadmin/, RELATIVE_PATH should be itadmin/
// if its located under localhost/, RELATIVE_PATH should be empty
define('RELATIVE_PATH', 'itadmin/');

define('HOME_DIR', realpath(dirname(__FILE__)) . '/');
define('LIB_DIR', HOME_DIR . 'lib/');
define('PAGE_DIR', HOME_DIR . 'page/');
define('SMARTY_DIR', LIB_DIR . 'smarty/');

define('DB_HOST', 'localhost');
define('DB_NAME', 'itv_v1');
define('DB_USER', 'entwickler');
define('DB_PASS', 'entwickler12');

define('PASSWORD_COST', 12);

?>