@extends('auth.layout')

@section('content')
<div class="container">
    <h2>Verifikasi Two-Factor Authentication</h2>

    <form action="{{ route('2fa.verify') }}" method="POST">
        @csrf
        <label>Masukkan kode 6 digit dari aplikasi Authenticator:</label>
        <input type="text" name="otp" class="form-control" required maxlength="6">
        <button type="submit" class="btn btn-success mt-2">Verifikasi</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>
@endsection
