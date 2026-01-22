<?php
session_start();
    require_once("../model/usermodel.php");
    if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $emailErr;
            $passErr;
            $hasErr=false;
            $_SESSION['user']=$_POST['usertype'];
            $_SESSION['email']=$_POST['email'];
            $_SESSION['pass']=$_POST['pass'];
            if(empty($_SESSION['user']))
                {
                    $hasErr=true;
                    $_SESSION['userErr']="select your role";
                }
            if(empty($_SESSION['email']))
                {
                    $hasErr=true;
                    $_SESSION['emailErr']="email can not be empty";
                }
            if(empty($_SESSION['pass']))
                {
                    $hasErr=true;
                    $_SESSION['passErr']="password can not be empty";
                }
            if(!empty($_POST["rmbrme"]))
                {
                    setcookie("email",$_SESSION['email'],time()+(86400*30),"/");
                    setcookie("pass",$_SESSION['pass'],time()+(86400*30),"/");
                    setcookie("usertype",$_SESSION['user'],time()+(86400*30),"/");
                }
            else {
                if (isset($_COOKIE["email"])) {
                    setcookie("email", "", time() - 3600, "/");
                }
                if (isset($_COOKIE["pass"])) {
                    setcookie("pass", "", time() - 3600, "/");
                }
            }
            if ($hasErr) {
                    header("Location: ../view/login/signIn.php");
                    exit();
                }
            else
            {
                if($_SESSION['user']=="admin")
                    {
                        $role=1;
                    }
                elseif($_SESSION['user']=="donor")
                    {
                        $role=2;
                    }
                else
                {
                    $role=3;
                }
                $user=authuser($_SESSION['email'],$_SESSION['pass'],$role);
                if($user)
                {
                        if($user['role']==1)
                            {
                                $_SESSION['name']=$user['name'];
                                $_SESSION['role']=$user['role'];
                                $_SESSION['email']=$user['email'];
                                header("Location:../view/admin/dashboard.php");
                                exit();
                            }
                        elseif($user['role']==2)
                            {
                                $_SESSION['name']=$user['name'];
                                $_SESSION['role']=$user['role'];
                                $_SESSION['email']=$user['email'];
                                header("Location:../view/donor/dashboard.php");
                                exit();
                            }
                        elseif($user['role']==3)
                            {
                                $_SESSION['name']=$user['name'];
                                $_SESSION['role']=$user['role'];
                                $_SESSION['email']=$user['email'];
                                header("Location:../view/Receiver/dashboard/browse.php");
                                exit();
                            }
                        
                }
                else
                    {
                        $errorMsg = "Invalid credentials";
                        header("Location: ../view/login/signIn.php?genErr=" . urlencode($errorMsg));
                        exit();
                        
                    }
            }
        }
?>