<?php
/*------------------------------------------------------------------------
# mod_recentarticle - Recent Article
# ------------------------------------------------------------------------
# author    Bilal Kabeer Butt
# copyright Copyright (C) 2013 GegaByte.org. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.gegabyte.org
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//This is the parameter we get from our xml file above
$catid = $params->get('catid');
$title = $params->get('article_title');
$article_length = $params->get('article_length');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
$rows = ModGegaByteHelperRecentArticle::getArticle($params);

//Returns the path of the layout file
require JModuleHelper::getLayoutPath('mod_recentarticle', $params->get('layout', 'default'));