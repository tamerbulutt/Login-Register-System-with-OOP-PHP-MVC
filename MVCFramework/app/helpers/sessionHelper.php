<?php
    //Session'u başlatıp sessionda kullanıcı olup olmadığını kontrol ediyoruz.
    session_start();
    
    if(isset($_SESSION['user_id']))
        return true;
    else    
        return false;