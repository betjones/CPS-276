<?php

require_once 'Crud.php';

function createList(){

$crud = new Crud();
return $crud->getFiles();
}


?>
