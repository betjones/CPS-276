<?php
include 'Directories.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dirName = $_POST["dir_name"];
    $content = $_POST["file_content"];

    $directories = new Directories();

    $result = $directories->createDirectoryAndFile($dirName, $content);

    if ($result === true) {
        $message = "<p>Directory and file created successfully.</p>";
        $filePath = "directories/$dirName/readme.txt";
        $link = "<a href='$filePath' target='_blank'>/home/b/e/betjones/public_html/CPS-276/assignments/assignment5/directories</a>";
    } elseif ($result === "exists") {
        $message = "<p>A directory already exists with that name.</p>";
    } else {
        $message = "<p>Error: $result</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File and Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="wrapper" class="container">
    <h1>File and Directory Assignment</h1>
    <p>Enter a folder name and the contents of a file. Folder names should contain alphanumeric characters only.</p>
    <?php echo $message; ?>
    <?php if (!empty($link)) echo "<p>$link</p>"; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="folderName" class="form-label">Folder Name</label>
            <input type="text" class="form-control" id="folderName" name="dir_name" required>
        </div>
        <div class="mb-3">
            <label for="fileContent" class="form-label">File Content</label>
            <textarea class="form-control" id="fileContent" name="file_content" rows="3" required></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
