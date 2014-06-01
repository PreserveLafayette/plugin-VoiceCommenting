<?php

class Table_VoiceComment extends Omeka_Db_Table
{
    public function getSelect()
    {
        $select = parent::getSelect();
        $request = Zend_Controller_Front::getInstance()->getRequest();
        //only show approved comments to api without a proper key
        if($request && $request->getControllerName() == 'api') {
            if(!is_allowed('VoiceCommenting_Comment', 'update-approved')) {
                $select->where('approved = ?', 1);
            }
        }
        return $select;
    }
}
