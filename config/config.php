<?php
/**
 * 
 * Extension for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2016 POSTYOU
 *
 * @package 
 * @author  Gerald Meier
 * @link    http://www.postyou.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
 
 if (!defined('TL_ROOT')) die('You cannot access this file directly!');

$GLOBALS['TL_CTE']['newsletter']['nl_autoList'] = 'postyou\ContentAutoList';

$GLOBALS['TL_HOOKS']['getContentElement'][] = array('postyou\HookController', 'myGetContentElement');

$GLOBALS['TL_CONFIG']['nl_autoList']['preFix']="elem_";