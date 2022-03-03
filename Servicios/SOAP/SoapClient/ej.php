<?php

if(isset($_GET['a']) && isset($_GET['b'])){
    $client= new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

    echo $_GET['a'].' + '.$_GET['b'].' = '.$client->Add([
        'intA'=>$_GET['a'],
        'intB'=>$_GET['b']
    ])->AddResult;

    echo '<br>';

    echo $_GET['a'].' : '.$_GET['b'].' = '.$client->Divide([
        'intA'=>$_GET['a'],
        'intB'=>$_GET['b']
    ])->DivideResult;

    echo '<br>';

    echo $_GET['a'].' x '.$_GET['b'].' = '.$client->Multiply([
        'intA'=>$_GET['a'],
        'intB'=>$_GET['b']
    ])->MultiplyResult;

    echo '<br>';

    echo $_GET['a'].' - '.$_GET['b'].' = '.$client->Subtract([
        'intA'=>$_GET['a'],
        'intB'=>$_GET['b']
    ])->SubtractResult;
    
}else{
    echo '<h1>Introduce algo en la url</h1>';
}


?>