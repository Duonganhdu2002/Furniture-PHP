<div style="width: 80%;">
    <form method="post" class="productForm" onsubmit="return submitProductForm();">
        <h1>Add new product</h1>
        <label for="categoryName">Category Name</label><br>
        <input type="text" id="categoryName" name="categoryName" required><br>
        <label for="categoryDescription">Category Description</label><br>
        <input type="text" name="categoryDescription" id="categoryDescription" required><br>
        <button type="submit">Submit</button>
    </form>
</div>
<style>
    /* CSS của bạn */
    .productForm input {
        width: 100%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .productForm label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .productForm button {
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