<?php
// Initialize variables for the type of adding, button ID, and form ID
$typeOfAdding = '';
$idButton = '';
$formId = '';

// Check if the 'pid' parameter is set in the URL
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];

    // Determine the type of adding based on the 'pid' value
    switch ($id) {
        case '1':
            $typeOfAdding = 'Add new category';
            $idButton = 'categoryButton';
            $formId = 'categoryForm';
            break;
        case '2':
            $typeOfAdding = 'Add new product';
            $idButton = 'productButton';
            $formId = 'productForm';
            break;
        case '3':
            $typeOfAdding = 'Add new brand';
            $idButton = 'brandButton';
            $formId = 'brandForm';
            break;
        case '4':
            $typeOfAdding = 'Add new member';
            $idButton = 'memberButton';
            $formId = 'memberForm';
            break;
    }
}
?>

<!-- Add new item button -->
<a class="button-add" id="<?php echo $idButton; ?>" href="../ADMIN/index.php?pid=<?php echo $id; ?>&add-new" onclick="handleButtonClick('<?php echo $id; ?>')">
    <button style="background-color: #3b5d50; border: none; font-size: 16px; color: white;">
        <?php echo $typeOfAdding; ?>
    </button>
</a>

<script>
// JavaScript function to get the form ID based on the 'pid' value
function getFormId(id) {
    switch (id) {
        case '1':
            return 'categoryForm';
        case '2':
            return 'productForm';
        case '3':
            return 'brandForm';
        case '4':
            return 'memberForm';
        default:
            return null;
    }
}
</script>
