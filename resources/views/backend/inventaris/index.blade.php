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
  <script src="{{ asset('backend/asset/backend/js/inventoris.js') }}"></script>
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
      <span>Inventaris</span>
      <button type="button" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#inventarisModal">
        Create
      </button>
      </div>
      <div class="card-body">
      @if ($inventories->count() == 0)
      <tr>
      <td colspan="8" class="text-center">Data tidak ditemukan</td> <!-- Ubah colspan menjadi 8 -->
      </tr>
    @else
      <div class="table-responsive"> <!-- Tambahkan div ini -->
      <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Produk</th>
        <th class="text-center">Spesifikasi</th>
        <th class="text-center">Gambar Produk</th>
        <th class="text-center">Satuan</th>
        <th class="text-center">Stock</th> <!-- Kolom Stock -->
        <th class="text-center" width="12%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($inventories as $inven)
      <tr>
      <td class="text-center">
      {{($inventories->currentPage() - 1) * $inventories->perPage() + $loop->iteration}}
      </td>
      <td class="text-center">{{$inven->nama_produk}}</td>
      <td class="text-center">{{$inven->spesifikasi}}</td>
      <td class="text-center">
      <a href="{{ asset($inven->image) }}" data-lightbox="inventory" data-title="{{ $inven->nama_produk }}">
      <img src="{{ asset($inven->image) }}" alt="Gambar Produk" class="img-fluid img-thumbnail"
        style="max-width: 100px; cursor: pointer;">
      </a>
      </td>
      <td class="text-center">{{$inven->satuan}}</td>
      <td class="text-center">{{$inven->stock}}</td> <!-- Tampilkan data stock -->
      <td class="text-center">
      <button class="btn btn-warning btn-sm" onclick="editInventory(this)" data-uuid="{{ $inven->uuid }}">
      <i class="bi bi-pencil-square"></i>
      </button>
      <form class="d-inline" onsubmit="deleteInventory(event)" data-uuid="{{ $inven->uuid }}">
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

  @include('backend.inventaris._modal')

@endsection