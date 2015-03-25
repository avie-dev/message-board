<h2><?php eh($thread->title) ?> </h2>

<?php if ($comment->hasError()): ?>
<div class="alert alert-block">

    <h4 class="alert-heading"> 検証エラー！ </h4>

    <?php if (!empty($comment->validation_errors['username']['length'])): ?>
        <div> <em>ユーザ名</em> は
          <?php eh($comment->validation['username']['length'][1]) ?> 〜
          <?php eh($comment->validation['username']['length'][2])?> 文字以内で入力してください。
        </div>

    <?php endif ?>
    <?php if (!empty($comment->validation_errors['body']['length'])): ?>
        <div> <em>コメント</em> は
           <?php eh($comment->validation['body']['length'][1]) ?>
            〜
           <?php eh($comment->validation['body']['length'][2]) ?> 文字以内で入力してください。
        </div>
    <?php endif ?>
</div>
<?php endif ?>

<form class="form" method="post" action="<?php eh(url('thread/write')) ?>" >
    <label>ユーザ名： </label>
    <input type = "text" name="username" 
    value="<?php if(!isset($_SESSION['username'])):
              eh(Param::get('username'));         
          else:
               eh(trim($_SESSION['username']));
          endif
        ?>
     ">
    <label>コメント：</label>
    <textarea name="body"> <?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
    <input type="hidden" name="page_next" value="write_end">
    <button type="submit" class="btn btn-primary">投稿する</button>
</form> 