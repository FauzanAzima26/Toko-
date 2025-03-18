@include('frontend.template.navbar')

<!-- Bootstrap CSS -->
<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/css/tiny-slider.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>About Us</h1>
                    <p class="mb-4">Kami siap melayani Anda dengan keramahan terbaik. Pesanan Anda akan dikerjakan oleh
                        tenaga profesional menggunakan mesin berteknologi modern untuk hasil yang maksimal. Kami juga
                        menjamin setiap order cetak selesai tepat waktu sesuai kesepakatan!</p>
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('frontend') }}/images/image12.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Why Choose Us?</h2>
                <p>Studio kami siap memenuhi segala kebutuhan cetak untuk bisnis personal maupun perusahaan. Dengan
                    dukungan tenaga ahli dan teknologi canggih, kami membantu Anda menghemat waktu dan tenaga, sekaligus
                    menghadirkan hasil cetakan berkualitas tinggi yang memenuhi standar profesional.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img width="50" height="50"
                                    src="https://img.icons8.com/ios/50/multifunction-printer.png"
                                    alt="multifunction-printer" />
                            </div>
                            <h3>Modern</h3>
                            <p>Kami sudah menggunakan mesin terbaru dan pastinya canggih.
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                                    <path
                                        d="M15.91 13.34l2.636-4.026-.454-.406-3.673 3.099c-.675-.138-1.402.068-1.894.618-.736.823-.665 2.088.159 2.824.824.736 2.088.665 2.824-.159.492-.55.615-1.295.402-1.95zm-3.91-10.646v-2.694h4v2.694c-1.439-.243-2.592-.238-4 0zm8.851 2.064l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.927-1.5-1.328zm-18.851 4.242h8v2h-8v-2zm-2 4h8v2h-8v-2zm3 4h7v2h-7v-2zm21-3c0 5.523-4.477 10-10 10-2.79 0-5.3-1.155-7.111-3h3.28c1.138.631 2.439 1 3.831 1 4.411 0 8-3.589 8-8s-3.589-8-8-8c-1.392 0-2.693.369-3.831 1h-3.28c1.811-1.845 4.321-3 7.111-3 5.523 0 10 4.477 10 10z" />
                                </svg>
                            </div>
                            <h3>Tepat Waktu</h3>
                            <p>Hasil Selesai tepat waktu.
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/star--v1.png"
                                    alt="star--v1" />
                            </div>
                            <h3>Kualitas Tinggi</h3>
                            <p>Hasil yang Rapi, Jelas, dan tentunya Berkualitas.
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img width="50" height="50" src="https://img.icons8.com/windows/32/coin-wallet.png"
                                    alt="coin-wallet" />
                            </div>
                            <h3>Ekonomis</h3>
                            <p>Soal harga? Aman di kantong!
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{ asset('frontend') }}/images/ilustrasi.png" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->


<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>

        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{ asset('frontend') }}/images/person4.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Ryan</span> Rizky Ananda</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                </p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
                </p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{ asset('frontend') }}/images/person2.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">M. Daffa</span> Muzakii</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                </p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
                </p>

            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{ asset('frontend') }}/images/person3.jpg" class="img-fluid mb-5">
                <h3 clas><a href="#"><span class="">Fhadli</span> Maulana</a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                </p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
                </p>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="images/person_4.jpg" class="img-fluid mb-5">

                <h3 clas><a href="#"><span class="">.</span> </a></h3>
                <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                <p>Separated they live in.
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                </p>
                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a>
                </p>


            </div>
            <!-- End Column 4 -->



        </div>
    </div>
</div>
<!-- End Team Section -->

<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img">
            <img src="images/sofa.png" alt="Image" class="img-fluid">
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                    malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                    Pellentesque habitant</p>

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
                        <script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash;
                        Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a
                            href="https://themewagon.com">ThemeWagon</a>
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
<!-- End Footer Section -->

<script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
<script src="{{ asset('frontend') }}/js/custom.js"></script>