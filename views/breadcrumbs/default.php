<?php defined('SYSPATH') OR die('No direct script access.') ?>

<?php if ($total > 1): ?>
	<ul class="f-breadcrumbs">
	<?php $cnt = 1 ?>
	<?php foreach ($breadcrumbs as $url => $name): ?>
		<?php if ($cnt++ < $total): ?>
		<li><?php echo HTML::anchor($url, __(UTF8::ucfirst($name))) ?></li>
		<?php else: ?>
		<li class="cur"><?php echo __(UTF8::ucfirst($name)) ?></li> 
		<?php endif ?>
	<?php endforeach ?>
	</ul>
<?php endif ?>