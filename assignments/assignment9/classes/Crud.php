<?php

class Crud{

    // public function init(){
    //     if(count($_POST) > 0){
    //         if(isset($_POST['addNote'])){
    //             return $this->addNote();
    //         }
    //         else if(isset($_POST['update'])){
    //             return $this->updateNotes($_POST);
    //         }
    //         else {
    //             return "";
    //         }
    //     }
    // }

    public function getNotes(){
        $pdo = new PdoMethods();
        $sql = "SELECT * FROM notes"; // Change table name to 'notes'
        $records = $pdo->selectNotBinded($sql); // Assuming you have a method named 'selectNotBinded' for fetching records
        return $records;
    }

    private function addNote(){
        $pdo = new PdoMethods();
        $sql = "INSERT INTO notes (timestamp, note) VALUES (:timestamp, :note)"; // Adjust column names
        $bindings = [
            [':timestamp', $_POST['timestamp'], 'str'], // Adjust input names
            [':note', $_POST['note'], 'str'] // Adjust input names
        ];
        $result = $pdo->otherBinded($sql, $bindings);
        if($result === 'error'){
            return 'There was an error adding the note';
        }
        else {
            return 'Note has been added';
        }
    }

    private function updateNotes($post){
        $error = false;
        if(isset($post['inputDeleteChk'])){
            foreach($post['inputDeleteChk'] as $id){
                $pdo = new PdoMethods();
                $sql = "UPDATE notes SET timestamp = :timestamp, note = :note WHERE id = :id"; // Adjust column names
                $bindings = [
                    [':timestamp', $post["timestamp^^{$id}"], 'str'], // Adjust input names
                    [':note', $post["note^^{$id}"], 'str'], // Adjust input names
                    [':id', $id, 'str']
                ];
                $result = $pdo->otherBinded($sql, $bindings);
                if($result === 'error'){
                    $error = true;
                    break;
                }
            }
            if($error){
                return "There was an error in updating a note or notes";
            }
            else {
                return "All notes updated";
            }
        }
        else {
            return "No notes selected to update";
        }
    }

    private function createList($records){
        $list = '<ul>'; // Change from ordered list to unordered list
        foreach ($records as $row){
            $list .= "<li>{$row['timestamp']} - {$row['note']}</li>"; // Adjust field names
        }
        $list .= '</ul>';
        return $list;
    }

    private function createInput($records){
        $output = "<form method='post' action='update_delete_note.php'>"; // Adjust action file name
        $output .= "<input class='btn btn-success' type='submit' name='update' value='Update'>";
        $output .= "<input class='btn btn-danger' type='submit' name='delete' value='Delete'>";
        $output .= "<table class='table table-bordered table-striped'><thead><tr>";
        $output .= "<th>Timestamp</th><th>Note</th><th>Update/Delete</th><tbody>"; // Adjust table headers
        foreach ($records as $row){
            $output .= "<tr><td><input type='text' class='form-control' name='timestamp^^{$row['id']}' value='{$row['timestamp']}'></td>"; // Adjust field names
            $output .= "<td><input type='text' class='form-control' name='note^^{$row['id']}' value='{$row['note']}'></td>"; // Adjust field names
            $output .= "<td><input type='checkbox' name='inputDeleteChk[]' value='{$row['id']}'></td></tr>";
        }
        $output .= "</tbody></table></form>";
        return $output;
    }
}
?>
