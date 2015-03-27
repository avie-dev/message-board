<?php if($pagination->current > 1): ?>
    <a href='?page=<?php echo $pagination->prev ?>'>前のページ</a>
<?php else: ?>
    前のページ
<?php endif ?>
｜
<?php for($i = 1; $i <= $last; $i++): ?>
    <?php if($i == $page): ?>
       <strong><?php echo $i ?></strong> 
    <?php else: ?>
       <a href='?page=<?php echo $i ?>'><?php echo $i ?></a>
    <?php endif; ?> |
<?php endfor; ?>

<?php if(!$pagination->is_last_page): ?>
   <a href='?page=<?php echo $pagination->next ?>'>次のページ</a>
<?php else: ?>
    次のページ
<?php endif; ?>