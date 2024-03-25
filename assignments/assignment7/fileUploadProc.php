<?php

require_once 'Crud.php';

class Upload{

private $fileName;
private $fileSize;
private $fileType;
private $fileEnteredName;

// Constructor to initialize properties based on file information
public function __construct() {
    $this->fileSize = $_FILES["file"]["size"];
    $this->fileType = $_FILES["file"]["type"];
    $this->fileName = $_FILES["file"]["name"];
    $this->enteredFileName = $_POST['enteredFileName'];
}

// Method to check file and upload to database
public function checkFile() {
    global $pdo;

    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $fileType = $_FILES["file"]["type"];
        $fileTmpName = $_FILES["file"]["tmp_name"];

        $sql = "INSERT INTO files (file_name, file_size, file_type, file_data) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        $fileStream = fopen($fileTmpName, 'rb');

        $stmt->bindParam(1, $fileName);
        $stmt->bindParam(2, $fileSize);
        $stmt->bindParam(3, $fileType);
        $stmt->bindParam(4, $fileStream, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            $output = "File information inserted into database.";
        } else {
            $output = "Error inserting file information into database.";
        }

        fclose($fileStream);
    } else {
        $output = "Error uploading file.";
    }

    return $output;
}
function moveFile(){

if(move_uploaded_file($_FILES["file"]["tmp_name"], "files".$this->fileName)){

$crudsicle = new Crud();
return $crudsicle->addFile();

}else{
return "There was a problem uploading your file. Please try again.";
}
}

}

?>