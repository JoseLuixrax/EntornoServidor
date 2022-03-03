<?php

if(isset($_GET['a']) && isset($_GET['b'])){
    $msgSoap= <<<EOD
    <?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
      <soap:Body>
        <Add xmlns="http://tempuri.org/">
          <intA>{$_GET['a']}</intA>
          <intB>{$_GET['b']}</intB>
        </Add>
      </soap:Body>
    </soap:Envelope>
    EOD;

    $curl=curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$msgSoap,
        CURLOPT_HTTPHEADER => [
            'Content-Type: text/xml; charset=utf-8',
        ]]);
    
    $response=curl_exec($curl);
    curl_close($curl);
    //var_dump($response);
    $preg_match=[];
    preg_match('/<AddResult>(.*?)<\/AddResult>/', $response, $preg_match);
    echo "La suma de ". $_GET['a']." y de ".$_GET['b']." es ".$preg_match[1]."\n";
}


?>