<?php
class Comment extends AppModel
{
    public $validation = array (
       'username' => array(
             'length'=> array(
		     	'type' => "validate_between", 
		     	'min' => 1, 
		     	'max' => 16,
		      ),
   		 ),

        'body' => array(
		     'length'=> array(
		     	'type' => "validate_between", 
		     	'min' => 1, 
		     	'max' => 200,
		      ),
   		 ),
     );

}