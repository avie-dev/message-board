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



}
?>