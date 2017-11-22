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

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<div class="contact">
        <h1 itemprop="name" class="content-body__h1">The Team</h1>
      

<div class="Section Section--employees">
    <div class="column--primary">
      <div class="content-body">
                                    
<div class="content-body__inner">
    <div id="content-body-01" class="content-body__container">
        
        <div class="content-body__team">
            <div class="content">
              <h2 class="">Meet the DAV Kenya Team</h2>
              <br/>
                <div class="team-list js-team-list">
                    <div class="item-page">
                        <ul>
                        <?php foreach ($this->items as $i => $item) :
                          // var_dump($item);
                          ?>
                              <li data-toggle="modal" data-target="#bannerformmodal-<?php echo $item->id;?>" class="" >
                                <div class="pane-list large-4 columns js-bd-pane">
                                    <div class="tema-list__item pane-block" style="">
                                        <div class="content">
                                            <div class="pane-block__image">
                                                <div class="image-container">
                                                    <img class="image-pane" title="<?php echo $item->name;?>" src="<?php echo $item->photo; ?>" alt="<?php echo $item->name;?>">
                                                </div>
                                            </div>
                                            <div class="item-block__meta">
                                                <div class="meta-content">
                                                    <h3>
                                                        <span class="text-render"><?php echo $item->name;?></span>
                                                    </h3>
                                                    <p>
                                                        <span class="text-render"><?php echo $item->position;?></span>
                                                    </p>
                                                    <div class="meta-content__cta hide-item js-bio-cta" style="display: none;">
                                                        <a class="btn btn-g-f" title="" onclick="PeopleDetails(6)" href="javascript:void(0);">Read Bio</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- Modal PopUp -->
        <?php foreach ($this->items as $i => $item) :
          ?>
        <div class="modal fade bannerformmodal-<?php echo $item->id;?>" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal-<?php echo $item->id;?>">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $item->name;?>'s Profile</h4>
                        </div>
                        <div class="modal-body">
                          <?php //var_dump($item); ?>
                          <div class="row">
                             <div class="col-md-4">
                               <img src="<?php echo $item->photo; ?>" alt="Dan Nyitrai" width="188" height="188" class="is-loaded center-block">
                               <br />
                               <h4 class="text-center"><?php echo $item->position;?></h4>
                             </div>
                             <div class="col-md-8 pull-right">
                               <?php 
                               if (!empty($item->profile)){
                               echo $item->profile;
                             } else {
                              echo '<p class="text-center">Profile Coming Soon</p>';
                             }

                               ?>
                             </div>
                          </div>
                          </div>
                      <div class="modal-footer">
                         <div class="social_media_links">
                         <?php if (!empty($item->facebook_username)){?>
                          <a href="https://fb.me/<?php echo $item->facebook_username ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Like <?php echo $item->name;?> on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <?php }?>

                          <?php if (!empty($item->twitter_handle)){?>
                          <a href="https://twitter.com/<?php echo $item->twitter_handle ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Follow <?php echo $item->name;?> on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <?php }?>

                          <?php if (!empty($item->email)){?>
                          <a href="mailto:<?php echo $item->email ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Email <?php echo $item->name;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                          <?php }?>

                          </div>
                      </div>
                </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        <!-- End Modal PopUp -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>




    <div class="row hidden">
        <?php foreach ($this->items as $i => $item) :
          // var_dump($item);
          ?>
      <div class="col-md-3 text-center">
        <div class="Employee-avatar">
            <img src="<?php echo $item->photo; ?>" alt="Dan Nyitrai" width="188" height="188" class="is-loaded">
            <noscript>&lt;img src="/assets/media/employees/dan_nyitrai-65ec8788.png" alt="Dan Nyitrai" width="188" height="188" /&gt;</noscript>
          </div>

          <a href="#" data-toggle="modal" data-target="#bannerformmodal-<?php echo $item->id;?>"><h3 class="Employee-name"><?php echo $item->name;?></h3></a>
          <p class="employee-textSub"><?php echo $item->position;?></p>
          <div class="middle">
            <div class="text">John Doe</div>
          </div>

      </div>
        <?php endforeach; ?>
        <!-- Modal PopUp -->
        <?php foreach ($this->items as $i => $item) :
          // var_dump($item);
          ?>
        <div class="modal fade bannerformmodal-<?php echo $item->id;?>" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal-<?php echo $item->id;?>">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $item->name;?>'s Profile</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                             <div class="col-md-6">
                               <img src="<?php echo $item->photo; ?>" alt="Dan Nyitrai" width="188" height="188" class="is-loaded">
                               <br />
                               <h4><?php echo $item->name;?> - <?php echo $item->position;?></h4>
                             </div>
                             <div class="col-md-6 pull-left">
                               <?php echo $item->profile;?>
                             </div>
                          </div>
                          </div>
                      <div class="modal-footer">
                         <div class="social_media_links">
                         <?php if (!empty($item->facebook_username)){?>
                          <a href="https://fb.me/<?php echo $item->facebook_username ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Like <?php echo $item->name;?> on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <?php }?>

                          <?php if (!empty($item->twitter_handle)){?>
                          <a href="https://twitter.com/<?php echo $item->twitter_handle ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Follow <?php echo $item->name;?> on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <?php }?>

                          <?php if (!empty($item->email)){?>
                          <a href="mailto:<?php echo $item->email ;?>" title="" target="_blank" data-toggle="tooltip" data-original-title="Email <?php echo $item->name;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                          <?php }?>

                          </div>
                      </div>
                </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        <!-- End Modal PopUp -->
  </div>
</div>

<form class="hidden" action="<?php echo JRoute::_('index.php?option=com_team&view=team_members'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="filter-bar" class="btn-toolbar">
        <div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
            <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>..." value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
        </div>
        <button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><?php echo JText::_('JSEARCH_FILTER'); ?></button>
        <button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="item-facebook_username">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_FACEBOOK_USERNAME', 'a.facebook_username', $listDirn, $listOrder); ?>
					</th>
					<th class="item-twitter_handle">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_TWITTER_HANDLE', 'a.twitter_handle', $listDirn, $listOrder); ?>
					</th>
					<th class="item-email">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_EMAIL', 'a.email', $listDirn, $listOrder); ?>
					</th>
					<th class="item-photo">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_PHOTO', 'a.photo', $listDirn, $listOrder); ?>
					</th>
					<th class="item-position">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_POSITION', 'a.position', $listDirn, $listOrder); ?>
					</th>
					<th class="item-name">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_NAME', 'a.name', $listDirn, $listOrder); ?>
					</th>
					<th class="item-created_by">
						<?php echo JHtml::_('grid.sort', 'COM_TEAM_HEADING_FRONTEND_LIST_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
					</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $i => $item) : ?>
                <tr class="<?php echo ($i % 2) ? "odd" : "even"; ?>">
                    <td class="item-facebook_username">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->facebook_username; ?>
						</a>
					</td>
					<td class="item-twitter_handle">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->twitter_handle; ?>
						</a>
					</td>
					<td class="item-email">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->email; ?>
						</a>
					</td>
					<td class="item-photo">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php if (!empty($item->photo)) : ?>
								<img src="<?php echo JURI::root() . $item->photo; ?>" class="list-media" />
							<?php endif; ?>
						</a>
					</td>
					<td class="item-position">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->position; ?>
						</a>
					</td>
					<td class="item-name">
						<a href="<?php echo JRoute::_('index.php?option=com_team&view=team_member&id=' . $item->id . '&Itemid=' . $this->item_id); ?>">
							<?php echo $item->name; ?>
						</a>
					</td>
					<td class="item-created_by">
						<?php echo $item->created_by; ?>
					</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination center">
            <?php echo $this->pagination->getListFooter(); ?>
        </div>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    </div>
</form>

<br />
<div id="effect-1" class="hidden effects clearfix">
  <?php foreach ($this->items as $i => $item) :
    // var_dump($item);
    ?>
    <div class="img">
        <img src="<?php echo JURI::root() . $item->photo; ?>" class="center-block responsive" />
        <div class="overlay">
            <a href="#" class="expand">+</a>
            <ul class="Inline Inline--small">
                    <li>
                      <a href="https://twitter.com/packetlife" class="Employee-popupLink" style="opacity: 0; transform: matrix(1, 0, 0, 1, 0, 16);">
                        <svg class="Icon">
                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
                        </svg>
                      </a>
                    </li>
                </ul>
            <!-- <a class="close-overlay hidden">x</a> -->
        </div>
    </div>
    <?php endforeach; ?>
</div>
