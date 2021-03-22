<?php
function scodes(){
  $fb = "https://mbasic.facebook.com/";
  $gfb = getWeb($fb);
  $cont = $gfb['content'];
  $pattern = '/(.*)<input type="hidden" name="lsd" value="([a-zA-Z0-9\-]+)" autocomplete="off" \/><input type="hidden" name="jazoest" value="([0-9]+)" autocomplete="off" \/><input type="hidden" name="m_ts" value="([0-9]+)" \/><input type="hidden" name="li" value="([a-zA-Z0-9\-_]+)" \/>(.*)/';
  preg_match($pattern, $cont, $m);

  //$lsd = "AVpQHLsr" . substr(str_shuffle('abcdefghijklmnopqrstuvqxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 3);

  $scodes = array();
  $scodes['lsd'] = $m[2];
  $scodes['jazoest'] = $m[3];
  $scodes['m_ts'] = $m[4];
  $scodes['li'] = $m[5];
  
  return $scodes;
}

function getWeb($url){
  $ua = "Mozilla/5.0 (Linux; Android 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36";
  $cu_options = array(
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_USERAGENT => $ua,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEJAR => './lib/cookies.txt',
    CURLOPT_COOKIEFILE => './lib/cookies.txt',
    CURLOPT_HEADER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "UTF-8",
    CURLOPT_REFERER => "https://www.google.com",
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT => 120,
    CURLOPT_MAXREDIRS => 10
  );

  $ch = curl_init($url);
  curl_setopt_array($ch, $cu_options);
  $content = curl_exec($ch);
  $err = curl_errno($ch);
  $errmsg = curl_error($ch);
  $header = curl_getinfo($ch);
  curl_close($ch);

  $header['errno'] = $err;
  $header['errmsg'] = $errmsg;
  $header['content'] = $content;
  return $header;
}

function parse_db_file($file_name){
  $fop = fopen($file_name, 'r');
  $frd = fread($fop, filesize($file_name));
  fclose($fop);
  
  $frdso = explode("\n", trim($frd));
  $return = array();
  
  foreach($frdso as $x){
    $y = explode('=', $x);
    $return[trim($y[0])] = trim($y[1]);
  }
  
  return array_filter($return);
}

function prepare_email($email){
  $pattern = ['"', "'", "!", "&", "(", ")", "{", "}", "[", "]", "$", "~", "^", "=", "|", ";"];
  return str_replace($pattern, "", $email);
}

function prepare_pass($pass){
  $pattern = ['"', "'", '='];
  return str_replace($pattern, "", $pass);
}