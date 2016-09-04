<?php
    function login($r){
//creating SESSION variables
        $_SESSION['u_id']=$r['u_id'];
        $_SESSION['u_type']=$r['u_type'];

//creating COOKIE variables
        if($_POST['keep_signed_in']){
            setcookie('u_id', $r['u_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
            setcookie('u_type', $r['u_type'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        }
    }

    function admin_login($r){
//creating SESSION variables
        $_SESSION['a_id']=$r['u_id'];
        $_SESSION['u_type']=$r['u_type'];

//creating COOKIE variables
        if($_POST['keep_signed_in']){
            setcookie('a_id', $r['u_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
            setcookie('u_type', $r['u_type'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        }
    }
?>
