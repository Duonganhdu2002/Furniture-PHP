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
            <a href="">Nova<span>.</span></a>
        </div>
        <div class="menu">
            <div><a style="<?php echo $headerHomeHomeLinkCss ?>" class="menu-link" href="index.php">Home</a></div>
            <div class="shop-container">
                <a style="<?php echo $headerHomeShopLinkCss ?>" class="menu-link" href="index.php?pid=1">Shop</a>
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
            <div><a style="<?php echo $headerHomeAboutUsLinkCss ?>" class="menu-link" href="index.php?pid=2">About us</a></div>
            <div><a style="<?php echo $headerHomeServicesLinkCss ?>" class="menu-link" href="index.php?pid=3">Services</a></div>
            <div><a style="<?php echo $headerHomeBlogLinkCss ?>" class="menu-link" href="index.php?pid=4">Blog</a></div>
            <div><a style="<?php echo $headerHomeContactUsLinkCss ?>" class="menu-link" href="index.php?pid=5">Contact us</a></div>
        </div>
        <div class="user-cart-icon">
            <div class="user-icon">
                <a href="#">
                    <img src="/PUBLIC-PAGE/images/user.svg" alt="">
                </a>
            </div>
            <div class="cart-icon">
                <a href="index.php?pid=6">
                    <img src="/PUBLIC-PAGE/images/cart.svg" alt="">
                </a>
            </div>
        </div>
        <div class="menu-icon">
            <a href="">
                <img src="/PUBLIC-PAGE/images/menu.svg" alt="">
            </a>
        </div>
    </div>
</div>
<style>
    .header {
        height: 10vh;
        background-color: #3b5d50;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-child {
        display: flex;
        align-items: center;
        width: 68%;
        justify-content: center;
    }

    .logo-brand {
        width: 20%;
        display: flex;
    }

    .menu {
        width: 65%;
        display: flex;
        justify-content: end;
    }

    .menu a {
        margin-left: 42px;
        margin-top: 15px;
        display: inline-block;
        position: relative;
        font-size: 16px;
        font-weight: 300;
        opacity: 0.6;
        text-decoration: none;
        color: #ffffff;
        padding-bottom: 14px;
        transition: color 0.3s ease, opacity 0.3s ease;
    }

    .menu a:hover {
        color: #ffffff;
        opacity: 1;
    }

    .menu a::after {
        content: "";
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 6px;
        background-color: #f9bf29;
        transition: width 0.3s ease;
    }

    .menu a:hover::after {
        width: 100%;
    }

    .user-cart-icon {
        width: 15%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .user-cart-icon div {
        margin-left: 50px;
    }

    .menu-icon {
        width: 5%;
        display: none;
    }

    .logo-brand a {
        text-decoration: none;
        color: #eff2f1;
        font-size: 32px;
        font-weight: 600;
    }

    .logo-brand a span {
        font-size: 32px;
        font-weight: 600;
        opacity: 0.7;
    }

    .shop-module {
        display: none;
        position: absolute;
        background-color: #3b5d50;
        border: 1px solid #ccc;
        z-index: 2;
    }

    .shop-container:hover .shop-module {
        display: block;
    }

    @media (max-width: 400px) {
        .header {
            height: 80px;
            width: 100%;
        }

        .header-child {
            width: 100%;
        }

        .logo-brand {
            width: 100%;
            margin-left: 30px;
        }

        .menu {
            display: none;
        }

        .user-cart-icon {
            display: none;
        }

        .menu-icon {
            display: flex;
            width: 100%;
            justify-content: end;
            align-items: center;
            margin-right: 20px;
            opacity: 0.7;
        }
    }

    @media (max-width: 768px) {
        .header {
            height: 80px;
            width: 100%;
        }

        .header-child {
            width: 100%;
        }

        .logo-brand {
            width: 100%;
            margin-left: 10px;
        }

        .menu {
            display: none;
        }

        .user-cart-icon {
            display: none;
        }

        .menu-icon {
            display: flex;
            width: 100%;
            justify-content: end;
            align-items: center;
            margin-right: 20px;
            opacity: 0.7;
        }
    }
</style>