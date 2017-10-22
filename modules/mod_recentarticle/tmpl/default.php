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

if ($title == 1){?>
	<h2 class="title"><?php echo $rows[0]->title; ?></h2>
<?php } ?>

<p style="position:relative; margin-top:10px;">
	<?php if (is_numeric($article_length)){
		echo substr($rows[0]->introtext,0,$article_length);
	}else{
		echo substr($rows[0]->introtext,0,50);
	}?>
</p>