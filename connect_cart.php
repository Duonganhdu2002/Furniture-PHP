<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$link = new mysqli($servername, $username, $password, $dbname);

if(isset($_GET["id_product"])){
    $id = $_GET["id_product"];
    $sql = "SELECT * FROM cart_items WHERE id = $id";
    $result = $link->query($sql);
    $toltal_cart = "SELECT * PROM cart_items";
    $cart_num = mysqli_num_rows($toltal_cart_result);
    
    if(mysqli_num_rows($result) > 0){
        $in_cart = "already In cart";

        echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
    }else{
        $insert = "INSERT INTO cart(id) VALUES ($id)";
        if($link->query($insert) === true){
            $in_cart = "added into cart";
            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }else{
            echo "<script>alert(It doesn't insert)</script>";
        }
    }
}

?>