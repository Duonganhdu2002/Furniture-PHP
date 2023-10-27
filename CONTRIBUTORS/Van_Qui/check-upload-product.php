<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}
if (empty($_FILES) || !isset($_FILES)) {
    exit("$_FILES is empty!");
}

if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
    switch ($_FILES["image"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            exit("File only partially uploaded");
            break;
        case UPLOAD_ERR_NO_FILE:
            exit("No file was uploaded");
            break;
        case UPLOAD_ERR_EXTENSION:
            exit("File upload stopped by a PHP extension");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            exit("File exceeds MAX_FILE_SIZE in the HTML form");
            break;
        case UPLOAD_ERR_INI_SIZE:
            exit("File exceeds upload_max_filesize in php.ini");
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            exit("Temporaray folder not found");
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit("Failed to write file");
            break;
        default:
            exit("Unknown uploaded file");
            break;
    }
}

if ($_FILES["image"]["size"] > 1048576) {
    exit("File too large (max 1MB).");
}

$fileName = $_FILES["image"]["name"];

$destination = __DIR__ ."/image/". $fileName;

if (!move_uploaded_file($_FILES["image"][""], $destination)) {
    exit("Can't move upload file");
}

print_r($_FILES);
