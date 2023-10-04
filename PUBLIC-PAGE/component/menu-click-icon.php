<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.querySelector('.menu-icon');
        const menu = document.querySelector('.menu-click-icon');

        function toggleMenu() {
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'contents';
            } else {
                menu.style.display = 'none';
            }
        }

        function hideMenuOnLargeScreen() {
            if (window.innerWidth > 768) {
                menu.style.display = 'none';
            }
        }

        // Bật/tắt menu khi nhấp vào biểu tượng
        menuIcon.addEventListener('click', toggleMenu);

        // Ẩn menu trên màn hình lớn khi tải trang và thay đổi kích thước cửa sổ
        hideMenuOnLargeScreen();

        window.addEventListener('resize', hideMenuOnLargeScreen);
    });
</script>

<div class="menu-click-icon" style="display: none;">
    <div>
        <div>
            <a class="menu-link" href="">Home</a>
        </div>
        <div>
            <a class="menu-link" href="">Shop</a>
        </div>
        <div>
            <a class="menu-link" href="">About us</a>
        </div>
        <div>
            <a class="menu-link" href="">Services</a>
        </div>
        <div>
            <a class="menu-link" href="">Blog</a>
        </div>
        <div>
            <a class="menu-link" href="">Contact us</a>
        </div>
    </div>
</div>
<style>
    .menu-click-icon {
        display: none;
        background-color: #3b5d50;
    }

    .menu-click-icon div {
        background-color: #3b5d50;
        padding-top: 6px;
    }

    .menu-click-icon div div {
        width: 100%;
        height: 34px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .menu-click-icon div div a {
        font-size: 14px;
        text-decoration: none;
        color: white;
        opacity: 0.7;
        margin-left: 10px;
    }

    @media (max-width: 768px) {
        .menu-click-icon {
            display: none;
            /* Để ẩn menu ở màn hình lớn hơn 768px */
        }
    }

    @media (max-width: 400px) {
        .menu-click-icon {
            display: contents;
            width: 100%;
            background-color: #3b5d50;
        }
    }
</style>