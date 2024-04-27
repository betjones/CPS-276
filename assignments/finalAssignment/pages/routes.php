<?php



$path = "index.php?page=login";

$nav=<<<HTML
    <nav>
        <ul>
            <li><a href="index.php?page=welcome">Welcome</a></li>
            <li><a href="index.php?page=addAdmin">Add Admin Information</a></li>
            <li><a href="index.php?page=addContact">Add Contact Information</a></li>
            <li><a href="index.php?page=deleteAdmins">Delete Admin Information</a></li>
            <li><a href="index.php?page=deleteContacts">Delete contact Information</a></li>
            <li><a href="index.php?page=login">Log in</a></li>

        </ul>
    </nav>
HTML;



if(isset($_GET)){
    
    if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();
    }

    else if($_GET['page'] === "addContacts"){
        require_once('pages/addContacts.php');
        $result = init();
    }
    else if($_GET['page'] === "deleteAdmin"){
        require_once('pages/deleteAdmin.php');
        $result = init();
    }
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }
    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}



?>