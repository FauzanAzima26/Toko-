@include('frontend.template.navbar')

<!-- Bootstrap CSS -->
<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/css/tiny-slider.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="cart-body">
              <!-- Data akan ditampilkan di sini oleh JavaScript -->
            </tbody>
          </table>

        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6">
            <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Subtotal</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$230.00</strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">$230.00</strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To
                  Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Start Footer Section -->
<footer class="footer-section">
  <div class="container relative">

    <div class="sofa-img">
      <img src="images/sofa.png" alt="Image" class="img-fluid">
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="subscription-form">
          <h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image"
                class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

          <form action="#" class="row g-3">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="col-auto">
              <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="col-auto">
              <button class="btn btn-primary">
                <span class="fa fa-paper-plane"></span>
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <div class="row g-5 mb-5">
      <div class="col-lg-4">
        <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
        <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada.
          Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

        <ul class="list-unstyled custom-social">
          <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
        </ul>
      </div>

      <div class="col-lg-8">
        <div class="row links-wrap">
          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Knowledge base</a></li>
              <li><a href="#">Live chat</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Our team</a></li>
              <li><a href="#">Leadership</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">Nordic Chair</a></li>
              <li><a href="#">Kruzo Aero</a></li>
              <li><a href="#">Ergonomic Chair</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="border-top copyright">
      <div class="row pt-4">
        <div class="col-lg-6">
          <p class="mb-2 text-center text-lg-start">Copyright &copy;
            <script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love
            by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>
            <!-- License information: https://untree.co/license/ -->
          </p>
        </div>

        <div class="col-lg-6 text-center text-lg-end">
          <ul class="list-unstyled d-inline-flex ms-auto">
            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>

      </div>
    </div>

  </div>
</footer>

<script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
<script src="{{ asset('frontend') }}/js/custom.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartContainer = document.getElementById("cart-body");
    cartContainer.innerHTML = ""; // Kosongkan dulu

    if (cart.length === 0) {
      cartContainer.innerHTML = "<tr><td colspan='6' class='text-center'>Keranjang kosong</td></tr>";
    } else {
      cart.forEach((item, index) => {
        cartContainer.innerHTML += `
                    <tr>
                        <td><img src="${item.image}" class="img-fluid" style="width: 50px;"></td>
                        <td>${item.jasa_produk}</td>
                        <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                        <td>${item.quantity}</td>
                        <td>Rp ${(item.harga * item.quantity).toLocaleString('id-ID')}</td>
                        <td><button onclick="removeItem(${index})" class="btn btn-danger btn-sm">X</button></td>
                    </tr>
                `;
      });
    }
  });

  function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    location.reload(); // Refresh halaman
  }
</script>