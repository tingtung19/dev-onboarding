<?php
/**
 * Description : add all functionalities in here MF
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );

class customLogin
{
    protected $email;
    protected $password;
    protected $remember;
    public $message;

    public function getData($email, $password){
        $this->username = $email;
        $this->password = $password;

        return $this->Login();
    }

    public function Login(){

        $username=$this->username;
        $password=$this->password;
        $login_array=array(
            'user_login' => $username,
            'user_password' => $password,
        );

        $verify_user = wp_signon($login_array, true);
        if (!is_wp_error($verify_user)) {
            echo "<script>alert('Login Berhasil')</script>";
            echo "<script>window.location='".site_url()."/wp-admin/'</script>";
            
        }else{
            echo "<p>Invalid Login</p>";
        }              
    }  
}