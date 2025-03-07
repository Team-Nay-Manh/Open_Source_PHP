<?php
function getViewPage($path)
{
  // $path = 'HS-GS/pages/' . $page . '.php';
  if (file_exists($path)) return $path;
  return '';
}

function generateRandomString($length = 10)
{
  $characters = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function str_replace_first($from, $to, $content)
{
  $from = '/' . preg_quote($from, '/') . '/';
  return preg_replace($from, $to, $content, 1);
}

function strposa(string $haystack, array $needles, int $offset = 0): bool
{
  foreach ($needles as $needle) {
    if (strpos($haystack, $needle, $offset) !== false) {
      return true; // stop on first true result
    }
  }
  return false;
}

function fixSqlInjection($str)
{
  // abc\okok -> abc\\okok
  //abc\okok (user) -> abc\okok (server) -> sql (abc\okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
  //abc\okok (user) -> abc\okok (server) -> convert -> abc\\okok -> sql (abc\\okok) -> chinh xac
  $str = str_replace('\\', '\\\\', $str);
  //abc'okok -> abc\'okok
  //abc'okok (user) -> abc'okok (server) -> sql (abc'okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
  //abc'okok (user) -> abc'okok (server) -> convert -> abc\'okok -> sql (abc\'okok) -> chinh xac
  $str = str_replace('\'', '\\\'', $str);

  return $str;
}

function getCOOKIE($key)
{
  // $key = strtolower($key);
  $value = '';
  if (isset($_COOKIE[$key])) {
    $value = $_COOKIE[$key];
  }
  // return fixSqlInjection($value);
  return $value;
}
function getSESSION($key)
{
  // $key = strtolower($key);
  $value = '';
  if (isset($_SESSION[$key])) {
    $value = $_SESSION[$key];
  }
  // return fixSqlInjection($value);
  return $value;
}
function getGET($key)
{
  // $key = strtolower($key);
  $value = '';
  if (isset($_GET[$key])) {
    $value = $_GET[$key];
  }
  // return fixSqlInjection($value);
  return $value;
}
function getPOST($key)
{
  // $key = strtolower($key);
  $value = '';
  if (isset($_POST[$key])) {
    $value = $_POST[$key];
  }
  // return fixSqlInjection($value);
  return $value;
}
function getREQUEST($key)
{
  // $key = strtolower($key);
  $value = '';
  if (isset($_REQUEST[$key])) {
    $value = $_REQUEST[$key];
  }
  // return fixSqlInjection($value);
  return $value;
}

function formatPrice($price)
{
  return number_format($price, 0, ',', '.');
}

function curl($url)
{
  $ch = @curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}

function getUrl()
{
  // $uri = $_SERVER['REQUEST_URI'];
  // echo $uri; // Outputs: URI

  // $query = $_SERVER['QUERY_STRING'];
  // echo $query; // Outputs: Query String

  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

  $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  return $url; // Outputs: Full URL
}

function get_client_ip()
{
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

function dec2bin($n, $l = 8)
{
  $n = decbin($n);
  $len = $l - strlen($n);
  for ($i = 0; $i < $len; $i++) {
    $n = '0' . $n;
  }
  return $n;
}
