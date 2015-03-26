<?php if(isset($_SESSION['require_login'])):
      if ($_SESSION['require_login'] == "create"):?>
	<div class="alert alert-block">
	    <h4 class="alert-heading"> ログインが必要です。</h4>
	</div>
<?php $_SESSION['require_login']= ""; endif; endif; ?>

<h1>ログイン<h1>

<form class="form" method="post" action="<?php eh(url('user/login'))?>">
<label>ユーザ名：</label>
<input type="text" class="span2" name="username" value="<?php eh(Param::get('username'))?>">
<label>パスワード：</label>
<input type="password" class="span2" name="password" value="<?php eh(Param::get('password'))?>">
<br />
<input type="hidden" name="page_next" value="login_end">
<button type="submit" class="btn btn-primary">ログイン</button>
</form>