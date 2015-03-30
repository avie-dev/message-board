<?php
class Thread extends AppModel
{

     public $validation = array(
         'title' => array(
		     'length'=> array(
		     	'type' => 'validate_between', 
		     	'min' => 1, 
		     	'max' => 30,
		      ),
		 ),
     );

     public function create(Comment $comment)
     {
		 $this->validate();
		 $comment->validate();
		 if ($this->hasError() || $comment->hasError()){
		     throw new ValidationException('invalid thread or comment');
		 }
		 $db = DB::conn();
		 $db->begin();

		 $params = array(
			 'title' => $this->title,
			 'owner' => $this->owner,
		 );
		 $db->insert('thread', $params);
		 //$db->query('INSERT INTO thread SET title = ?, created = NOW()', array($this->title));
		 $this->id = $db->lastInsertId();

		 //write first comment at the same time
		 $this->write($comment);

		 $db->commit();
     }
 

    public static function getAll($limit)
    {
        $threads = array();
		$db = DB::conn();
		$rows = $db->rows("SELECT * FROM thread {$limit}");

		foreach ($rows as $row){
		    $threads[] = new Thread($row);
	    }

		return $threads;
    }

    public static function get($id)
    {
        $db = DB::conn();
		$row = $db->row('SELECT * FROM thread WHERE  id = ?', array($id));
		return new self($row);
    }

    public static function getComments($id, $limit)
    {
		$comments = array();
		$db = DB::conn();
		$rows = $db->rows(
		 "SELECT * FROM comment WHERE thread_id = ? ORDER BY created ASC {$limit} ",
		array($id)
		);

		foreach ($rows as $row){
			$comments[] = new Comment($row);
		}
	 	return $comments;
     }

    public static function getCommentCount($id)
    {
    	$db = DB::conn();
    	$rows = $db->value(
		 'SELECT COUNT(id) FROM comment WHERE thread_id = ? ',
		 array($id)
		);
		return $rows;
    }

    public function write(Comment $comment)
     {
	 	if (!$comment->validate()){
	         throw new ValidationException('invalid comment');
	 	}
	 	$db = DB::conn();
	 	$db->query(
	         'INSERT INTO comment SET thread_id = ?, username = ?, body = ?, created = NOW()',
	         array($this->id, $comment->username, $comment->body)
	 	);
	     
     }

    public static function getThreadCount()
    {
    	$db = DB::conn();
    	$rows = $db->value('SELECT COUNT(id) FROM thread');
    	return $rows;
    }

}
