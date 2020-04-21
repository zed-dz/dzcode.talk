<?php

class globalJsMessage
{
    protected static $_instance;

    private function __construct()
    {
        $this->messages = array();
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function add($message)
    {
        $this->messages[] = $message;
    }

    public function render()
    {
        if (is_array($this->messages) && count($this->messages)>0) {
            echo "<script>";
            foreach ($this->messages as $value) {
                echo "alert('" . $value . "');";
            }
            echo "</script>";
        }
    }
}

?>