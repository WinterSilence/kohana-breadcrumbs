<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Breadcrumbs is indicate the current page's location within a navigational hierarchy.
 *
 * @package    Breadcrumbs
 * @category   Helpers
 * @author     WinterSilence <info@handy-soft.ru>
 * @copyright  (c) 2013 handy-soft.ru
 * @license    http://kohanaframework.org/license
 * @link       http://github.com/WinterSilence/kohana-breadcrumbs
 */
abstract class Core_Breadcrumbs {

	/**
	 * @var  string  Filename of View template
	 */
	protected static $_template = 'breadcrumbs/default';

	/**
	 * @var  array  Breadcrumb items as URI => name
	 */
	protected static $_items = array();

	/**
	 * Sets(add) breadcrumbs
	 * 
	 * @param   mixed   $uri    Item URI or array of items
	 * @param   string  $title  Item title
	 * @return  void
	 */
	public static function set($uri, $title = NULL)
	{
		if (is_array($uri))
		{
			self::$_items += $uri;
		}
		else
		{
			self::$_items[$uri] = $title;
		}
	}

	/**
	 * Generate (uses controller data) and add items
	 * 
	 * @param   Controller  $controller
	 * @return  void
	 * @uses    Controller
	 * @uses    Route
	 * @uses    Request
	 * @uses    Inflector
	 */
	public static function set_auto(Controller $controller)
	{
		$request  = $controller->request;
		$route    = $request->route();
		$defaults = $route->defaults();
		
		$default_action = isset($defaults['action']) ? $defaults['action'] : Route::$default_action;
		$default_action_exist = method_exists($controller, 'action_'.$default_action);
		
		$title = Inflector::decamelize($request->directory().' '.$request->controller());
		
		// Set controller item
		if ($default_action_exist)
		{
			$uri = $route->uri(array(
				'directory'  => $request->directory(),
				'controller' => $request->controller(),
				'action'     => $default_action,
			));
			self::set($uri, $title);
		}
		else
		{
			self::set($request->uri(), $title);
		}
		/**
		 * Set action item. Not add default action:
		 * action_index: `Articles`, action_edit: `Articles / Edit`
		 */
		if ($request->action() != $default_action)
		{
			$title = Inflector::humanize($request->action());
			self::set($request->uri(), $title);
		}
	}

	/**
	 * Gets breadcrumbs
	 * 
	 * @param   string  $key
	 * @return  mixed
	 */
	public static function get($key = NULL)
	{
		if (empty($key))
		{
			return self::$_items;
		}
		elseif (isset(self::$_items[$key]))
		{
			return array($key, self::$_items[$key]);
		}
	}

	/**
	 * Gets or sets default View template name
	 * 
	 * @param   string  $name
	 * @return  mixed
	 */
	public static function template($name = NULL)
	{
		if (empty($name))
		{
			return self::$_template;
		}
		self::$_template = (string) $name;
	}

} // End Breadcrumbs