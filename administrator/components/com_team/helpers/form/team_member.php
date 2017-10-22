<?php
/**
 * @version     1.0.0
 * @package     com_team_1.0.0
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Michael Buluma <me@buluma.me.ke> - http://www.reds.co.ke
 */

defined('_JEXEC') or die;

/**
 * Team form
 */
class FormTeam_memberTeam extends FOFModel
{
    /**
     * Method to get the record form.
     *
     * @param	array	$data		An optional array of data for the form to interogate
     * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not
     * @return	JForm	A JForm object on success, false on failure
     * @since	1.6
     */
    public function getForm($data = array(), $loadData = true, $source = NULL)
    {
        // Get the form
        $form = $this->loadForm('com_team.team_member', 'team_member', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    /**
     * Get the field options from the form fields
     *
     * @return  array   $fieldOptions   An array with the field options
     */
    public function getFieldOptions()
    {
        $form = $this->getForm();

        $xmlFieldset = $form->getXml()->fieldset;

        $fieldOptions = array();
        foreach ($xmlFieldset->children() as $field)
        {
            $fieldColumn = (string) $field['name'];

            foreach ($field->children() as $option)
            {
                $key = (string) $option['value'];
                $value = (string) $option;

                $fieldOptions[$fieldColumn][$key] = $value;
            }
        }

        return $fieldOptions;
    }
}
