<?php

function first_insert($connection , $fname , $lname , $email , $tel , $password )
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

function select($connection)
{

    $sql1 = " SELECT  `tel`,`email`,`password` FROM register";
        
    $result=mysqli_query($connection,$sql1);

    if (mysqli_num_rows($result) !=0 ) 
    {
        $result=mysqli_fetch_all($result , MYSQLI_ASSOC);
        
    }

}

function check_information($result,$email,$tel)
{
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


            function second_insert($fname, $lname , $email , $email1 , $tel ,$tel1 , $password , $connection)
            {
                if ( $email1!=$email  &&  $tel1!=$tel) 
                {
                    $pass=password_hash($password , PASSWORD_DEFAULT );

                    $sql = "INSERT INTO register (`fname` , `lname` , `email` , `tel` , `password`) VALUES ('$fname' , '$lname' , '$email' , '$tel' , '$pass')";
                
                    if (mysqli_query($connection, $sql)) 
                    {
                        $messagg=array('status'=>TRUE , 'data'=>"اطلاعات کاربری شما با موفقیت ثبت شد");
                        $paya=json_encode($messagg);
                        echo $paya;
                    } 
                }
            }

}


//_______________________________________________________________________LOGIN_______________________________________________________________________


function passverify($connection , $password , $sql)
{
    $result=mysqli_query($connection,$sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $data=mysqli_fetch_assoc($result);

        if (password_verify($password , $data['password'])) 
        {
            $_SESSION['Id']=$data['id'];
            $_SESSION['name']=$data['fname'];

            $messagg=array('status'=>TRUE , 'data'=>"شما وارد شدید");
            $payaa=json_encode($messagg);
            echo $payaa;
        }
        else 
        {
            $messagg=array('status'=>FALSE , 'messagee'=>"رمز عبور نادرست است");
            $payaa=json_encode($messagg);
            echo $payaa;
        }
    }
    else 
    {
        $messagg=array('status'=>FALSE , 'messagee'=>"کاربر با این مشخصات وجود ندارد");
        $payaa=json_encode($messagg);
        echo $payaa;
    } 
}






// _______________________________________________________________________Forgetpass_______________________________________________________________________

// function


?>