<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$link = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET["id_product"])){
    $id = $_GET["id_product"];
    echo "cccccccccc $id";
    // $sql = "SELECT * FROM cart_items WHERE id = $id";
    // $result = $link->query($sql);
    // $total_cart = "SELECT * FROM cart_items"; // Sửa PROM thành FROM
    // $cart_num = mysqli_num_rows($total_cart_result); // Sửa $toltal_cart_result thành $total_cart
    
    // if(mysqli_num_rows($result) > 0){
    //     $in_cart = "already In cart";

    //     echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    // }else{
    //     $insert = "INSERT INTO cart_items(id) VALUES ($id)"; // Sửa thành cart_items
    //     if($link->query($insert) === true){
    //         $in_cart = "added into cart";
    //         echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    //     }else{
    //         echo "<script>alert('It doesn't insert')</script>"; // Sửa dấu nháy đơn để bao quanh thông báo
    //     }
    // }
}

?>
