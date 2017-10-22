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
?>
<?php $listOrder = $this->listOrder; ?>
<?php $listDirn = $this->listDirn; ?>
<form action="<?php echo JRoute::_('index.php?option=com_team&view=team_members'); ?>" method="post" name="adminForm" id="adminForm" data-list-order="<?php echo $listOrder; ?>">
	<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<?php else : ?>
		<div id="j-main-container">
			<?php endif;?>
			<div id="filter-bar" class="btn-toolbar">
				<div class="filter-search btn-group pull-left">
					<label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
					<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>..." value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
				</div>
				<button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><?php echo JText::_('JSEARCH_FILTER'); ?></button>
				<button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>

				<div class="btn-group pull-right hidden-phone">
					<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
					<?php echo $this->pagination->getLimitBox(); ?>
				</div>
				<div class="btn-group pull-right hidden-phone">
					<label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC');?></label>
					<select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla.orderTable()">
						<option value=""><?php echo JText::_('JFIELD_ORDERING_DESC');?></option>
						<option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING');?></option>
						<option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING');?></option>
					</select>
				</div>
				<div class="btn-group pull-right">
					<label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY');?></label>
					<select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
						<option value=""><?php echo JText::_('JGLOBAL_SORT_BY');?></option>
						<?php echo JHtml::_('select.options', $this->sortFields, 'value', 'text', $listOrder);?>
					</select>
				</div>
			</div>
			<div class="clearfix"> </div>
			<table class="table table-striped" id="team_memberList">
				<thead>
					<tr>
						<?php if (isset($this->items[0]->ordering)): ?>
							<th width="1%" class="nowrap center hidden-phone">
								<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
							</th>
						<?php endif; ?>
						<th width="1%" class="nowrap center">
							<?php echo JHtml::_('grid.checkall'); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_NAME', 'a.name', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_PHOTO', 'a.photo', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_POSITION', 'a.position', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_EMAIL', 'a.email', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_FACEBOOK_USERNAME', 'a.facebook_username', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_TWITTER_HANDLE', 'a.twitter_handle', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
						</th>
						<th class="left">
							<?php echo JHtml::_('grid.sort',  'COM_TEAM_HEADING_BACKEND_LIST_STATE', 'a.state', $listDirn, $listOrder); ?>
						</th>
						<th width="1%" class="nowrap">
							<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_BACKEND_LIST_ID', 'a.id', $listDirn, $listOrder); ?>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($this->items as $i => $item) :
					$ordering   = ($listOrder == 'a.ordering');
					$canCreate	= $this->user->authorise('core.create',		'com_team');
					$canEdit	= $this->user->authorise('core.edit',		'com_team');
					$canCheckin	= $this->user->authorise('core.manage',		'com_team');
					$canChange	= $this->user->authorise('core.edit.state',	'com_team');
					?>
					<tr class="row<?php echo $i % 2; ?>">
						<td class="order nowrap center hidden-phone">
							<?php
							$iconClass = '';
							if (!$canChange)
							{
								$iconClass = ' inactive';
							}
							elseif (!$this->saveOrder)
							{
								$iconClass = ' inactive tip-top hasTooltip" title="' . JHtml::tooltipText('JORDERINGDISABLED');
							}
							?>
							<span class="sortable-handler<?php echo $iconClass; ?>">
								<span class="icon-menu"></span>
							</span>
							<?php if ($canChange && $this->saveOrder) : ?>
								<input type="text" style="display:none" name="order[]" size="5"
									   value="<?php echo $item->ordering; ?>" class="width-20 text-area-order " />
							<?php endif; ?>
						</td>
						<td class="center">
							<?php echo JHtml::_('grid.id', $i, $item->id); ?>
						</td>
						<td>
							<a href="<?php echo JRoute::_('index.php?option=com_team&task=team_member.edit&id=' . $item->id); ?>">
								<?php echo $item->name; ?>
							</a>
						</td>
						<td>
							<?php if(!empty($item->photo)) : ?>
								<img src="<?php echo JURI::root() . $item->photo; ?>" class="list-media" />
							<?php endif; ?>
						</td>
						<td>
							<?php echo $item->position; ?>
						</td>
						<td>
							<?php echo $item->email; ?>
						</td>
						<td>
							<?php echo $item->facebook_username; ?>
						</td>
						<td>
							<?php echo $item->twitter_handle; ?>
						</td>
						<td>
							<?php echo $item->created_by; ?>
						</td>
						<td>
							<?php echo JHtml::_('jgrid.published', $item->state, $i, 'team_members.', $canChange, 'cb'); ?>
						</td>
						<td>
							<a href="<?php echo JRoute::_('index.php?option=com_team&task=team_member.edit&id=' . $item->id); ?>">
								<?php echo $item->id; ?>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<div class="pagination center">
				<?php echo $this->pagination->getListFooter(); ?>
			</div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
			<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
