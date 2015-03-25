<h1><?php eh($thread->title) ?></h1>
<?php foreach ($comments as $k => $v): ?>
<div class="comment">
     <div class="meta">
        <?php eh($k + 1)  ?>: <?php eh($v->username) ?> <?php eh($v->created)?>
     </div>
     <div class="view-comment-box">
        <?php echo readable_text($v->body) ?>
     </div>

</div>
<?php endforeach ?>


<form class="form" method="post" action="<?php eh(url('thread/write')); ?>" >
    <hr>
    <label>ユーザ名：</label>
    <input type = "text" name="username" 
    value="<?php if(!isset($_SESSION['username'])):
              eh(Param::get('username'));         
          else:
               eh(trim($_SESSION['username']));
          endif
        ?>
     ">

    <label>コメント：</label>
    <textarea name="body"><?php eh(Param::get('body')) ?> </textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
    <input type="hidden" name="page_next" value="write_end">
    <button type="submit" class="btn btn-primary">投稿する</button>
</form> 
