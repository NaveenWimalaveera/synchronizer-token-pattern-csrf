<?php


    session_start();//session start
    if(empty($_SESSION['key']))
    {
        $_SESSION['key']= base64_encode(openssl_random_pseudo_bytes(32));//Create CSRF Token key
    }
    $token = $_SESSION['key'].",";
    $_SESSION['CSRF'] = $token; //store CSRF token in session variable

    ob_start();
    echo $token;

    if(isset($_POST['loginsubmit'])) //validating login
            {
                if($_POST['user_name'] =="admin" && $_POST['password'] =="admin@123") //loggin user
                {
                    echo$_SESSION['CSRF'];
                    header( "Location:home.php" );

                }
                else
                {
                    header( "Location:index.php?er" );
                }
            }



if(isset($_POST['submit'])) //check comment was submited
    {
        ob_end_clean();
        sessionvalidate($_POST['CSR'],$_COOKIE['session_id']); //validates the csrf and session

    }


    function sessionvalidate($user_CSRF,$user_sessionID)
    {
        if($user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
        {
            unset($_SESSION['key']);//deleting session
            header( "Location:other/success.html" );
        }
        else
        {
            header( "Location:other/error.html" );
        }
    }

?>
