<?php


class My_Auth_Doctrine implements Zend_Auth_Adapter_Interface
{
    protected $_resultArray;
    protected $username;
    protected $password;

    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function authenticate()
    {
        $front = Lib_Application::getInstance();
        $em = $front->get('entityManager');
        $qb = $em->createQueryBuilder();
        $q = $qb->select('i')
                ->from('Users i')
                ->andWhere('i.name='.'\''.$this->username.'\'')
                ->andWhere('i.password='.'\''.$this->password.'\'');
        $qq = $q->getQuery();
        $result = $qq->getResult();
        var_dump($result);
        if(count($result)==1)
        {
            return new Zend_Auth_Result(
                Zend_Auth_Result::SUCCESS,$this->username,array()
            );
        }
        else
        {
            return new Zend_Auth_Result(
                Zend_Auth_Result::FAILURE, null, array('Authentication failure'));
        }
    }
}
