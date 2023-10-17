<?php
$typeOfAdding = '';

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    switch ($id) {
        case '1':
            $typeOfAdding = 'Add new category';
            break;
        case '2':
            $typeOfAdding = 'Add new product';
            break;
        case '3':
            $typeOfAdding = 'Add new brand';
            break;
        case '4':
            $typeOfAdding = 'Add new member';
            break;
    }
}
?>

<button class="button-add">
    <?php echo $typeOfAdding; ?>
</button>