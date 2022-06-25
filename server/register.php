<?php

include "function.php";
include "config.php";


header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
  header("Access-Control-Allow-Credentials: true");
 header("Content-Type:application/json");
header('Content-Type: text/html; charset=utf-8');


$email1 = $tel1 = [0];
foreach ($_REQUEST as $key => $value) 
{
    if ($key =="register") 
    {
        $registerdata=$value;
        $registerdata=json_decode($registerdata,TRUE);
        if (is_array($registerdata) || is_object($registerdata)) 
        {
            foreach ($registerdata as $r) 
            {
                if ($r['name'] == "fname") 
                {
                    $fname=$r['value'];
                    $fname = preg_replace("/(?<!\s);(?!\s)/", "" , $fname);
                    $fname = preg_replace('/[0-9]+/', '', $fname);
                }
                if ($r['name'] == "lname") 
                {
                    $lname=$r['value'];
                    $lname = preg_replace("/(?<!\s);(?!\s)/", "", $lname);
                    $lname = preg_replace('/[0-9]+/', '', $lname);
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
                    if (strlen($tel) < 11 || strlen($tel) > 11 && $tel[0] == 0) 
                    {
                        $json=array('status'=>FALSE , 'data'=>"شماره تلفن حتما باید 11 رقم باشد و با صفر شروع شود");
                        $out=json_encode($json);
                        echo $out;
                        exit;
                    }
                }
                if ($r['name'] == "password") 
                {
                    $password=$r['value'];
                    $password = preg_replace("/(?<!\s);(?!\s)/", "", $password);
                
                    if (strlen($password) < 8) 
                    {
                        $json=array('status'=>FALSE , 'data'=>"رمز عبور باید حداقل شامل 8 کاراکتر باشد");
                        $out=json_encode($json);
                        echo $out;
                        exit;
                    }
                }
            }
        }

        if (!empty($fname) && !empty($lname) && !empty($email) && !empty($tel)  && !empty($password))
        {
            $query = "SELECT * FROM register WHERE `tel`='$tel' || `email`='$email'";
            $result = mysqli_query($connection, $query);
    
            if (mysqli_num_rows($result)  ===  0) 
            {
                insert($password , $fname , $lname , $email , $connection , $tel);
            }
            else
            {
                $sql1 = " SELECT  `tel`,`email` FROM register";
            
                $result=mysqli_query($connection,$sql1);
        
                if (mysqli_num_rows($result) != 0 ) 
                {
                    $result=mysqli_fetch_all($result , MYSQLI_ASSOC);
                    check_email_tel($result , $email , $tel);  
                }
            } 
        }
        else 
        {
            $json=array('status'=>FALSE , 'data'=>"فیلد ها نمیتواند خالی باشد");
            $out=json_encode($json);
            echo $out;
        }
    }
}

?>