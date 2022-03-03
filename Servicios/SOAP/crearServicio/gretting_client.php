<?php

if(isset($_GET['name'])){
    ini_set('soap.wsdl_cache_enabled', false);

    $client = new SoapClient('grettings.wsdl');

    echo $client->sayHello($_GET['name']);
}else{
    echo '<form action="gretting_client.php" method="GET">
        <input type="text" name="name">
        <input type="submit">
    </form>';
}
