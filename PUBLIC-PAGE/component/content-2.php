<link rel="stylesheet" href="css/content-2.css">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.product-thumbnail');

        function hideThumbnailsOnLargeScreen() {
            if (window.innerWidth > 400 && window.innerWidth <= 500) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.style.width = '70%';
                });
            } else if (window.innerWidth > 500 && window.innerWidth <= 600) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.style.width = '60%';
                });
            } else if (window.innerWidth > 600 && window.innerWidth <= 768) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.style.width = '50%';
                });
            } else {
                thumbnails.forEach(thumbnail => {
                    thumbnail.style.width = '100%';
                });
            }
        }

        hideThumbnailsOnLargeScreen();

        window.addEventListener('resize', hideThumbnailsOnLargeScreen);
    });
</script>

<!-- Start Product Section -->
<div class="product-section">
    <div class="row">
        <!-- Start Column 1 -->
        <div>
            <h2 class="section-title">Crafted with excellent material.</h2>
            <p class="section-decrition">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
            <p><a href="shop.html" class="btn">Explore</a></p>
        </div>
        <!-- End Column 1 -->

        <!-- Start Column 2 -->
        <div>
            <a class="product-item" href="cart.html">
                <img src="images/product-1.png" class="product-thumbnail">
                <h3 class="product-title">Nordic Chair</h3>
                <strong class="product-price">$50.00</strong>
                <span class="icon-cross">
                    <img src="images/cross.svg">
                </span>
            </a>
        </div>
        <!-- End Column 2 -->

        <!-- Start Column 3 -->
        <div>
            <a class="product-item" href="cart.html">
                <img src="images/product-2.png" class="product-thumbnail">
                <h3 class="product-title">Kruzo Aero Chair</h3>
                <strong class="product-price">$78.00</strong>

                <span class="icon-cross">
                    <img src="images/cross.svg">
                </span>
            </a>
        </div>
        <!-- End Column 3 -->

        <!-- Start Column 4 -->
        <div>
            <a class="product-item" href="cart.html">
                <img src="images/product-3.png" class="product-thumbnail">
                <h3 class="product-title">Ergonomic Chair</h3>
                <strong class="product-price">$43.00</strong>

                <span class="icon-cross">
                    <img src="images/cross.svg">
                </span>
            </a>
        </div>
        <!-- End Column 4 -->

    </div>
</div>
<!-- End Product Section -->