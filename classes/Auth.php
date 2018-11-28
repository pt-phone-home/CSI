<?php
/**
 * Authentication
 * 
 * Login and logout
 */
class Auth {

    /**
     * Return the user authenticaion status
     * 
     * @return boolean True if user is logged in , false otherwise.
     * 
     */

    public static function isLoggedIn() {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true;
    }

    /**
     * Require the user to be loggin in, stopped with an authorisation message if not
     * 
     * @return void 
     */
    public static function requireLogin() {
        if (!static::isLoggedIn()) {
            die('Unathorised, please log in using the admin page');
        }
    }

    /**
     * Log in using session
     * 
     * @return void
     */
    public static function login(){
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
    }

    public static function logout() {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 4200,
                $params['path'], $params['domain'], 
                $params['secure'], $params['httponly']
                );
        };

        session_destroy();

    }
}