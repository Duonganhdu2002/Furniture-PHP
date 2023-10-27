<script>
    // Hàm hiển thị modal
    function updateModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'flex';
    }

    // Hàm đóng modal
    function closeModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }

    // Đóng modal khi click bên ngoài nó
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>

<div id="myModal" class="modal">
    <div class="modal-content">
        <!-- Nội dung modal ở đây -->
        <input type="hidden">
        <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div style="width: 90%;">
                <form method="post" action="" class="categoryForm" onsubmit="return submitCategoryForm();">
                    <h1>Update category</h1>

                    <label for="categoryName">Category Name</label><br>
                    <input type="text" id="categoryName" name="categoryName" required><br>
                    <label for="categoryDescription">Category Description</label><br>
                    <textarea name="categoryDescription" id="categoryDescription" cols="30" rows="10"></textarea> <br>
                    <button type="submit">Change</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .categoryForm h1 {
        color: #3b5d50;
    }

    .categoryForm input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .categoryForm textarea {
        resize: none;
        width: 99%;
        height: 200px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .categoryForm label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .categoryForm button {
        width: 80px;
        height: 40px;
        border: none;
        border-radius: 5px;
        background-color: #3b5d50;
        color: white;
        font-size: 16px;
        margin-top: 30px;
    }
</style>



<style>
    /* Style cho modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        width: 50%;
        height: 70%;
        border-radius: 5px;
    }

    /* Style cho nút chỉnh sửa */
    .edit-button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>