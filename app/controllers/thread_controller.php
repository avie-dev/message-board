<?php
class ThreadController extends AppController
{
    public function index()
    {
        //add pagination
        /*$page = Param::get('page',1);
        $per_page = 5;

        $pagination = new SimplePagination($page, $per_page);

        */
        $threads = Thread::getAll();
	    $this->set(get_defined_vars());
	    $this->render();
    }

    public function view()
    {
        $thread = Thread::get(Param::get('thread_id'));
        $comments = $thread->getComments();
	    $this->set(get_defined_vars());

    }
    public function write()

    {
        $thread = Thread::get(Param::get('thread_id'));
        $comment = new Comment;
        $page = Param::get('page_next');
        switch ($page) {
        case 'write_end':
     	    $comment->username = Param::get('username');
       	    $comment->body = Param::get('body');
	    try{
        	$thread->write($comment);
	    }catch (ValidationException $e){
		 $page = 'write';
	    }
       	    break;
        default:
      	    throw new NotFoundException("{$page} is not found");
       	    break; 
       }

        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function create()
    {
	$thread = new Thread;
	$comment = new Comment;
	$page = Param::get('page_next', 'create');

    if(!isset($_SESSION['username'])){
        header("Location:" . APP_BASE_PATH . 'user/login');
        $_SESSION['require_login'] = true;
        exit();
    }

	switch($page){
        case 'create':
	    break;
	case 'create_end':
	    $thread->title = Param::get('title');
        $thread->owner = Param::get('username');
	    $comment->username = Param::get('username');
	    $comment->body = Param::get('body');
	    try{
		$thread->create($comment);
	    }catch (ValidationException $e){
		    $page = 'create';
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
