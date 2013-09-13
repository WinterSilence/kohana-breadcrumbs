<?php defined('SYSPATH') OR die('No direct script access.') />

<?php if (isset($breadcrumbs)): ?>
	<?php foreach ($breadcrumbs as $url => $name): ?>
		<?php $breadcrumbs[$url] = __(UTF8::ucfirst($name) ?>
	<?php endforeach ?>
	<?php if ( ! isset($separator)) $separator = ' - ' ?>
	<?php echo implode($separator, $breadcrumbs) ?>
<?php endif ?>
