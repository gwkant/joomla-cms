<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_categories
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

$input = JFactory::getApplication()->input;

// FIXME (GWK) ACLs are set on com_content, not on com_category!
if (!JFactory::getUser()->authorise('core.manage', 'com_content'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::register('JHtmlCategoriesAdministrator', JPATH_ADMINISTRATOR . '/components/com_categories/helpers/html/categoriesadministrator.php');

$task = $input->get('task');

$controller = JControllerLegacy::getInstance('Categories');
$controller->execute($input->get('task'));
$controller->redirect();
