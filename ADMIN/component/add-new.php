<?php
$typeOfAdding = '';
$idButton = '';

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
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

<button class="button-add" id="<?php echo $idButton; ?>" onclick="handleButtonClick('<?php echo $id; ?>')">
    <?php echo $typeOfAdding; ?>
</button>

<div id="<?php echo $formId; ?>" class="modal" style="display: none;">
    <div class="modal-content">
        <?php if ($id == '1') : ?>
            <?php
            include "component/form/category.php";
            ?>
        <?php elseif ($id == '2') : ?>
            <!-- Đặt biểu mẫu thêm product ở đây -->
            <form>
                <!-- Mã HTML của biểu mẫu -->
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName">
                <button type="submit">Submit</button>
            </form>
        <?php elseif ($id == '3') : ?>
            <!-- Đặt biểu mẫu thêm brand ở đây -->
            <form>
                <!-- Mã HTML của biểu mẫu -->
                <label for="brandName">Brand Name:</label>
                <input type="text" id="brandName" name="brandName">
                <button type="submit">Submit</button>
            </form>
        <?php elseif ($id == '4') : ?>
            <!-- Đặt biểu mẫu thêm member ở đây -->
            <form>
                <!-- Mã HTML của biểu mẫu -->
                <label for="memberName">Member Name:</label>
                <input type="text" id="memberName" name="memberName">
                <button type="submit">Submit</button>
            </form>
        <?php endif; ?>
        <button class="close-button" onclick="closeModal('<?php echo $formId; ?>')">Close</button>
    </div>
</div>

<script>
    function handleButtonClick(id) {
        // Ẩn tất cả các div chứa biểu mẫu
        hideAllForms();

        // Hiển thị div chứa biểu mẫu tương ứng với id
        var formId = getFormId(id);
        if (formId) {
            document.getElementById(formId).style.display = 'block';
        }
    }

    function hideAllForms() {
        // Ẩn tất cả các div chứa biểu mẫu
        var forms = document.querySelectorAll('[id$="Form"]');
        forms.forEach(function(form) {
            form.style.display = 'none';
        });
    }

    function closeModal(formId) {
        // Ẩn modal khi người dùng nhấp vào nút "Close"
        document.getElementById(formId).style.display = 'none';
    }

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

<style>

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .modal-content {
        position: absolute;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 85%;
        width: 40%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        border-radius: 5px;
        padding: 10px 20px 10px 20px;
        cursor: pointer;
        font-size: 16px;
        background-color: crimson;
        color: white;
    }
</style>