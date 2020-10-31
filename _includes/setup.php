<?php

/* -------------------------------------------------------------------------- */

ob_start();
header('Content-Type: text/html; charset=utf-8');

set_time_limit(0);
ini_set('memory_limit', -1);

ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);
session_start();

date_default_timezone_set('Europe/London');
setlocale(LC_ALL, 'en_US.utf-8');
$today = date('Y-m-d');
$modified = date('Y-m-d H:i:s');
$now = time();

require '../vendor/autoload.php';
use ipinfo\ipinfo\IPinfo;

include('languages.php');
include('functions.php');

/* -------------------------------------------------------------------------- */
/* LOCATION HANDLING                                                          */
/* -------------------------------------------------------------------------- */

if (isset($_GET['clear']) && $_GET['clear'] == 1) {
  session_destroy();
}

if (isset($_GET['setcountry']) && strlen($_GET['setcountry']) == 2) {
  $_SESSION['country'] = strtolower($_GET['setcountry']);
}

if (empty($_SESSION['country']) || $_SESSION['country'] == '') {
  $country = get_country(get_ip(),$countries);
  $_SESSION['country'] = $country;
}

/* -------------------------------------------------------------------------- */

?>
