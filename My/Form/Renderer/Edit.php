<?php

class My_Form_Renderer_Edit
{
    protected $form;

    protected $lang;

    public function __construct(Zend_Form $form, $form_id = null)
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_TRANSITIONAL');

        $this->form = $form;
        $this->form->setView(new Zend_View());
        $this->form->setAttrib('class', 'form_edit');
        if (!is_null($form_id)) {
            $this->form->setAttrib('id', $form_id);
        }

        $this->lang = new My_LanguagePack();
    }
    public function render()
    {

    }
}
