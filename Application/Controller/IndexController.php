<?php
class IndexController extends Lib_Controller {

    public function indexAction()
    {
        $a = new Model_Read_FromTheFile();
        $messages = $a->read();
        $this->view->messages = $messages;
        $form = new My_LoadingForm();
        $view = new Zend_View();
        $view->doctype('XHTML1_TRANSITIONAL');
        $form->setView(new Zend_View());
        if($this->isPost())
        {

            if($form->isValid($this->getPOST()))
            {

                $value = $form->getValues();
                $data = new Model_Write_ToTheFile($value);
                $data->write();
                $a = new Model_Read_FromTheFile();
                $messages = $a->read();
                $this->view->messages = $messages;
                $this->view->form=$form;


            }
            else
            {
                $this->view->form = $form;
            }
        }
        else
        {

            $this->view->form = $form;
        }
    }
    public function displayAction()
    {
        
    }
    public function init()
    {
//        $this->setLayout('duplicate.phtml');
    }
    public function readAction()
    {
//        $new = new DateTime();
//        $this->view->date = $new->format("Y-m-d H:i:s");
        header('Location:/index/');
    }

}
