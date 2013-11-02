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
                $this->redirect('index/read');
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
    }
   public function readAction()
    {
     $this->redirect('index');
    }

}
