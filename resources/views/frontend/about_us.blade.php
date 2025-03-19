@extends ('frontend.template.main')

@section('content')

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
                                    <img width="50" height="50" src="https://img.icons8.com/ios/50/present.png"
                                        alt="present" />
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
                    <img src="{{ asset('frontend') }}/images/person5.jpg" class="img-fluid mb-5">

                    <h3 clas><a href="#"><span class="">Ahmad</span> Syumbul</a></h3>
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

@endsection