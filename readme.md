### Breadcrumbs navigation module for Kohana framework 3

Breadcrumbs is indicate the current page's location within a navigational hierarchy.
Supports localization titles and generate URL based on URI.

To use, download the source, extract and rename to `breadcrumbs`. 
Move that folder into your modules directory and activate in your bootstrap.

### Usage:

Sets:
<pre>
Breadcrumbs::set('/', 'Home');
Breadcrumbs::set(array('/' => 'Home', '/articles/' => 'Articles'));
</pre>

Auto sets (used controller data):
<pre>
Breadcrumbs::set_auto($controller_object);
/** 
 * Controller: Article, action: edit:
 * Added '/article/' => 'Article' and  '/article/edit/' => 'Edit'
 * 
 * Controller: Article, action: index(default action):
 * Added only '/article/' => 'Article'
 */
</pre>

Gets:
<pre>
$breadcrumbs = Breadcrumbs::get();
$breadcrumb = Breadcrumbs::get('/articles/');
</pre>

Gets or sets default View template name:
<pre>
$this->template->set_filename(Breadcrumbs::template());
Breadcrumbs::template('breadcrumbs/bootstrap');
</pre>

Use HMVC request for get breadcrumbs block in your View\Controller:
<pre>
echo Request::factory('breadcrumbs')->execute()->body();
</pre>
Also you can set View template and add breadcrumbs, for send data use GET method:
<pre>
$data = array(
	'template' => 'breadcrumbs_template_path',
	'items' => array(
		'/posts/'    => 'Posts',
		'/post/124/' => 'Post 124 title',
	),
);
echo Request::factory('breadcrumbs')->query($data)->execute()->body();
</pre>