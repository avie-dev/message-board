<h1>New User Registration</h1>
<?php if ($user->hasError()): ?>
<div class="alert alert-block">
    <h4 class="alert-heading">Validation error!</h4>
    <?php if(!empty($user->validation_errors['username']['length'])): ?>
    <div><em>Username</em> must be
        between
        <?php eh($user->validation['username']['length'][1]) ?> and
        <?php eh($user->validation['username']['length'][2]) ?> characters in length.
    </div>
    <?php endif ?>

    <?php if(!empty($user->validation_errors['password']['length'])): ?>
    <div><em>Password</em> must be
        between
        <?php eh($user->validation['password']['length'][1]) ?> and
        <?php eh($user->validation['password']['length'][2]) ?> characters in length.
    </div>
    <?php endif ?>

    <?php if(!empty($user->validation_errors['password_check']['match'])): ?>
    <div>
        <em>Password</em> does not match.
    </div>
    <?php endif ?>
</div>
<?php endif ?> 

<form class="well" method="post" action="<?php eh(url('user/add_new'))?>">
    <label><strong>Username</strong></label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <p><em>※ Enter characters in between 6 to 32.</em></p><hr />
    <label><strong>Password</strong></label>
    <input type="password" class="span2" name="password" value="<?php eh(Param::get('password'))?>" >
    <p><em>※ Enter characters in between 6 to 12.</em></p><hr />
    <label><strong>Confirm Password </strong></label>
    <input type="password" class="span2" name="password_check" value="<?php eh(Param::get('password_check'))?>">
    <br />
    <input type="hidden" name="page_next" value="add_new_end">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>