<?php
$conn = new mysqli('localhost', 'root', '', 'shopping_online');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<div style="display: flex; align-items: center; flex-direction: column;">
    <div style="width: 68%;" class="productFormContainer">
        <h1>Add Product</h1>
        <form action="process_form.php" method="post">
            <div style="display: flex; justify-content: space-between">
                <div style="width: 30%;">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" required><br>
                </div>
                <div style="width: 20%;">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price"><br>
                </div>
                <div style="width: 20%;">
                    <label for="stockQuantity">Stock Quantity:</label>
                    <input type="text" id="stockQuantity" name="stockQuantity"><br>
                </div>
            </div>
            <div>
                <label for="productDescription">Description:</label>
                <textarea id="productDescription" name="productDescription" rows="4" cols="50"></textarea><br>
            </div>
            <label for="image">Image:</label>
            <input style="border: none;" type="file" id="image" name="image"><br>
            <div style="display: flex;">
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <?php
                        $categorySql = "SELECT id, category_name FROM categories";
                        $categoryResult = $conn->query($categorySql);

                        if ($categoryResult->num_rows > 0) {
                            while ($row = $categoryResult->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>
                <div>
                    <label for="brand">Brand:</label>
                    <select id="brand" name="brand">
                        <?php
                        $brandSql = "SELECT id, brand_name FROM brands";
                        $brandResult = $conn->query($brandSql);

                        if ($brandResult->num_rows > 0) {
                            while ($row = $brandResult->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['brand_name'] . "</option>";
                            }
                        }
                        ?>
                    </select><br>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<?php
$conn->close();
?>

<style>
    .productFormContainer h1 {
        color: #3b5d50;
        justify-content: space-between;
    }

    .productFormContainer input {
        width: 99%;
        height: 30px;
        border: 1px solid #3b5d50;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
    }

    .productFormContainer textarea {
        resize: none;
        width: 99%;
        height: 150px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px;
        border: 1px solid #3b5d50;
    }

    .productFormContainer label {
        margin-top: 20px;
        margin-bottom: 20px;
        line-height: 4.0;
    }

    .productFormContainer button {
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

