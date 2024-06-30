<?php



class Session
{

    public $user_id;
    public $signed_in = false;

    function __construct()
    {
        session_start();
        $this->check_login();
    }

    public function login($user)
    {
        if ($user) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }


    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
        session_destroy();
    }

    private function check_login()
    {

        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function is_signed_in(){
        return $this->signed_in;
    }
} //end of Session class
$session = new Session();
