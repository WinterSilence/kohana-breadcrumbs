<?php defined('SYSPATH') OR die('No direct script access.') ?>

<?php foreach ($breadcrumbs as $url => $name) $breadcrumbs[$url] = __(UTF8::ucfirst($name)) ?>
<?php if ( ! isset($separator) $separator = ' - ' ?>
<title><?php echo implode($separator, $breadcrumbs) ?></title>