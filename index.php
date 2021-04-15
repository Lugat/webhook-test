<?php

  function verifySignature($payloadBody)
  {

    if (isset($_SERVER['HTTP_X_HUB_SIGNATURE_256'])) {
      
      $secret = 'betoka32';
            
      return $_SERVER['HTTP_X_HUB_SIGNATURE_256'] === $signature = hash_hmac('sha1', $payloadBody, $secret);

    }

    return false;

  }
  
  $payloadBody = file_get_contents('php://input');
  
  file_put_contents('github', var_export(json_decode($payloadBody), true));
  file_put_contents('server', var_export($_SERVER, true));
  
  if (verifySignature($payloadBody)) {
    
    file_put_contents('success', 1);
    
  } else {
    
    file_put_contents('error', 0);
    
  }