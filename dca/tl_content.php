<?php

if ($this->Input->get('do') == 'newsletter' || (\Input::get('table') == 'tl_content' && \Input::get('field') == 'type')) {
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $k => $strPalette) {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$k] = str_replace('headline','headline,inAutoList', $strPalette);
    }
} elseif (TL_MODE == 'BE') {
	unset($GLOBALS['TL_CTE']['newsletter']);
}

$GLOBALS['TL_DCA']['tl_content']['fields']['inAutoList'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['inAutoList'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('doNotSaveEmpty'=>true,'tl_class'=>'w50 m12'),
    'load_callback'           => array(array('tl_newsletter_content_autolist','loadCallBack')),
    'save_callback'           => array(array('tl_newsletter_content_autolist','saveCallBack')),
//    'sql'                     => "char(1) NOT NULL default '1'"
);

class tl_newsletter_content_autolist {

    public function loadCallBack($varValue,$dc){
        if($varValue==null)
            return 1;
        $res=$dc->Database->prepare("Select protected from tl_content where id=?")->execute($dc->id)->fetchAssoc();
        return $res['fullsize'];
    }
    public function saveCallBack($varValue,$dc){
        $res=$dc->Database->prepare("Update tl_content set fullsize=? where id=?")->execute($varValue,$dc->id);
        return null;
    }
}