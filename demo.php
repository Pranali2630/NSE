<?php
      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL, 'https://www.nseindia.com/#nse-market-turnover'); 
      curl_setopt($ch, CURLOPT_HEADER, 1); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
      $data = curl_exec(); 
      curl_close($ch); 

?>