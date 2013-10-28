<?php
/**
 * Created by JetBrains PhpStorm.
 * User: artsem
 * Date: 10/2/13
 * Time: 8:55 PM
 * To change this template use File | Settings | File Templates.
 */

class Model_Write_ToTheFile {
    private $pathToDirFile;
    private $fileName;
    private $name;
    private $email;
    private $message;
    private $date;
    public function __construct($values)
    {
        $controller = Lib_Application::getInstance();
        $this->pathToDirFile = $controller->getPathDirFile();
        $this->fileName = $controller->getFileName();
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->message = $values['message'];

    }
    public function write()
    {
        if(isset($this->fileName))
        {
           $file = $this->pathToDirFile.'/'.$this->fileName.'txt';
        }
        else
        {
            $file = realpath(dirname(__FILE__).'/../../public/file/').'/'.'file.xml';
        }
        $this->date = new DateTime();
        $string = '';
        if(!is_file($file))
        {
            $xml = new DOMDocument();
            $xml->loadXML($this->createNode(0));
            $xml->save($file);
        }
        else{
            $xml = new DOMDocument();
            $xml->load($file);
            $xml->saveXML();
            $root = $xml->getElementsByTagName('messages')->item(0);
            $childFragment = $xml->createDocumentFragment();
            $childFragment->appendXML($this->createNode(1));
//            var_dump($childFragment->);
            $root->appendChild($childFragment);
            $xml->saveXML();
            $xml->save($file);


        }
    }
    public function read()
    {
        if(isset($this->fileName))
        {
            $file = $this->pathToDirFile.'/'.$this->fileName.'txt';
        }
        else
        {
            $file = realpath(dirname(__FILE__).'/../../public/file/').'/'.'file.xml';
        }
        $xml = new DOMDocument();
        $xml->load($file);
        $message = $xml->getElementsByTagName('message');
        var_dump($message);
    }
    private function createNode($i)
    {
        $xmlAll = "<message>\r\n\t<name>$this->name</name>\r\n\t<email>$this->email</email>\r\n\t<sms>$this->message</sms>\r\n\t".'<date>'.$this->date->format("Y-m-d H:i:s").'</date>'."\r\n".'</message>'."\r\n";
        $xmlStart ="<messages>\r\n<message>\r\n\t<name>$this->name</name>\r\n\t<email>$this->email</email>\r\n\t<sms>$this->message</sms>\r\n\t".'<date>'.$this->date->format("Y-m-d H:i:s").'</date>'."\r\n".'</message>'."\r\n</messages>";
        $xml = $i==0 ? $xmlStart : $xmlAll;
        return $xml;
    }
}
