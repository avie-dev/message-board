<h1>Login<h1>
<!--<?php if (!$_SESSION['login_succeed']): ?>
<div class="alert alert-block">
    <h4 class="alert-heading"> Login Failed! </h4>
    <div>Incorrect username or password </div>
</div> -->
<?php endif ?>
<form class="well" method="post" action="<?php eh(url(user/login))?>">
<label>Username</label>
<input type="text" class="span2" name="username" value="<?php eh(Param::get('username'))?>">
<label>Password</label>
<input type="password" class="span2" name="password" value="<?php eh(Param::get('password'))?>">
<br />
<input type="hidden" name="page_next" value="login_end">
<button type="submit" class="btn btn-primary">Submit</button>
</form>