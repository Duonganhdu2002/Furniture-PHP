<div class="user-cart">
    <div class="user-cart-child">
        <h2>Your cart</h2>
        <table>
            <tr></tr>
        </table>
        <?php
            if(isset($_SESSION["username_user"])) {
                echo "".$_SESSION["username_user"]."";
            }
        ?>
    </div>
</div>
<style>
    .user-cart {
        display: flex;
        justify-content: center;
    }
    .user-cart .user-cart-child {
        width: 68%;
    }
</style>