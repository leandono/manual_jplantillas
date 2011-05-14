<?php

// no direct access
defined('_JEXEC') or die;
?>

<ul class="stats-module<?php echo $moduleclass_sfx ?>">
<?php foreach ($list as $item) : ?>
	<li>
		<p><?php echo $item->title;?>: <?php echo $item->data;?></p>
	</li>
<?php endforeach; ?>
</ul>

