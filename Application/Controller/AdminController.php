<?php
class AdminController extends Lib_Controller
{
    public function init()
    {
        $front = Lib_Application::getInstance();
        $path = $front->path;
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $session = new Zend_Session_Namespace('mvc.auth');
            $session->requestURL = $front->path;
            $this->redirect('/login');
        }
    }
    public function indexAction()
    {

    }

} 
