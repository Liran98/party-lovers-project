<?php



class Session
{

    public $user_id;
    public $signed_in = false;

    function __construct()
    {

        session_start();
    }

    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['id'] = $user->id;
            $this->signed_in = true;
        }
    }


    public function logout()
    {
        unset($_SESSION['id']);
        $this->signed_in = false;

    }
} //end of Session class
$session = new Session();
