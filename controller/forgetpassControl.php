<?php
session_start();
require_once("../model/forgetpassmodel.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $hasErr = false;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['code'] = $_POST['code'];
        $_SESSION['pass'] = $_POST['pass'];
        $_SESSION['conpass'] = $_POST['conpass'];
        $_SESSION['user'] = $_POST['usertype'];
        $user= $_SESSION['user'];
        $email=$_SESSION['email'];
        $code=$_SESSION['code'];
        $pass=$_SESSION['pass'];
        $conpass=$_SESSION['conpass'];
        $passreg='/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        if(empty($user))
            {
                $_SESSION['userErr'] = "select your role";
                $hasErr = true;
            }
        if(empty($email))
            {
              $hasErr = true;
              $_SESSION['emailErr'] = "email can not be empty";
            }
        else
            {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $hasErr = true;
                        $_SESSION['emailErr'] = "enter a valid email";
                    }
            }
        if(empty($pass))
            {
                $hasErr = true;
                $_SESSION['passErr'] = "pass can not be empty";
            }
        else{
            if(!preg_match($passreg,$pass))
                {
                    $hasErr = true;
                    $_SESSION['passErr'] = "enter a valid password";
                }
        }
        if(empty($conpass))
            {
                $hasErr = true;
                $_SESSION['conpassErr']="confirm password can not be empty";
            }
        else
            {
                if($conpass!=$pass)
                    {
                        $hasErr = true;
                        $_SESSION['conpassErr'] = "password did not match";
                    }
            }
        if(empty($code))
            {
                $hasErr = true;
                $_SESSION['codeErr'] ="code can not be empty";
            }
        else
            {   
                if(strlen($code)<8 || strlen($code)>8)
                    {
                        $hasErr = true;
                        $_SESSION['codeErr'] = "code must be 8 digit";
                    }
            }
        if($hasErr)
            {
                header("Location: ../view/login/forgotpass.php");
                exit();
                
            }
        else
            {
                $codev=validate($email,$code,$user);
                if($code)
                    {
                        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                        insertpass($email,$hashed_pass,$user);
                        header("Location:../view/login/signIn.php");
                        exit();
                    }
                else
                {
                    $_SESSION['err']="validation failed";
                    header("Location:../view/login/forgotpass.php");
                }
            }
    }
?>