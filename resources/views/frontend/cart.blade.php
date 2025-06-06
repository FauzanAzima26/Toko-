@extends ('frontend.template.main')

@section('content')

    @push('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    @endpush
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $data)

                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->produk->jasa_produk }}</td>
                                <td class="text-center"><img src="{{ asset('storage/' . $data->produk->image) }}" alt=""
                                        width="50px" height="50px"></td>
                                <td class="text-center">{{ $data->jumlah }}</td>
                                <td class="text-center">Rp.
                                    {{ number_format($data->produk->harga * $data->jumlah, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
        <script src="{{ asset('backend/asset/backend/js/helper.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    paging: true, // Aktifkan pagination
                    pageLength: 5, // Tampilkan 5 data per halaman
                    lengthMenu: [10, 25, 50, 100] // Opsi jumlah data per halaman
                });
            });
        </script>
    @endpush
@endsection