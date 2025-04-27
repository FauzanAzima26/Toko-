@extends ('frontend.template.main')

@section('content')

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('js')
        <!-- Load jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Load SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Load custom scripts -->
        <script src="{{ asset('frontend/js/shop.js') }}"></script>
        <script src="{{ asset('backend/asset/backend/js/helper.js') }}"></script>
    @endpush
@endsection