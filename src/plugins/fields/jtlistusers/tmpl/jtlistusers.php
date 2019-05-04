<?php
/**
 * @package      Joomla.Plugin
 * @subpackage   Fields.Jtlistusers
 *
 * @author       Guido De Gobbis
 * @copyright    (c) JoomTools.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

use Joomla\CMS\User\User;

foreach ((array) $field->rawvalue as $userId)
{
	$users[] = User::getInstance($userId)->get('name');
}

echo implode(', ', $users);
