<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

// no direct access
defined( '_JEXEC' ) or die;

jimport('syw.k2');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

JFormHelper::loadFieldClass('list');

class JFormFieldLinkSelect extends JFormFieldList
{
	public $type = 'LinkSelect';
	
	static $core_fields = null;	
	static $k2_fields = null;
	
	static function getCoreFields($allowed_types = array())
	{
		if (!isset(self::$core_fields)) {
			JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
			$fields = FieldsHelper::getFields('com_content.article');
			
			self::$core_fields = array();
			
			if (!empty($fields)) {
				foreach ($fields as $field) {					
					if (!empty($allowed_types) && !in_array($field->type, $allowed_types)) {
						continue;
					}					
					self::$core_fields[] = $field;
				}
			}
		}
		
		return self::$core_fields;
	}
	
	static function getK2Fields($allowed_types = array())
	{
		if (!isset(self::$k2_fields)) {
			
			$db = JFactory::getDBO();
				
			$query = $db->getQuery(true);
			
			$query->select('fields.id');
			$query->select('fields.type');
			$query->select('fields.name');
			$query->select('groups.name AS group_name');
			$query->from('#__k2_extra_fields AS fields');
			$query->where($db->quoteName('fields.published').' = 1');
			
			if (!empty($allowed_types)) {
				$query->where($db->quoteName('fields.type').' IN ("'.implode('","', $allowed_types).'")');
			}
			
			$query->order($db->quoteName('fields.ordering'));
				
			$query->innerJoin('#__k2_extra_fields_groups AS groups ON groups.id = fields.group');
				
			$db->setQuery($query);
				
			$fields = array();
			try {
				$fields = $db->loadObjectList();
			} catch (RuntimeException $e) {
				if ($db->getErrorNum()) {
					JFactory::getApplication()->enqueueMessage($db->getErrorMsg(), 'warning');
				} else {
					JFactory::getApplication()->enqueueMessage(JText::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
				}
			}
			
			self::$k2_fields = $fields;			
		}
		
		return self::$k2_fields;
	}

	protected function getOptions() 
	{	
		$options = array();
		
		if (SYWK2::exists()) {
						
			// get K2 extra fields
			$fields = self::getK2Fields(array('link'));
									
			$fields_count = 0;
			foreach ($fields as $field) {
					
				if ($fields_count == 0) {
					$options[] = JHtml::_('select.optgroup', JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_K2EXTRAFIELDS'));
				}
				
				$options[] = JHTML::_('select.option', 'k2field:'.$field->type.':'.$field->id, 'K2: '.$field->group_name.': '.$field->name, 'value', 'text', $disable = true);
				
				$fields_count++;
			}
			
			if ($fields_count > 0) {
				$options[] = JHtml::_('select.optgroup', JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_K2EXTRAFIELDS'));
			}			
		}	
		
		// get Joomla! fields
		// test the fields folder first to avoid message warning that the component is missing
		if (JFolder::exists(JPATH_ADMINISTRATOR . '/components/com_fields') && JComponentHelper::isEnabled('com_fields') && JComponentHelper::getParams('com_content')->get('custom_fields_enable', '1')) {

			// get the custom fields
			$fields = self::getCoreFields(array('url'));
						
			// organize the fields according to their group
				
			$fieldsPerGroup = array(
				0 => array()
			);
				
			$groupTitles = array(
				0 => JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_NOGROUPFIELD')
			);
				
			$fields_exist = false;
			foreach ($fields as $field) {
					
				if (!array_key_exists($field->group_id, $fieldsPerGroup)) {
					$fieldsPerGroup[$field->group_id] = array();
					$groupTitles[$field->group_id] = $field->group_title;
				}
					
				$fieldsPerGroup[$field->group_id][] = $field;
				$fields_exist = true;
			}
				
			// loop trough the groups
			
			if ($fields_exist) {
				$options[] = JHtml::_('select.optgroup', JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_JOOMLAFIELDS'));
			
				foreach ($fieldsPerGroup as $group_id => $groupFields) {
			
					if (!$groupFields) {
						continue;
					}
			
					foreach ($groupFields as $field) {
						$options[] = JHTML::_('select.option', 'jfield:'.$field->type.':'.$field->id, $groupTitles[$group_id].': '.$field->title, 'value', 'text', $disable = true);
					}
				}
			
				$options[] = JHtml::_('select.optgroup', JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_VALUE_JOOMLAFIELDS'));
			}
		}
		
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}
?>