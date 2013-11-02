<?php
class Lib_Application {
    public  $path;
    private $config;
    protected static $instance = null;
    protected static $register = array();
    public function set($name,$arg)
    {
        self::$register[$name] = $arg;
    }
    public function get($name)
    {
        return self::$register[$name];
    }

    private function getController()
    {
        if($this->path!='')
        {
            $path = $this->path;
            $controller = ucfirst(explode('/',$path)[1]);
            if(strlen($controller)<=0)
            $controller = 'Index';

        }
        else
        {
            $controller = 'Index';
        }
        $controller = $controller.'Controller';
        return $controller;
    }

    private function getAction()
    {
        if($this->path!='')
        {
            $action = 'index';
            $path = $this->path;
            $parametr = explode('/',$path);
            if((count($parametr)>='3') and (strlen($parametr[2]>= '1')))
            {
                $action = $parametr[2];
            }
        }
        else
        {
            $action = 'index';
        }
        return $action.'Action';
    }
    public function getViews()
    {
        $namespace = $this->config->getNamespace();
        $dir = $this->config->getNameViewsDir();

        if((strpos($this->path,'index'))!==1)
        {
            $dir_path = $dir_path = $namespace.'/'.$dir.'/'.substr($this->path,1).'/'.str_replace('Action','',$this->getAction());
        }
        else
        {
        $dir_path = $namespace.'/'.$dir.'/'.str_replace('Action','',$this->getAction());
        }
        var_dump($dir_path);
        return $dir_path.'.phtml';
    }
    public function getLayouts()
    {
        $pathToLayouts = $this->config->getLayoutsPath();
        return $pathToLayouts;
    }
    public function getLayoutsFile()
    {
        return $this->config->getLayoutFile();
    }
    protected  function __construct()
    {
        $this->config = new Lib_Config();
    }
    public function getPathDirFile()
    {
        return $this->config->getFileDir();
    }
    public function getFileName()
    {
        $this->config->getFileName();
    }
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
    public function run()
    {
        $this->path = $_SERVER['REQUEST_URI'];
        $controller = $this->getController();
        $a = new $controller();
        $action = $this->getAction();
        call_user_func(array($a,'init'));
        call_user_func(array($a,$action));
        call_user_func(array($a,'initView'));
    }
}
