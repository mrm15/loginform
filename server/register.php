<?php
// include ("function.php");
// include "config.php";


// header("Access-Control-Allow-Origin: *");
//  header("Access-Control-Allow-Headers: access");
//   header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
//   header("Access-Control-Allow-Credentials: true");
//  header("Content-Type:application/json");
// header('Content-Type: text/html; charset=utf-8');


// $email1 = $tel1 = [0];
// foreach ($_REQUEST as $key => $value) 
// {
//     if ($key =="register") 
//     {
//         $registerdata=$value;
//         $registerdata=json_decode($registerdata,TRUE);
//         if (is_array($registerdata) || is_object($registerdata)) 
//         {
//             foreach ($registerdata as $r) 
//             {
//                 if ($r['name'] == "fname") 
//                 {
//                     $fname=$r['value'];
//                     $fname = preg_replace("/(?<!\s);(?!\s)/", "" , $fname);
//                 }
//                 if ($r['name'] == "lname") 
//                 {
//                     $lname=$r['value'];
//                     $lname = preg_replace("/(?<!\s);(?!\s)/", "", $lname);
//                 }
//                 if ($r['name'] == "email") 
//                 {
//                     $email=$r['value'];
//                     $email = preg_replace("/(?<!\s);(?!\s)/", "", $email);
//                 }
//                 if ($r['name'] == "tel") 
//                 {
//                     $tel=$r['value'];
//                     $tel = preg_replace("/(?<!\s);(?!\s)/", "", $tel);
//                 }
//                 if ($r['name'] == "password") 
//                 {
//                     $password=$r['value'];
//                     $password = preg_replace("/(?<!\s);(?!\s)/", "", $password);
//                 }
//             }
//         }

//         if (!empty($fname) && !empty($lname) && !empty($email) && !empty($tel)  && !empty($password))
//         {

//             $query = "SELECT * FROM register";
//             $result = mysqli_query($connection, $query);
    
//             if (mysqli_num_rows($result)  ==  0) 
//             {
//                 // first_insert($connection , $fname , $lname , $email , $tel , $password );
//                 $pass=password_hash($password , PASSWORD_DEFAULT );
                
//                 $sql = "INSERT INTO register (`fname` , `lname` , `email` , `tel` , `password`) VALUES ('$fname' , '$lname' , '$email' , '$tel' , '$pass')";

//                 if (mysqli_query($connection, $sql)) 
//                 {
//                     $json=array('status'=>TRUE , 'data'=>"اطلاعات کاربری شما با موفقیت ثبت شد");
//                     $out=json_encode($json);
//                     echo $out;
//                 } 
//             }
//             else
//             {
//                 // select($connection);
//                 // $check=check_information($result,$email,$tel);
//                 // if ($check) 
//                 // {
//                 //     second_insert($fname, $lname , $email , $email1 , $tel ,$tel1 , $password , $connection);
//                 // }

//                 $sql1 = " SELECT  `tel`,`email` FROM register";
            
//                 $result=mysqli_query($connection,$sql1);
        
//                 if (mysqli_num_rows($result) != 0 ) 
//                 {
//                     $result=mysqli_fetch_all($result , MYSQLI_ASSOC);  

//                     foreach ($result as $o) 
//                     {
//                             $email1=$o['email'];
//                             $tel1=$o['tel'];
        
//                                 if($email1 == $email) 
//                                 {
//                                     $messagg=array('status'=>FALSE , 'data'=>"ایمیل شما تکراری است");
//                                     $ppaya=json_encode($messagg , JSON_PRESERVE_ZERO_FRACTION|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
//                                     echo $ppaya;
//                                     return;
//                                 }
//                                 if($tel1 == $tel) 
//                                 {
//                                     $messagg=array('status'=>FALSE , 'data'=>"شماره تلفن شما تکراری است");
//                                     $paya=json_encode($messagg , JSON_PRESERVE_ZERO_FRACTION| JSON_UNESCAPED_SLASHES| JSON_UNESCAPED_UNICODE);
//                                     echo $paya;
//                                     return;
//                                 }
//                     }

//                     if ( $email1 !== $email  &&  $tel1 !== $tel) 
//                     {
//                         $pass=password_hash($password , PASSWORD_DEFAULT );
            
//                         $sql = "INSERT INTO register (`fname` , `lname` , `email` , `tel` , `password`) VALUES ('$fname' , '$lname' , '$email' , '$tel' , '$pass')";
                    
//                         if (mysqli_query($connection, $sql)) 
//                         {
//                             $messagg=array('status'=>TRUE , 'data'=>"اطلاعات کاربری شما با موفقیت ثبت شد");
//                             $paya=json_encode($messagg);
//                             echo $paya;
//                         } 
//                     }
//                 }
//             } 
//         }
//         else 
//         {
//             $json=array('status'=>FALSE , 'data'=>"فیلد ها نمیتواند خالی باشد");
//             $out=json_encode($json);
//             echo $out;
//         }
//     }
// }


//__________________________________________________


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
            $query = "SELECT * FROM register WHERE `tel`='$tel' || `email`='$email'";
            $result = mysqli_query($connection, $query);
    
            if (mysqli_num_rows($result)  ===  0) 
            {
                $pass=password_hash($password , PASSWORD_DEFAULT );
                
                $sql = "INSERT INTO register (`fname` , `lname` , `email` , `tel` , `password`) VALUES ('$fname' , '$lname' , '$email' , '$tel' , '$pass')";

                if (mysqli_query($connection, $sql)) 
                {
                    $json=array('status'=>TRUE , 'data'=>"اطلاعات کاربری شما با موفقیت ثبت شد");
                    $out=json_encode($json);
                    echo $out;
                } 
            }
            else
            {
                $sql1 = " SELECT  `tel`,`email` FROM register";
            
                $result=mysqli_query($connection,$sql1);
        
                if (mysqli_num_rows($result) != 0 ) 
                {
                    $result=mysqli_fetch_all($result , MYSQLI_ASSOC);  

                    foreach ($result as $o) 
                    {
                        $email1=$o['email'];
                        $tel1=$o['tel'];

                        if($email1 == $email) 
                        {
                            $messagg=array('status'=>FALSE , 'data'=>"ایمیل شما تکراری است");
                            $ppaya=json_encode($messagg , JSON_PRESERVE_ZERO_FRACTION|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                            echo $ppaya;
                            return;
                        }
                        if($tel1 == $tel) 
                        {
                            $messagg=array('status'=>FALSE , 'data'=>"شماره تلفن شما تکراری است");
                            $paya=json_encode($messagg , JSON_PRESERVE_ZERO_FRACTION| JSON_UNESCAPED_SLASHES| JSON_UNESCAPED_UNICODE);
                            echo $paya;
                            return;
                        }
                    }
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