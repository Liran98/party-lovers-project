<?php



class Session
{
    public $role;
    public $user_id;
    private $signed_in = false;

    function __construct()
    {
        session_start();
        $this->check_login();
        $this->check_user_role();
    }

    public function login($user)
    {
        if ($user) {
            $this->role = $_SESSION['role'] = $user->user_role;
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }


    public function logout()
    {
        unset($_SESSION['role']);
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
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

    public function check_user_role()
    {
        if (isset($_SESSION['role'])) {
            $this->role = $_SESSION['role'];
        }else{
            unset($_SESSION['role']);
        }
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }
} //end of Session class
$session = new Session();
