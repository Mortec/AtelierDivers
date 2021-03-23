<?php

namespace App\Utils;

use \App\Models\User as User;


abstract class UserSession {

    // Constante contenant l'index du tableau de session
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Méthode permettant de connecter un utilisateur
     * 
     * @param \App\Models\User $user
     */
    public static function connect( User $user) {
        
        $_SESSION[self::SESSION_INDEX_NAME]['user_id'] = $user->id;
        $_SESSION[self::SESSION_INDEX_NAME]['firstname'] = $user->firstname;
        $_SESSION[self::SESSION_INDEX_NAME]['lastname'] = $user->lastname;
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect()
    {

        $_SESSION[self::SESSION_INDEX_NAME] = null;
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à son compte
     * 
     * @return bool
     */
    public static function isConnected()
    {
   
        return isset($_SESSION[self::SESSION_INDEX_NAME])?true:false;//bool;
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     * 
     * @return \App\Models\User
     */
    public static function getUser()
    {

        return User::find( $_SESSION[self::SESSION_INDEX_NAME]['user_id'] );//\App\Models\User
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     * 
     * @return bool
     */
    public static function isAdmin()
    {
        
        return ( self::getUser()->role == 'admin' );//bool
    }


        /**
     * Méthode permettant de stocker les données d'un score dans la session 
     * 
     * 
     */
    public static function setScore( $scoredatas )
    {
        if ( self::isConnected() ) {

            $_SESSION[self::SESSION_INDEX_NAME]['scoredatas'] = $scoredatas;
        }
    }


            /**
     * Méthode permettant de récupérer les données d'un score dans la session 
     * 
     * @return Array
     */
    public static function getScore()
    {
        if ( self::isConnected() && isset( $_SESSION[self::SESSION_INDEX_NAME]['scoredatas'] )) {

            $scoredatas = $_SESSION[self::SESSION_INDEX_NAME]['scoredatas'];

            return $scoredatas;
        }
    }
}