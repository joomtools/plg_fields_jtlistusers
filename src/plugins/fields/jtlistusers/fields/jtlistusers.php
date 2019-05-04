<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Fields.Jtlistusers
 *
 * @author       Guido De Gobbis
 * @copyright    (c) JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormHelper;

FormHelper::loadFieldClass('list');

/**
 * Form Field class for the Joomla Platform.
 * Supports a generic list of users.
 *
 * @since   1.0.0
 */
class JFormFieldJtlistusers extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var     string
	 * @since   1.0.0
	 */
	public $type = 'Jtlistusers';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   1.0.0
	 */
	protected function getOptions()
	{
		$db = Factory::getDbo();
		$options   = array();

		$query = $db->getQuery(true)
			->select('id, name')
			->from($db->quoteName('#__users'));
		$db->setQuery($query);
		$data = (array) $db->loadAssocList('id', 'name');

		foreach ($data as $id => $name)
		{
			$tmp = array(
				'value' => $id,
				'text'  => $name,
			);

			$options[] = (object) $tmp;
		}

		return $options;
	}
}
