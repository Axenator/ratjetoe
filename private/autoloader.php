<?php
    function my_autoloader($class){
        $file = "../private/managers/$class.php";

        if (file_exists($file)){
            require_once "$file";
        }
    }

    spl_autoload_register('my_autoloader');
?>