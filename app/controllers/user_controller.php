<?php
class UserController extends AppController
{
    public function add_new()
    {
		$user = new User;
		$page = Param::get('page_next', 'add_new');

		switch ($page) {
		case 'add_new':
		    break;
		case 'add_new_end':
		    $user->username = Param::get('username');
		    $user->password = Param::get('password');
		    $user->password_check = Param::get('password_check');
		    
		    try{
			$user->add_new($user);

		    }catch (ValidationException $e){
			$page = 'add_new';
		    }
	            break;
		default:
		    throw new NotFoundException("{$page} is not found");
	            break;
		}
	        $this->set(get_defined_vars());
		    $this->render($page);

    }

    public function login()
    {
		$user = new User;
	        $page = Param::get('page_next', 'login');

		switch ($page){
		case 'login':
		    break;
		case 'login_end';
			$_SESSION['login_status'] = 'logging';

		    $user->username = Param::get('username');
		    $user_password = Param::get('password');
		    $hash_array = $user->get_hash_password();
		    $hash = $hash_array['password'];
	       
	        $user->password = verify_password($user_password, $hash);

	        $current_user = $user->allow_login();
	        
		    if ($current_user){
				$_SESSION['id'] = $current_user['id'];
				$_SESSION['username'] = $current_user['username'];
				$_SESSION['require_login'] = False;
				$_SESSION['login_status'] = 'logged';
		    }else{
				$_SESSION['login_status'] = 'failed';
				$page = 'login';

		    }
	            break;
		default:
		    throw new NotfoundException("{page} is not found");
		    break;
		}

		$this->set(get_defined_vars());
		$this->render($page);

    }

    public function logout()
    {
    	session_destroy();
    	header("Location:" . APP_BASE_PATH);
    	exit();
    }



}
?>