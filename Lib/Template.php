<?php

class Lib_Template {
    private $dir_phtml; // Директория с phml-файлами
    private $data = array(); // Данные для вывода
    protected static $instance = null;
    protected  function __construct() {

        $this->dir_phtml = Lib_Application::getInstance()->getViews();

    }

    /* Метод для добавления новых значений в данные для вывода */
    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    /* Метод для удаления значений из данных для вывода */
    public function delete($name) {
        unset($this->data[$name]);
    }

    /* При обращении, например, к $this->title будет выводиться $this->data["title"] */
    public function __get($name) {
        if (isset($this->data[$name])) return $this->data[$name];
        return "";
    }

    /* Вывод tpl-файла, в который подставляются все данные для вывода */
    public function display() {
        $template = $this->dir_phtml;
        ob_start();
        include ($template);
        echo ob_get_clean();
    }
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
