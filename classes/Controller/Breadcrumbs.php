<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Breadcrumbs is indicate the current page's location within a navigational hierarchy.
 *
 * @package    Breadcrumbs
 * @category   Controller
 * @author     WinterSilence <info@handy-soft.ru>
 * @copyright  (c) 2013 handy-soft.ru
 * @license    http://kohanaframework.org/license
 * @link       http://github.com/WinterSilence/kohana-breadcrumbs
 */
class Controller_Breadcrumbs extends Controller_Template {

	/**
	 * @var  View  page template
	 */
	public $template = NULL;

	/**
	 * Loads the template [View] object.
	 */
	public function before()
	{
		if ($this->request->is_initial() OR $this->request->is_external())
		{
			throw HTTP_Exception::factory(403, 'Breadcrumbs: initial or external request');
		}
		parent::before();
	}

	/**
	 * Create breadcrumbs content block
	 */
	public function action_index()
	{
		// Set template
		if ($template = $this->request->query('template'))
		{
			Breadcrumbs::template($template);
		}
		$this->template->set_filename(Breadcrumbs::template());
		
		// Add breadcrumb items
		if ($items = $this->request->query('items'))
		{
			Breadcrumbs::set($items);
		}
		// Send breadcrumbs in View
		$this->template->breadcrumbs = Breadcrumbs::get();
		$this->template->total = count(Breadcrumbs::get());
	}

} // End Controller_Breadcrumbs