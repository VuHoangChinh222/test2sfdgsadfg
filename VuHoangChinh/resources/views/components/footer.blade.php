<style>
    a {
        text-decoration: none;
        color: #cc3060;

    }
</style>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-item">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <p class="about">Our shop is the best choice for buing footwear</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/chinh.vuhoang.5" target="_blank">
                    <i class="fi fi-brands-facebook"></i>
                </a>
                <a href="https://www.instagram.com/?hl=en" target="_blank">
                    <i class="fi fi-brands-instagram"></i>
                </a>
            </div>
        </div>
        @foreach ($footerMenu as $footer)
            <x-footer-item :$footer />
        @endforeach
    </div>
    <div class="container copyright">
        <p>
            © 2024 All rights reserved. Designed by
            <a href="https://www.facebook.com/chinh.vuhoang.5/" target="_blank">Vu Hoang Chinh</a>
        </p>
    </div>
</footer>
