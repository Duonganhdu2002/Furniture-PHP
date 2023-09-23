<link rel="stylesheet" href="/PUBLIC-PAGE/css/menu-click-icon.css">
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