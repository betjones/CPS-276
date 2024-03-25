<?php

require_once "Pdo_methods.php";

class Crud extends PdoMethods{

public function getFiles(){

/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
$pdo = new PdoMethods();

/* CREATE THE SQL */
$sql = "SELECT DISTINCT file_name, file_path FROM files ORDER BY file_name";

$records = $pdo->selectNotBinded($sql);

/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
if($records == 'error'){
return 'There has been and error processing your request';
}
else {
if(count($records) != 0){
return $this->displayLinks($records);
}
else {
return "No files found.";
}
}
}


public function addFile(){

$pdo = new PdoMethods();

/* HERE I CREATE THE SQL STATEMENT and I AM BINDING THE PARAMETERS */
$sql = "INSERT INTO files (file_name, file_path, file_name) VALUES (:fname, :fpath, :enteredname)";

/* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
$bindings = [
[':filekey',$_FILES["file"]["name"],'str'],
[':filename',$_POST["file"],'str'],
[':filepath',"files/".$_FILES["file"]["name"],'str']
];

/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
$result = $pdo->otherBinded($sql, $bindings);

/* HERE I AM USING AN OBJECT TO RETURN WHETHER SUCCESSFUL FOR ERROR */
if($result === 'error'){
return 'There was an error adding the name';
}
else {
return "The file has been added successfully.";
}
}

private function displayLinks($records){
$list = '<ul>';
foreach ($records as $row){
$list .= "<li><a target='_blank' href={$row['file_path']}>{$row['file_name']}</li>";
}
$list .= '</ul>';
return $list;
}

}

?>