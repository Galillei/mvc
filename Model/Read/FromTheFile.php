<?php
/**
 * Created by JetBrains PhpStorm.
 * User: artsem
 * Date: 10/7/13
 * Time: 5:53 AM
 * To change this template use File | Settings | File Templates.
 */

class Model_Read_FromTheFile {
    private $pathToDirFile;
    private $fileName;
    public function __construct()
    {
        $controller = Lib_Application::getInstance();
        $this->pathToDirFile = $controller->getPathDirFile();
        $this->fileName = $controller->getFileName();
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
        if(is_file($file))
        {
        $xml = new DOMDocument();
        $xml->load($file);
        $root = $xml->getElementsByTagName('message');
        return $this->concatMessage($root);
        }
        return '';
    }
    private function concatMessage($root)
    {
        $lengthXml = $root->length;
        $string = array();
       for($i=0;$i<=$lengthXml-1;$i++)
       {
           $str = 'Name:'.$root->item($i)->getElementsByTagName('name')->item(0)->nodeValue."</br>";
           $str .= 'Email:'.$root->item($i)->getElementsByTagName('email')->item(0)->nodeValue."</br>";
           $str .= 'Message:'.$root->item($i)->getElementsByTagName('sms')->item(0)->nodeValue."</br>";
           $str .= 'Date:'.$root->item($i)->getElementsByTagName('date')->item(0)->nodeValue."</br>";
           $string[] = $str;
       }
        return array_reverse($string);
    }

}
