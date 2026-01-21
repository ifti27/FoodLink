<?php
session_start();
require_once("../model/signUp.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        $hasErr=false;
        $user=$_POST['usertype'];
        $email=$_POST['email'];
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $addr=$_POST['addr'];
        $pass=$_POST['pass'];
        $conpass=$_POST['conpass'];
        $namereg="/^[a-zA-Z' -]+$/";
        $passreg='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        if(empty($user))
            {
                $haserr=true;
                $_SESSION['userErr']="Select user type";
            }
        if(empty($name))
            {
                $haserr=true;
                $_SESSION['nameErr']="name can not be empty";
            }
        else
        {
            if(!preg_match($namereg,$name))
                {
                    $hasErr=true;
                    $_SESSION['nameErr']="name can not contain number or symbol";
                }
        }
        if(empty($email))
            {
                $hasErr=true;
                $_SESSION['emailErr']="email can not be empty";
            }
        else
            {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $hasErr=true;
                        $_SESSION['emailErr']="enter a valid email";
                    }
            }
        if(empty($addr))
            {
                $hasErr=true;
                $_SESSION['addrErr']="address can not be empty";
            }
        else
            {
                if(strlen($addr)>300)
                    {
                        $hasErr=true;
                        $_SESSION['addrErr']="address is too long";
                    }
            }
        if(empty($phone))
            {
                $hasErr=true;
                $_SESSION['phoneErr']="phone can not be empty";
            }
        else
            {
                if(is_nan($phone)||strlen($phone)>11||strlen($phone)<11)
                    {
                        $hasErr=true;
                        $_SESSION['phoneErr']="enter a valid phone number";
                    }
            }
        if(empty($pass))
            {
                $hasErr=true;
                $_SESSION['passErr']="password can not be empty";
            }
        else
            {
                if(!preg_match($passreg,$pass))
                    {
                        $hasErr=true;
                        $_SESSION['passErr']="enter a valid password";
                    }
                elseif(strlen($pass)>16)
                    {
                        $hasErr=true;
                        $_SESSION['passErr']="password should be less than 16 character";
                    }
            }

        if($conpass!==$pass)
            {
                $hasErr=true;
                $_SESSION['conpassErr']="password didn't match";
            }
        else
            {
                if($user=="admin")
                    {
                        $role=1;
                    }
                elseif($user=="donor")
                    {
                        $role=2;
                    }
                else
                {
                    $role=3;
                }


                if ($hasErr) {
                    header("Location: ../view/login/signUp.php");
                    exit();
                }
                $uniqueID = random_int(10000000, 99999999);
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                $_SESSION['uniqueID']=$uniqueID;
                $status=insertUser($email, $name, $phone, $addr,$hashed_pass,$role,$uniqueID);
                if($status)
                    {
                        echo "
                        <script>
                            alert('Registration Successful!\\n\\nYour Unique ID is: $uniqueID\\n\\nPlease save this ID for password reset.');
                            window.location.href = '../view/login/signIn.php';
                        </script>
                        ";
                        exit();
                    }
                else
                    {
                        echo "database error";
                    }
            }
    }
?>