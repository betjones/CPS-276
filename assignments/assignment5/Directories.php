<?php
class Directories {
    public function createDirectoryAndFile($dirName, $content) {
        if (file_exists("directories/$dirName")) {
            return "A directory already exists with that name.";
        }

        if (!mkdir("directories/$dirName", 0777)) {
            return "Failed to create directory.";
        }

        if (!file_put_contents("directories/$dirName/readme.txt", $content)) {
            return "Failed to create file.";
        }

        return true;
    }
}
?>
