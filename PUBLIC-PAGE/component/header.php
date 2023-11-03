<script>
    const shopLink = document.getElementById('shop-link');
    const shopModule = document.getElementById('shop-module');
    const userModule = document.getElementById('user-module');

    shopLink.addEventListener('mouseenter', () => {
        shopModule.style.display = 'block';
    });

    shopLink.addEventListener('mouseleave', () => {
        shopModule.style.display = 'none';
    });

    function handleEnter(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myForm").submit(); // Submit form
        }
    }
</script>

<?php
$link = new mysqli("localhost", "root", "", "shopping_online");
$sql = "select * from categories";
$result = $link->query($sql);
?>
<div class="header">

    <div class="header-child">

        <div class="logo-brand">
            <div class="logo">
                <a href="../PUBLIC-PAGE/index.php">
                    <img src="./images/logo.svg" alt="">
                </a>
            </div>
            <a href="../PUBLIC-PAGE/index.php">Nova<span>.</span></a>
        </div>

        <div class="search-products">
            <form action="index.php?pid=9&categoryId=0" method="post" id="myForm">
                <input style="width: 100%; height: 40px; padding-left: 20px; border: none; border-radius: 5px; color: #3b5d50" placeholder="What are you looking for?" type="text" name="search" id="search" onkeydown="handleEnter(event)">
            </form>
        </div>
        <div class="menu">
            <div><a style="<?php echo $headerHomeHomeLinkCss ?>" class="menu-link" href="index.php">Home</a></div>
            <div class="shop-container">
                <a style="<?php echo $headerHomeShopLinkCss ?>" class="menu-link" href="index.php?pid=1">Shop</a>
                <!-- <div class="shop-module">
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
                </div> -->
            </div>
            <div><a style="<?php echo $headerHomeAboutUsLinkCss ?>" class="menu-link" href="index.php?pid=2">About us</a></div>
            <div><a style="<?php echo $headerHomeServicesLinkCss ?>" class="menu-link" href="index.php?pid=3">Services</a></div>
            <div><a style="<?php echo $headerHomeBlogLinkCss ?>" class="menu-link" href="index.php?pid=4">Blog</a></div>
            <div><a style="<?php echo $headerHomeContactUsLinkCss ?>" class="menu-link" href="index.php?pid=5">Contact us</a></div>
        </div>
        <div class="user-cart-icon">
            <div class="user-icon">
                <a href="index.php?pid=11">
                    <img src="../PUBLIC-PAGE/images/user.svg" alt="">
                </a>
                <div class="user-module">
                    <div class="login-module"><a href="../PUBLIC-PAGE/login.php" style="width:100% ;text-align: center; font-size: 18px;">Login</a></div>
                    <div class="register-module"><a href="../PUBLIC-PAGE/register.php" style="text-align: center; font-size: 18px;">Register</a></div>
                    <div class="logout-module"><a href="#" style="text-align: center; font-size: 18px;">Logout</a></div>
                </div>
            </div>
            <div class="cart-icon">
                <a style="display: flex;" href="index.php?pid=6">
                    <img src="../PUBLIC-PAGE/images/cart.svg" alt="">
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $cartItemCount = count($_SESSION['cart']);
                        if ($cartItemCount > 0) {
                            echo '<span style="background-color: crimson; padding: 5px 10px 5px 10px; border-radius: 30px; font-size: 12px; margin-bottom: 10px; color: #ffffff">';
                            echo "$cartItemCount";
                            echo '</span>';
                        }
                    }
                    ?>
                </a>
            </div>
        </div>
        <div class="menu-icon">
            <a href="">
                <img src="../PUBLIC-PAGE/images/menu.svg" alt="">
            </a>
        </div>
    </div>
</div>
<style>
    .header {
        z-index: 1;
        height: 10vh;
        background-color: #3b5d50;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
    }

    .header-child {
        display: flex;
        align-items: center;
        width: 72%;
        justify-content: center;
    }

    .logo-brand {
        width: 17%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo {
        width: 27%;
        justify-content: center;
        align-items: center;
    }


    .search-products {
        width: 30%;
    }

    .menu {
        width: 47%;
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

    .user-cart-icon a {
        margin-left: 10px;
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

    .user-module {
        display: none;
        position: absolute;
        background-color: #3b5d50;
        border: 2px solid white;
        /* z-index: 2; */
        width: 5%;
        /* height: 100px; */
        border-radius: 10px;
        /* top: 65px; */
        /* left: 78%; */
        
    }

    .user-icon div {
        margin-left: 0px;
    }

    .user-icon:hover .user-module {
        display: block;
        box-shadow: 0 0 10px #ffffff;
    }

    .action-buttons {
        z-index: 1.0;
        position: absolute;
        display: flex;
        flex-direction: column;
        margin-left: 30px;
        margin-top: 0px;
        display: none;
    }

    .login-button {
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid white;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .login-button:hover {
        opacity: 0.7;
    }

    .register-button {
        border-radius: 0 0 10px 10px;
        border: none;
        width: 100%;
    }

    .register-button:hover {
        opacity: 0.7;
    }

    .action-buttons button {
        padding: 10px 28px 10px 28px;
        background-color: #3b5d50;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .login-module,
    .register-module,
    .logout-module {
        /* background-color: #f9bf29; */
        /* color: #f9bf29; */
        opacity: 0.6;
        border-radius: 8px;
        transition: background-color 0.5s, width 0.5s ease;
    }

    .login-module,
    .register-module,
    .logout-module {
        display: flex; /* Sử dụng display: flex để căn giữa các thẻ con theo chiều dọc */
        align-items: center; /* Đảm bảo các thẻ con nằm giữa theo chiều dọc */
        justify-content: center; /* Đảm bảo các thẻ con nằm giữa theo chiều ngang */
        height: 50px;
    }

    .login-module a,
    .register-module a,
    .logout-module a{
        padding: 0; /* Loại bỏ padding */
        opacity: 1;
        display:flex;
        margin-left: 0px;
        margin-bottom: auto;
        margin-top: auto;
        width: 100%;
        height: 100%;
        /* background-color: black; */
        text-align: center;
        justify-content: center;
        align-items: center;
    }

    .login-module:hover {
        opacity: 1;
        background-color: #f9bf29;
        color: #3b5d50;
        border-radius: 8px;
    }

    .register-module:hover {
        opacity: 1;
        background-color: #f9bf29;
        color: #3b5d50;
        border-radius: 8px;
    }

    .logout-module:hover {
        opacity: 1;
        background-color: #f9bf29;
        color: #3b5d50;
        border-radius: 8px;
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