<?php
abstract class Lib_Controller {
    protected $view;
    private $preView;
    protected $layouts;
    private $POST=false;
    private $POSTDATA;

    public function __construct () {
        $this->view = Lib_Template::getInstance();
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $this->POST = true;
            $this->POSTDATA = $_POST;
        }
    }
    private function preView()
    {

    }
    public function isPost()
    {
        return $this->POST;
    }
    public function getPOST()
    {
        return $this->POSTDATA;
    }
    public  function display()
    {
        $this->view->display();
    }
    public function initView()
    {
        $application = Lib_Application::getInstance();
        $layouts = $application->getLayouts();
        $file = $application->getLayoutsFile();
        if(isset($this->layouts))
        {
            $path = $layouts.'/'.$this->layouts;
        }
        else
        {
            $path = $layouts.'/'.$file;
        }
        $viewLayout = new Lib_Layouts($path);
        $viewLayout->display();
    }
    protected function getLayouts()
    {
        return $this->layouts;
    }
    protected function setLayouts($layouts)
    {
        $this->layouts = $layouts;
    }


}
