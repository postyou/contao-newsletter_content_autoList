<?php

namespace postyou;

class ContentAutoList extends \ContentElement {
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'nl_autoList';
    /**
     * Initialize the object
     * @param object
     * @param string
     */
//    public function __construct($objElement, $strColumn='main') {
//        parent::__construct($objElement, $strColumn);
//        if ($this->customTpl != '') {
//            $this->strTemplate = $this->customTpl;
//        }
//    }
    /**
     * Generate the content element
     */
    protected function compile() {
//        $headlineArr=array();
        $strBuffer="<ul>";
        $siblings=$this->Database->prepare("SELECT id,headline,fullsize as 'enableList' FROM tl_content 
                                  WHERE pid=? AND ptable=?
                                  ORDER BY sorting")->execute($this->pid,$this->ptable)->fetchAllAssoc();
        if($siblings){
            foreach ($siblings as $sibling){
                if(!empty($sibling['headline'])) {
                    $headlineArr = unserialize($sibling['headline']);
                    if (!empty($headlineArr['value']) && $sibling['enableList']==1) {
//                    $headlineArr[]=$headlineArr['value'];
                        $strBuffer .= "<li><a href='#".$GLOBALS['TL_CONFIG']['nl_autoList']['preFix'].$sibling['id']."'>" . $headlineArr['value'] . "</a></li>";
                    }
                }
            }
            $strBuffer.="</ul>";
        }

        $this->Template->listStr=$strBuffer;
    }



}


