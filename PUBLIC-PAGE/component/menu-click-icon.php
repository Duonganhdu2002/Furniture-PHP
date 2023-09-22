<link rel="stylesheet" href="/PUBLIC-PAGE/css/menu-click-icon.css">
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuIcon = document.querySelector('.menu-icon');
        const menu = document.querySelector('.menu-click-icon');

        function toggleMenu() {
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'contents';
            } else {
                menu.style.display = 'none';
            }
        }

        menuIcon.addEventListener('click', toggleMenu);

        function hideMenuIfLargeScreen() {
            if (window.innerWidth > 768) {
                menu.style.display = 'none';
            }
        }

        hideMenuIfLargeScreen();

        window.addEventListener('resize', hideMenuIfLargeScreen);
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