<?php

class Lib_Config {
    private $_date;
    public function __construct()
    {
        $this->_date = parse_ini_file(APPFILE);
    }
    public function getPathForController()
    {
        return $this->_date['path.controllers'].'/';
    }
    public function getNameAction()
    {

    }
    public function getNamespace()
    {
        return $this->_date['namespace'];
    }
    public function getNameViewsDir()
    {
        return $this->_date['nameViews'];
    }
    public function getLayoutsPath()
    {
        return $this->_date['layouts'];
    }
    public function getLayoutFile()
    {
        return $this->_date['layouts.action'];
    }
    public function getFileDir()
    {
        return $this->_date['dirForFiles'];
    }
    public function getFileName()
    {
        return $this->_date['filename'];
    }


}
