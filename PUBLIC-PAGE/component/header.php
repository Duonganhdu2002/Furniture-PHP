<link rel="stylesheet" href="css/header.css">
<script>
    const shopLink = document.getElementById('shop-link');
    const shopModule = document.getElementById('shop-module');

    shopLink.addEventListener('mouseenter', () => {
        shopModule.style.display = 'block';
    });

    shopLink.addEventListener('mouseleave', () => {
        shopModule.style.display = 'none';
    });
</script>
<?php
$link = new mysqli("localhost", "root", "", "shopping_online");
$sql = "select * from categories";
$result = $link->query($sql);
?>
<div class="header">
    <div class="header-child">
        <div class="logo-brand">
            <a href="">Brand<span>.</span></a>
        </div>
        <div class="menu">
            <div><a class="menu-link" href="">Home</a></div>
            <div class="shop-container">
                <a class="menu-link" href="">Shop</a>
                <div class="shop-module">
                    <ul style="list-style: none; padding-right: 40px; padding-left: 0px">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <li><a href=""><?php echo $row["category_name"]; ?>
                                </a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div><a class="menu-link" href="">About us</a></div>
            <div><a class="menu-link" href="">Services</a></div>
            <div><a class="menu-link" href="">Blog</a></div>
            <div><a class="menu-link" href="">Contact us</a></div>
        </div>
        <div class="user-cart-icon">
            <div class="user-icon">
                <a href="#">
                    <img src="/PUBLIC-PAGE/images/user.svg" alt="ădawdaw">
                </a>
            </div>
            <div class="cart-icon">
                <a href="#">
                    <img src="/PUBLIC-PAGE/images/cart.svg" alt="">
                </a>
            </div>
        </div>
        <div class="menu-icon">
            <a href="#">
                <img src="/PUBLIC-PAGE/images/menu.svg" alt="">
            </a>
        </div>
    </div>
</div>