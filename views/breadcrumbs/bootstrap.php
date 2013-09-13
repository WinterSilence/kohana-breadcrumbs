<?php defined('SYSPATH') OR die('No direct script access.') ?>

<?php if (isset($breadcrumbs) AND $total > 1): ?>

	<ol class="breadcrumb">
	<?php $cnt = 1 ?>
	<?php foreach ($breadcrumbs as $url => $name): ?>

		<?php if ($cnt++ < $total): ?>
		<li><?php echo HTML::anchor($url, __(UTF8::ucfirst($name))) ?></li>
		<?php else: ?>
		<li class="active"><?php echo __(UTF8::ucfirst($name)) ?></li> 
		<?php endif ?>

	<?php endforeach ?>
	</ol>

<?php endif ?>