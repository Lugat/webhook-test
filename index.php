<?php

  $json = file_get_contents('php://input');
  $data = json_decode($data);
  
  file_put_contents('github', var_export($json, true));
  file_put_contents('server', var_export($_SERVER, true));