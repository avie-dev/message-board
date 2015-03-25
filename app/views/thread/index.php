<h1 align="center">All threads</h1>
		
<div class="table-spacer" align="center">
	<table border="1" width="80%"> <?php foreach ($threads as $v): ?>
		<tr>
		  <td class="icon"></td><td class="cell-spacer"><a href="<?php eh(url('thread/view',array('thread_id' => $v->id)))?>"><?php eh($v->title)?></a></td>
		</tr> <?php endforeach ?>
	</table>
</div>

<div align="center">  
	<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>" >Create</a>
</div>
