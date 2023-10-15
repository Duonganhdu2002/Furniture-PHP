<div class="side-bar" id="side-bar">
    <div class="logo-brand" onclick="toggleSidebar()">
        <div class="logo">
            <a href="#">
                <img src="../PUBLIC-PAGE/images/logo-black.svg" alt="">
            </a>
        </div>
        <a id="brand-letter" style="opacity: 0.8;">Nova<span>.</span></a>
    </div>
    <div class="menu-bar">
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/category.svg" alt=""></a>
            <a href="#">Category</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/product.svg" alt=""></a>
            <a href="#">Product</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/brand.svg" alt=""></a>
            <a href="#">Brand</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/member.svg" alt=""></a>
            <a href="#">Member</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/customer.svg" alt=""></a>
            <a href="#">Customer</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/order.svg" alt=""></a>
            <a href="#">Order</a>
        </div>
        <div>
            <a href="#"><img src="../PUBLIC-PAGE/images/revenue.svg" alt=""></a>
            <a href="#">Revenue</a>
        </div>
    </div>
</div>
<script>
    function toggleSidebar() {
        var sideBar = document.getElementById("side-bar");
        var rightSide = document.getElementById("right-side");
        var brandLetter = document.getElementById("brand-letter");

        if (sideBar.style.width === "15%") {
            sideBar.style.width = "5%";
            rightSide.style.width = "95%";
            brandLetter.style.display = "none";
        } else {
            sideBar.style.width = "15%";
            rightSide.style.width = "85%";
            brandLetter.style.display = "block";
        }
    }
</script>
<style>
    .side-bar {
        width: 15%;
        border-right: 1px solid transparent;
        box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.3);
    }

    .menu-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .menu-bar div {
        font-size: 16px;
        font-weight: bold;
        width: 70%;
        margin: 5px 0 5px 0;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
    }

    .menu-bar div:hover {
        background-color: #F0F7FF;
    }


    .menu-bar div a {
        text-decoration: none;
        color: #3b5d50;
        font-size: 18px;
    }

    .menu-bar div a img {
        width: 30px;
        margin-right: 20px;
    }

    .logo-brand {
        height: 7%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo-brand img {
        width: 50px;
    }

    .logo-brand a {
        text-decoration: none;
        color: #000000;
        font-size: 28px;
        font-weight: bold;
        margin-left: 10px;
    }
</style>