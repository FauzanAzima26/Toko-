@extends ('frontend.template.main')

@section('content')

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                @foreach ($produck as $data)

                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item"
                            href="{{ Auth::check() ? route('frontend.cart.index', $data->id) : route('login') }}">
                            <img src="{{ asset($data->image) }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $data->jasa_produk }}</h3>
                            <strong class="product-price">Rp.{{ number_format($data->harga, 0, ',', '.') }}</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('frontend') }}/images/cross.svg" class="img-fluid">
                            </span>
                        </a>

                    </div>

                @endforeach
                <!-- End Column 1 -->
            </div>
        </div>
    </div>

@endsection