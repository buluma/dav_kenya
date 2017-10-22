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

class ModGegaByteHelperRecentArticle{
	public static function &getArticle(&$params){		
		$catid	= $params->get('catid');
		//Add database instance
		$db = JFactory::getDBO();
		//Pass in query - Limit by the usercount param
		$query = "SELECT * FROM `#__content` WHERE `catid` = {$catid} ORDER BY `id` DESC LIMIT 1";
		//Run it
		$db->setQuery($query);
		//Load it as an object into the variable "$rows"
		$rows = $db->loadObjectList();
		return $rows;
	}
}