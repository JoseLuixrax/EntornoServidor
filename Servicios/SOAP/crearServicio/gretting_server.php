<?php

class GreetingServer {

    function sayHello(string $name):string{
        return "Hola $name";
    }

    function sayGoodbye(string $name):string{
        return "Adios $name";
    }
}

$server= new SoapServer(__DIR__."/grettings.wsdl");

$server->setClass(GreetingServer::class);
$server->handle();