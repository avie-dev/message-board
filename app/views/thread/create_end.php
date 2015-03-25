<h2><?php eh($thread->title) ?></h2>
<p class="alert alert-success">
新規スレッドが作成されました。
</p>

<a href="<?php eh(url('thread/view', array('thread_id' => $thread->id))) ?>">
	 &larr;スレッド一覧に戻る
</a>