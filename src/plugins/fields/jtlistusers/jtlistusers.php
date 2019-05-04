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

JLoader::import('components.com_fields.libraries.fieldsplugin', JPATH_ADMINISTRATOR);

/**
 * Fields List users Plugin
 *
 * @since  1.0.0
 */
class PlgFieldsJtlistusers extends FieldsPlugin
{
	/**
	 * Transforms the field into a DOM XML element and appends it as a child on the given parent.
	 *
	 * @param   stdClass    $field   The field.
	 * @param   DOMElement  $parent  The field node parent.
	 * @param   JForm       $form    The form.
	 *
	 * @return   DOMElement
	 * @throws   \Exception
	 *
	 * @since   1.0.0
	 */
	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{
		$fieldNode = parent::onCustomFieldsPrepareDom($field, $parent, $form);

		if (!$fieldNode)
		{
			return $fieldNode;
		}

		$fieldNode->setAttribute('type', 'Jtlistusers');
		$fieldNode->setAttribute('multiple', 'true');

		return $fieldNode;
	}
	/**
	 * Prepares the field
	 *
	 * @param   string    $context  The context.
	 * @param   stdclass  $item     The item.
	 * @param   stdclass  $field    The field.
	 *
	 * @return   object
	 *
	 * @since   1.0.0
	 */
	public function onCustomFieldsPrepareField($context, $item, $field)
	{
		// Check if the field should be processed
		if (!$this->isTypeSupported($field->type) || empty($field->rawvalue))
		{
			return;
		}

		// The field's rawvalue should be an array
		if (!is_array($field->rawvalue))
		{
			$field->rawvalue = (array) $field->rawvalue;
		}

		return parent::onCustomFieldsPrepareField($context, $item, $field);
	}
}
