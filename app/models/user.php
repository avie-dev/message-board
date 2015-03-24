<?php

class User extends AppModel
{
    public $validation = array(
       'username' => array(
	   'length' => array(
	       'validate_between', 6, 32,
	   ),
       ),
       'password' => array(
	    'length' => array(
	       'validate_between', 6, 12,
	    ),
       ),
       'password_check' => array(
	     'match' => array(
	       'confirm_password',
	     ),
       ),
    );

    public function add_new($user)
    {
	$this->validation['password_check']['match'][] = $this->password;
	$this->validation['password_check']['match'][] = $this->password_check;

	$this->validate();
	if ($this->hasError() || $user->hasError()){
		throw new ValidationException('invalid user');
	}

	$db = DB::conn();
	$db->begin();

	$db->query('INSERT INTO user SET username = ?, password = ?, created = NOW()', array($this->username, $this->password)); 

	$db->commit();
    }


} 