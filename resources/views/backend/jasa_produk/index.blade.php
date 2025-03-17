@extends('backend.template.main')

@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
@endpush

@push('js')
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  <script src="{{ asset('backend/asset/backend/js/jasa.js') }}"></script>
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

@section('content')

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
      <span>Jasa/Produk</span>
      <button type="button" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#jasaModal">
        Create
      </button>
      </div>
      <div class="card-body">
      @if ($jasa->count() == 0)
      <tr>
      <td colspan="8" class="text-center">Data tidak ditemukan</td> <!-- Ubah colspan menjadi 8 -->
      </tr>
    @else
      <div class="table-responsive"> <!-- Tambahkan div ini -->
      <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Jasa/Produk</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Gambar</th>
        <th class="text-center">Deskripsi</th>
        <th class="text-center" width="12%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jasa as $produk)
      <tr>
      <td class="text-center">
      {{($jasa->currentPage() - 1) * $jasa->perPage() + $loop->iteration}}
      </td>
      <td class="text-center">{{$produk->jasa_produk}}</td>
      <td class="text-center">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</td>
      <td class="text-center">
      <a href="{{ asset($produk->image) }}" data-lightbox="produktory" data-title="{{ $produk->jasa_produk }}">
      <img src="{{ asset($produk->image) }}" alt="Gambar Produk" class="img-fluid img-thumbnail"
        style="max-width: 100px; cursor: pointer;">
      </a>
      </td>
      <td class="text-center">{{$produk->deskripsi}}</td>
      <td class="text-center">
      <button class="btn btn-warning btn-sm" onclick="editJasa(this)" data-uuid="{{ $produk->uuid }}">
      <i class="bi bi-pencil-square"></i>
      </button>
      <form class="d-inline" onsubmit="deleteproduktory(event)" data-uuid="{{ $produk->uuid }}">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-danger btn-sm">
        <i class="bi bi-trash"></i>
      </button>
      </form>
      </td>
      </tr>
    @endforeach
      </tbody>
      </table>
      </div> <!-- Tutup div ini -->
    @endif
      </div>
    </div>
    </div>
  </section>

  @include ('backend.jasa_produk._modal')

@endsection