<?php
require_once ("function.php");
include "config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Content-Type:application/json");

$email=[0];

foreach ($_REQUEST as $key => $value) 
{
    $password=null;

    if ($key =="login") 
    {  
        $login=$value;
        $login=json_decode($login,TRUE);

        if (is_array($login) || is_object($login)) 
        {
            foreach ($login as $e) 
            {
                if ($e['name'] == "email") 
                {
                    $email=$e['value'];
                }
                if ($e['name'] == "password") 
                {
                    $password=$e['value'];
                }
            }
        }

        $sql ="SELECT * FROM register where `email`='$email' ";

        if (mysqli_query($connection,$sql) )
        {   
            passverify($connection , $password , $sql);
        }
        else
        {
            echo mysqli_error($connection);
        }  

    }
}


?>