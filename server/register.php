<?php
// echo 5657574;

require_once ("function.php");

include "config.php";
// exit;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Credentials: true");
header("Content-Type:application/json");
header('Content-Type: text/html; charset=utf-8');


$email1 = $tel1 = [0];
// var_dump($_REQUEST);
foreach ($_REQUEST as $key => $value) 
{
    // var_dump($_REQUEST);
    if ($key =="register") 
    {
        $registerdata=$value;
        $registerdata=json_decode($registerdata,TRUE);

        // define('FILTER_SANITIZE_STRING' , 513 );
        if (is_array($registerdata) || is_object($registerdata)) 
        {
            foreach ($registerdata as $r) 
            {
                if ($r['name'] == "fname") 
                {
                    $fname=$r['value'];
                    $fname = preg_replace("/(?<!\s);(?!\s)/", "" , $fname);
                }
                if ($r['name'] == "lname") 
                {
                    $lname=$r['value'];
                    $lname = preg_replace("/(?<!\s);(?!\s)/", "", $lname);
                }
                if ($r['name'] == "email") 
                {
                    $email=$r['value'];
                    $email = preg_replace("/(?<!\s);(?!\s)/", "", $email);
                }
                if ($r['name'] == "tel") 
                {
                    $tel=$r['value'];
                    $tel = preg_replace("/(?<!\s);(?!\s)/", "", $tel);
                }
                if ($r['name'] == "password") 
                {
                    $password=$r['value'];
                    $password = preg_replace("/(?<!\s);(?!\s)/", "", $password);
                }
            }
        }
        if (!empty($fname) && !empty($lname) && !empty($email) && !empty($tel)  && !empty($password))
        {
            $query = "SELECT * FROM register";
            $result = mysqli_query($connection, $query);
    
            if (mysqli_num_rows($result) == 0) 
            {
                first_insert($connection , $fname , $lname , $email , $tel , $password );
            }
            else
            {
                select($connection);
    
                check_information($result,$email,$tel);
            } 
        }
        else 
        {
            $json=array('status'=>TRUE , 'data'=>"فیلد ها نمیتواند خالی باشد");
            $out=json_encode($json);
            echo $out;
        }
    }
}


?>