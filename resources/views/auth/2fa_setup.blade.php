@extends('auth.layout')

@section('content')
<div class="container">
    <h2>Aktifkan Two-Factor Authentication</h2>

    <p>Scan QR code berikut dengan Google Authenticator atau aplikasi sejenis:</p>
    <div>{!! $qr !!}</div>

    <p>Atau masukkan kode manual: <strong>{{ $secret }}</strong></p>

    <form action="{{ route('2fa.enable') }}" method="POST">
        @csrf
        <label>Kode OTP 6 digit:</label>
        <input type="text" name="otp" class="form-control" required maxlength="6">
        <button type="submit" class="btn btn-primary mt-2">Verifikasi & Aktifkan</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
</div>
@endsection
