<?php
/**
 * htdocs
 * Extension for Contao Open Source CMS (contao.org)
 *
 * Copyright (c) 2017 POSTYOU
 *
 * @package htdocs
 * @author  Gerald Meier
 * @link    http://www.postyou.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace postyou;


class HookController
{
    public function myGetContentElement($objRow, $strBuffer,$objElement){
//        $objElement->cssID="id='".$objElement->id."'";
        $tmpClass="";
        if(!empty($objElement->cssID) && is_array($objElement->cssID) && !empty($objElement->cssID[1]))
            $tmpClass=$objElement->cssID[1];
        $objElement->cssID=array($GLOBALS['TL_CONFIG']['nl_autoList']['preFix'].$objElement->id,$tmpClass);
        return $objElement->generate();
    }
}