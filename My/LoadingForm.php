<?php


class My_LoadingForm extends Zend_Form
{
    public function init()
    {
        $this->setAction('index/')
            ->setMethod('post');


        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name:')
            ->setOptions(array('size'=>'35'))
            ->setRequired(true)
            ->addValidator('NotEmpty', true)
            ->addValidator('Alpha',true)
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        //email
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email address:');
        $email->setOptions(array('size'=>'50'))
            ->setRequired(true)
            ->addValidator('NotEmpty',true)
            ->addValidator('EmailAddress',true)
            ->addFilter('HtmlEntities')
            ->addFilter('StringToLower')
            ->addFilter('StringTrim');
        //text field for message
        $message = new Zend_Form_Element_Textarea('message');
        $message->setLabel('Message:')
            ->setOptions(array('rows'=>'8','cols'=>'40'))
            ->setRequired(true)
            ->addValidator('NotEmpty',true)
            ->addFilter('HtmlEntities')
            ->addFilter('StringTrim');
        //captcha

        //insert elements to ...submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Send Message')
            ->setOptions(array('class'=>'submit'));

        $this->addElement($name);
        $this->addElement($email);
        $this->addElement($message);
        $this->addDisplayGroup(array('name','email','message','captcha'),'contact');
        $this->getDisplayGroup('contact')
            ->setLegend('Contact information');
        $this->addElement($submit);
    }
}
