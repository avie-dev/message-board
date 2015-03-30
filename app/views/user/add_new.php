<h1>新規登録</h1>
<?php if ($user->hasError()): ?>
<div class="alert alert-block">
    <h4 class="alert-heading">検証エラー!</h4>
    <?php if(!empty($user->validation_errors['username']['length'])): ?>
    <div><em>ユーザ名</em> は
        <?php eh($user->validation['username']['length']['min']) ?> 〜
        <?php eh($user->validation['username']['length']['max']) ?> 文字以内で入力してください。
    </div>
    <?php endif ?>

    <?php if(!empty($user->validation_errors['password']['length'])): ?>
    <div><em>パスワード</em> は
        <?php eh($user->validation['password']['length']['min']) ?> 〜
        <?php eh($user->validation['password']['length']['max']) ?> 文字以内で入力してください。
    </div>
    <?php endif ?>

    <?php if(!empty($user->validation_errors['password_check']['match'])): ?>
    <div>
        <em>パスワード</em> が一致していません。
    </div>
    <?php endif ?>
</div>
<?php endif ?> 

<form class="form" method="post" action="<?php eh(url('user/add_new'))?>">
    <label><strong>ユーザ名</strong></label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <p><em>※ 1〜32文字以内で入力してください。</em></p><hr />
    <label><strong>パスワード</strong></label>
    <input type="password" class="span2" name="password" value="<?php eh(Param::get('password'))?>" >
    <p><em>※ 6〜12文字以内で入力してください。</em></p><hr />
    <label><strong>確認用パスワード</strong></label>
    <input type="password" class="span2" name="password_check" value="<?php eh(Param::get('password_check'))?>">
    <br />
    <input type="hidden" name="page_next" value="add_new_end">
    <button type="submit" class="btn btn-primary">登録する</button>
</form>