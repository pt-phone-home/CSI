<?php 

$base = strtok($_SERVER['REQUEST_URI'],'?');

?>




<?php if ($paginator->previous_page):?>
<a href="<?= $base ; ?>?page=<?= $paginator->previous_page;?>">Previous</a>
<?php else: ?>
Previous
<?php endif ;?>
<?php if ($paginator->next_page): ?>
<a href="<?= $base; ?>?page=<?= $paginator->next_page;?>">Next</a>
<?php else: ?>
Next
<?php endif ;