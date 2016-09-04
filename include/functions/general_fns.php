<?php

    function sanitize($c,$data){
        return(mysqli_real_escape_string($c,trim($data)));
    }

    function displayErrors($error_msgs){
        echo "<ul class=\"error_msg\"><li>".implode("</li><li>",$error_msgs)."</li></ul>";
    }

    function isLoggedIn(){
        return (isset($_SESSION['u_id'])?true:false);
    }

    function isAdminLoggedIn(){
        return (isset($_SESSION['a_id'])?true:false);
    }
?>
