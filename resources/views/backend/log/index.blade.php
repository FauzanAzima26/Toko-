@extends('backend.template.main')

@section('content')

  <div class="pagetitle">
    <h1>LOg</h1>
    <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
    <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
      <thead class="thead-light">
      <tr>
      <th class="border-0 rounded-start text-center">No</th>
<th class="border-0 text-center">Nama Produk</th>
<th class="border-0 text-center">Spesifikasi</th>
<th class="border-0 text-center">Gambar Produk</th>
<th class="border-0 text-center">Satuan</th>
<th class="border-0 text-center" colspan="3">Harga Jual</th>
<th class="border-0 text-center" width="12%">Action</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td class="text-center">1</td>
        <td class="text-center">Menu 1</td>
        <td class="text-center">Category 1</td>
        <td class="text-center">Rp. 100.000</td>
        <td class="text-center">Active</td>
        <td class="text-center"><img src="https://dummyimage.com/200x200/000/fff" alt="" class="img-fluid"></td>
        <td class="text-center">
        <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
        <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
        </td>
      </tr>
      <tr>
        <td class="text-center">1</td>
        <td class="text-center">Menu 1</td>
        <td class="text-center">Category 1</td>
        <td class="text-center">Rp. 100.000</td>
        <td class="text-center">Active</td>
        <td class="text-center"><img src="https://dummyimage.com/200x200/000/fff" alt="" class="img-fluid"></td>
        <td class="text-center">
        <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
        <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
        </td>
      </tr>

      </tbody>
    </table>

    </div>
  </section>

@endsection