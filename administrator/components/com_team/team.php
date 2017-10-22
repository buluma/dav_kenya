<?php
/**
 * @version     1.0.0
 * @package     com_team_1.0.0
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Michael Buluma <me@buluma.me.ke> - http://www.reds.co.ke
 */

// No direct access
defined('_JEXEC') or die;

$user = JFactory::getUser();

// Authorize
if (!$user->authorise('core.manage', 'com_team'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Register class prefix
JLoader::registerPrefix('Team', JPATH_COMPONENT_ADMINISTRATOR);

// Load the controller
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Team');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
