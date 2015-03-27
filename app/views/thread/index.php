<h1 align="center">スレッド一覧</h1>
		
<div class="table-spacer" align="center">
	<table border="1" width="80%"> <?php foreach ($threads as $v): ?>
		<tr>
		  <td class="icon"></td>
		  <td class="cell-spacer">
		  
		      <a href="<?php eh(url('thread/view', array('thread_id' => $v->id)))?>"><?php eh($v->title)?></a>
		   
		      <div>

		      </div>
		  </td>
		  <td class="cell-spacer-min"> 
		      <p>[作成者] <?php eh($v->owner)?><br />
		         [作成日]<?php eh($v->created)?></p>
		  </td>
		</tr> <?php endforeach ?>

	</table>
</div>

<div align="center">  
	<p><?php include_once APP_DIR.'views/layouts/pagination.php' ?></p>
	<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>" >新規スレッドを作成</a>
</div>
