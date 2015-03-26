<h1> スレッドを作成</h1>

<?php if($thread->hasError() || $comment->hasError()): ?>
<div class="alert alert-block">

    <h4 class="alert-heading"> 検証エラー! </h4>
    <?php if (!empty($thread->validation_errors['title']['length'])): ?>
        <div><em>タイトル</em> は
            <?php eh($thread->validation['title']['length']['min'])?> 〜
            <?php eh($thread->validation['title']['length']['max']) ?> 文字以内で入力してください。
        </div>
    <?php endif ?>

<?php if (!empty($comment->validation_errors['username']['length'])): ?> 
        <div><em>お名前</em> は
            <?php eh($comment->validation['username']['length']['min']) ?> 〜
            <?php eh($comment->validation['username']['length']['max']) ?> 文字以内で入力してください。
        </div>
    <?php endif ?>

    <?php if (!empty($comment->validation_errors['body']['length'])):?>
        <div><em>コメント<em> は
            <?php eh($comment->validation['body']['length']['min']) ?> 〜
            <?php eh($comment->validation['body']['length']['max']) ?> 文字以内で入力してください。
        </div>
<?php endif ?>
</div>

<?php endif ?>

<form class="form" method="post" action="<?php eh(url(''))?>">
    <label>タイトル：</label>
    <input type="text" class="span2" name="title" value="<?php eh(Param::get('title')) ?>">
    <label>ユーザ名：</label>
    <input type = "text" name="username" 
    value="<?php if(!isset($_SESSION['username'])):
              eh(Param::get('username'));         
          else:
               eh(trim($_SESSION['username']));
          endif
        ?>
     ">
    <label>コメント</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="page_next" value="create_end">
    <button type="submit" class="btn btn-primary"> 投稿する </button>			 
</form>