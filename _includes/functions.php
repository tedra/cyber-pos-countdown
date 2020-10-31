<?php

/* -------------------------------------------------------------------------- */

function get_ip() {
  if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && $_SERVER['HTTP_CF_CONNECTING_IP'] <> '') {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
  } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && $_SERVER['HTTP_X_REAL_IP'] <> '') {
    $ip = $_SERVER[HTTP_X_REAL_IP];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

/* -------------------------------------------------------------------------- */

function get_country($ip,$countries) {
  $access_token = 'a650a14fc5fe9f';
  $client = new ipinfo\ipinfo\IPinfo($access_token);

  $details = $client->getDetails($ip);

if (empty($details->country) || $details->country == '' || !in_array($details->country,$countries))
  $details->country = 'gb';
  return strtolower($details->country);
}

/* -------------------------------------------------------------------------- */


?>
