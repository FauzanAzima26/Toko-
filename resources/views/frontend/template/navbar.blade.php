<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->routeIs('frontend.home') ? 'active' : 'collapsed' }}">
                    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li><a class="nav-link" href="shop.html">Shop</a></li>
                <li><a class="nav-link" href="about.html">About us</a></li>
                <li><a class="nav-link" href="services.html">Services</a></li>
                <li><a class="nav-link" href="blog.html">Blog</a></li>
                <li><a class="nav-link" href="contact.html">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        onclick="toggleDropdown()">
                        <img src="{{ asset('frontend') }}/images/user.svg" alt="User">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="dropdownMenu">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('frontend.cart') }}"><img
                            src="{{ asset('frontend') }}/images/cart.svg"></a></li>
            </ul>

        </div>
    </div>

</nav>
<!-- End Header/Navigation -->

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.toggle("show");
    }

    // Close dropdown jika user klik di luar area dropdown
    document.addEventListener("click", function (event) {
        var dropdown = document.getElementById("dropdownMenu");
        var button = document.getElementById("userDropdown");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("show");
        }
    });
</script>

<style>
    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background: white;
        border: 1px solid #ddd;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        min-width: 120px;
    }

    .dropdown-menu.show {
        display: block;
    }
</style>