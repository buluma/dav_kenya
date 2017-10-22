<?php
	defined('_JEXEC') or die;
	$layout = $params->get('layout','default');
	require JModuleHelper::getLayoutPath('mod_home_links', $layout);
?>
