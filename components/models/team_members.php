<?php
/**
 * @version     1.0.0
 * @package     com_team_1.0.0
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Michael Buluma <me@buluma.me.ke> - http://www.reds.co.ke
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Team list model
 */
class TeamModelTeam_members extends JModelList
{
    /**
     * Constructor
     *
     * @param    array          An optional associative array of configuration settings
     *
     * @see      JController
     * @since    1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'id', 'a.id',
				'facebook_username', 'a.facebook_username',
				'twitter_handle', 'a.twitter_handle',
				'email', 'a.email',
				'photo', 'a.photo',
				'position', 'a.position',
				'name', 'a.name',
				'created_by', 'a.created_by',
				'state', 'a.state',
				'ordering', 'a.ordering',
            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state
     *
     * Note. Calling getState in this method will result in recursion
     *
     * @param   string  $ordering   An optional ordering field
     * @param   string  $direction  An optional direction (asc|desc)
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();
        $input = $app->input;

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        // Load the list state
        $this->setState('list.start', $input->get('limitstart', 0, 'uint'));
        $this->setState('list.limit', $input->get('limit', $app->get('list_limit', 20), 'uint'));

        // List state information
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data
     *
     * @return    JDatabaseQuery
     * @since    1.6
     */
    protected function getListQuery()
    {
        $query = $this->_db->getQuery(true);

        $query->select('a.id, a.facebook_username, a.twitter_handle');
		$query->select('a.email, a.photo, a.position, a.profile');
		$query->select('a.name, a.state, a.ordering');

        $query->from('`#__team_members` AS a');

        $query->select('h.name as created_by');
		$query->leftJoin($this->_db->qn('#__users') . ' AS h ON h.id = a.created_by');

        $query->where('a.state = 1');

        // Search for this word
        $searchWord = $this->getState('filter.search');

        // Search in these columns
        $searchColumns = array(
            'a.facebook_username',
			'a.twitter_handle',
			'a.email',
			'a.photo',
			'a.position',
			'a.name',
			'h.name',
        );

        if (!empty($searchWord))
        {
            if (stripos($searchWord, 'id:') === 0)
            {
                // Build the ID search
                $idPart = (int) substr($searchWord, 3);
                $query->where($this->_db->qn('a.id') . ' = ' . $this->_db->q($idPart));
            }
            else
            {
                $query = TeamHelpersFrontend::buildSearchQuery($searchWord, $searchColumns, $query);
            }
        }

        // Add the list ordering clause
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');

        if ($orderCol && $orderDirn)
        {
            $query->order($this->_db->escape($orderCol . ' ' . $orderDirn));
        }
        else
        {
            $query->order('a.ordering');
        }

        return $query;
    }

    /** Method to get an array of data items
     *
	 * @return  mixed An array of data on success, false on failure.
	 */
	public function getItems()
    {
        $items = parent::getItems();

        include_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/form/team_member.php';

        $form = new FormTeam_memberTeam;

        $fieldOptions = $form->getFieldOptions();

        foreach ($items as $i => $item)
        {
            foreach ($item as $key => $value)
            {
                // If this field has options
                if (isset($fieldOptions[$key]))
                {
                    // Update the item key with the field option
                    $item->{$key} = JText::_($fieldOptions[$key][$value]);
                }
            }

            $items[$i] = $item;
        }

        return $items;
    }
}
