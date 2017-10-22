<?php
/**
 * @copyright	Copyright (C) 2011 Simplify Your Web, Inc. All rights reserved.
 * @license		GNU General Public License version 3 or later; see LICENSE.txt
*/

// no direct access
defined( '_JEXEC' ) or die;

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

JFormHelper::loadFieldClass('dynamicsingleselect');

class JFormFieldAnimationSelect extends JFormFieldDynamicSingleSelect
{
	public $type = 'AnimationSelect';

	protected function getOptions()
	{
		$options = array();
		$options_disabled = array();

		$lang = JFactory::getLanguage();

		$path = '/modules/mod_latestnewsenhanced/animations';
		
		$options[] = array('', JText::_('JNO'), '', JURI::root(true).'/modules/mod_latestnewsenhanced/images/select_no.png');

		$optionsArray = JFolder::folders(JPATH_SITE.$path);

		foreach ($optionsArray as $option) {

			if ($option != 'justpagination') {
				
				$upper_option = strtoupper($option);

				//$lang->load('mod_latestnewsenhancedextended_animation_'.$option);
					
				$translated_option = JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_ANIMATION_'.$upper_option.'_LABEL');

				$description = '';
				if (empty($translated_option) || substr_count($translated_option, 'LATESTNEWSENHANCEDEXTENDED') > 0) {
					$translated_option = ucfirst($option);
				} else {
					$description = JText::_('MOD_LATESTNEWSENHANCEDEXTENDED_ANIMATION_'.$upper_option.'_DESC');
					if (substr_count($description, 'LATESTNEWSENHANCEDEXTENDED') > 0) {
						$description = '';
					}
				}

				$image_hover = '';
				if (JFile::exists(JPATH_ROOT.$path.'/'.$option.'/'.$option.'_hover.png')) {
					$image_hover = JURI::root(true).$path.'/'.$option.'/'.$option.'_hover.png';
				}
				
				if (JFile::exists(JPATH_ROOT.$path.'/'.$option.'/style.css.php')) {
					$options[] = array($option, $translated_option, $description, JURI::root(true).$path.'/'.$option.'/'.$option.'.png', $image_hover);
				} else {
					$options_disabled[] = array($option, $translated_option, $description, JURI::root(true).$path.'/'.$option.'/'.$option.'.png', $image_hover, 'disabled');
				}
			}
		}
		
		$options = array_merge($options, $options_disabled);
		
		return $options;
	}

	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);

		if ($return) {
			$this->width = 150;
			$this->height = 100;
		}

		return $return;
	}
}
?>