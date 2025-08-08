
<?php


function autoload($class){
    $cDir = ['Entity'];
    $iDir = null;


    foreach($cDir as $dirName):

    if(!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $class . ".class.php")):

    include_once(__DIR__ .  DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $class . ".class.php");
    $iDir= true;

    endif;

    endforeach;
}



spl_autoload_register('autoload');
