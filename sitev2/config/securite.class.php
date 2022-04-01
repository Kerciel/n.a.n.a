<?php

class securite {
    public static function SecuriteHTML($string)
    {
        return htmlentities($string);
    }

    public static function SecuriteCookiePassword()
    {
        $_SESSION['acces'] = 'admin';
        $ticket = session_id().microtime().rand(0,99999999999);
        $ticket = hash("sha512", $ticket);
        setcookie(COOKIE_PROTECT, $ticket, time() + (60*60*24));
        $_SESSION[COOKIE_PROTECT] = $ticket;
    }

    public static function verificationCookie()
    {
        if($_COOKIE[COOKIE_PROTECT] === $_SESSION[COOKIE_PROTECT])
        {
           securite::SecuriteCookiePassword();
            return true;
        }
        else {
            session_destroy();
            throw new Exception("vous avez pas le droit d etre là!");
        }
    }
    public static function verifConnexion()
    {
        if(isset($_SESSION['acces']) && !empty($_SESSION['acces']) && $_SESSION['acces'] === 'admin')
    {
        
        return true;
       
        
    }
    }

    public static function verificationConnexion()
    {
        if(self::verifConnexion() && self::verificationCookie())
    {
        
        return true;
       
        
    }
    }
}