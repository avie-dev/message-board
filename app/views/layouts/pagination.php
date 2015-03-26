<?php if($pagination->current > 1): ?>
    <a href='?page=<?php echo $pagination->prev ?>'>Previous</a>
<?php else: ?>
    Previous
<?php endif ?>

<?php for($i = 1; $i <= $last; $i++): ?>
    <?php if($i == $page): ?>
       <?php echo $i ?>
    <?php else: ?>
       <a href='?page=<?php echo $i ?>'><?php echo $i ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if(!$pagination->is_last_page): ?>
   <a href='?page=<?php echo $pagination->next ?>'>Next</a>
<?php else: ?>
    Next
<?php endif; ?>