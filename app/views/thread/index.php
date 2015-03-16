<h1>All Threader</1>

<ul>
    <?php foreach ($threads as $v): ?>
	<li><a href="<?php eh('thread/view', array('thread_id' => $v->id))"><?php eh($v->title) ?></a></li>
    <?php endforeach ?>

</ul>