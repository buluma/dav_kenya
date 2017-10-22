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
<div class="table-responsive">
    <table class="table table-striped">
        <tr>
			<th class="item-facebook_username">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_FACEBOOK_USERNAME'); ?>
			</th>
			<td>
				<?php echo $this->item->facebook_username; ?>
			</td>
		</tr>
		<tr>
			<th class="item-twitter_handle">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_TWITTER_HANDLE'); ?>
			</th>
			<td>
				<?php echo $this->item->twitter_handle; ?>
			</td>
		</tr>
		<tr>
			<th class="item-email">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_EMAIL'); ?>
			</th>
			<td>
				<?php echo $this->item->email; ?>
			</td>
		</tr>
		<tr>
			<th class="item-photo">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_PHOTO'); ?>
			</th>
			<td>
				<?php if(!empty($this->item->photo)) : ?>
					<img src="<?php echo JURI::root() . $this->item->photo; ?>" class="list-media" />
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th class="item-position">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_POSITION'); ?>
			</th>
			<td>
				<?php echo $this->item->position; ?>
			</td>
		</tr>
		<tr>
			<th class="item-name">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_NAME'); ?>
			</th>
			<td>
				<?php echo $this->item->name; ?>
			</td>
		</tr>
		<tr>
			<th class="item-created_by">
				<?php echo JText::_('COM_TEAM_HEADING_FRONTEND_DETAIL_CREATED_BY'); ?>
			</th>
			<td>
				<?php echo $this->item->created_by; ?>
			</td>
		</tr>
    </table>
</div>
