<br>
<div align="center">
    <div style="color: #ff3366; font-style: oblique; font-weight: bold; " align="center">ADD PRODUCT</div>
    <div align="center">
        <form id="dangky" method="post" enctype="multipart/form-data" action="ADMIN/component/them_sp.php" style="width: 700px;">
            <table  style="border-collapse: collapse; color:blue; width: 700; border: 1;">
                <tr>
                    <td width="150">CATEGORY</td>
                    <td width="450">
                        <select class="dangky" name="category" id="">
                            <option value="TABLE">TABLE</option>
                            <option value="CHAIR">CHAIR</option>
                            <option value="BATHUB">BATHUB</option>
                            <option value="BED">BED</option>
                            <option value="LED">LED</option>
                            <option value="MIRROR">MIRROR</option>
                            <option value="SHELVES">SHELVES</option>
                            <option value="SINK">SINK</option>
                            <option value="SOFA">SOFA</option>
                            <option value="TAPESTRY">TAPESTRY</option>
                            <option value="TOILET">TOILET</option>
                            <option value="WARDROBE">WARDROBE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>BRAND</td>
                    <td><input type="text" class="dangky" name="brand"></td>
                </tr>
                <tr>
                    <td>PRODUCT_NAME</td>
                    <td><input type="text" class="dangky" name="product_name"></td>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td><input type="number" class="dangky" name="price" id=""></td>
                </tr>
                <tr>
                    <td>IMAGE</td>
                    <td><input type="file" class="dangky" name="image"></td>
                </tr>
                <tr>
                    <td height="113">DESCRIPTION</td>
                    <td><textarea name="description" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input class="tieudebtn" type="submit" value="SAVE"></td>
                </tr>
            </table>
        </form> 
    </div>
    <div class="backbtndiv"><button class="tieudebtn" onclick="history.back();">BACK</button></div>
</div>
