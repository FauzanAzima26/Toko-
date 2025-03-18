@push('css')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">

			<!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Di Cetak Menggunakan Mesin Modern.</h2>
				<p class="mb-4">Studio kami sudah menggunakan mesin cetak terbaru, sehingga hasil cetak anda akan terlihat lebih berkualitas dan tahan lama. </p>
				<p><a href="shop.html" class="btn">Explore</a></p>
			</div>
			<!-- End Column 1 -->

			<!-- Start Column 2 -->
			@foreach ($produck as $produk)
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item" href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $produk->id }}">
						<img src="{{ asset($produk->image) }}" class="img-fluid product-thumbnail">
						<h3 class="product-title">{{ $produk->jasa_produk }}</h3>
						<strong class="product-price">Rp.{{ number_format($produk->harga, 0, ',', '.') }}</strong>
					</a>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="imageModal{{ $produk->id }}" tabindex="-1"
					aria-labelledby="imageModalLabel{{ $produk->id }}" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="imageModalLabel{{ $produk->id }}">{{ $produk->nama_produk }}
								</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<img src="{{ asset($produk->image) }}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			@endforeach
			<!-- End Column 2 -->

		</div>
	</div>
</div>
<!-- End Product Section -->

@push('js')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush