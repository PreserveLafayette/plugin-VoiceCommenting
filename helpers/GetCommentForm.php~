<?php

class VoiceCommenting_View_Helper_GetCommentForm extends Zend_View_Helper_Abstract
{
    
    public function getCommentForm()
    {        
        if( (get_option('commenting_allow_public') == 1) || is_allowed('VoiceCommenting_Comment', 'add') ) {
            require_once(VOICECOMMENTING_PLUGIN_DIR . '/VoiceCommentForm.php');
            $commentSession = new Zend_Session_Namespace('voice_commenting');
            $form = new VoiceCommenting_CommentForm();
            if($commentSession->post) {
                $form->isValid(unserialize($commentSession->post));
            }
            unset($commentSession->post);
            return $form;
        }                
    }
}
