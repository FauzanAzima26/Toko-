<!-- Modal -->
<div class="modal fade" id="modalView" data-id="{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header" style="background-color: #3b5d50; color: white;">
                <h5 class="modal-title" id="modalViewLabel">Detail Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <div class="form-group">
                    <div id="viewImageContainer" class="me-3"> <!-- Tempat untuk menampilkan gambar --> </div>
                </div>
                <div class="form-group">
                    <p id="viewName"></p>
                </div>
                <div class="form-group">
                    <p id="productPrice"></p>
                </div>
                <div class="form-group">
                    <p id="productDescription"></p>
                </div>
                <!-- Tambahan Input Jumlah -->
                <div class="form-group">
                    <label for="orderQuantity" style="font-weight: bold;">Jumlah Pesanan</label>
                    <input type="number" class="form-control" id="orderQuantity" min="1" value="1">
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button class="btn btn-black btn-lg py-3 btn-block" onclick="addToCart()">Masukan Keranjang</button>
            </div>
        </div>
    </div>
</div>

<!-- Style -->
<style>
    #viewImageContainer {
        display: block;
        visibility: visible;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }

    #viewImageContainer img {
        display: block;
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-body {
        padding: 20px;
    }

    .form-group p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .swal2-title {
        font-weight: 400 !important;
        font-size: 18px !important;
    }

    .swal2-content {
        font-size: 14px !important;
    }

    .swal2-confirm {
        font-size: 14px !important;
        padding: 6px 12px !important;
    }
</style>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script Tambahan -->
<script>
    function addToCart() {
    const modal = $("#modalView");
    const productId = modal.data("id"); // Ambil product_id dari data-id modal
    const quantity = $("#orderQuantity").val();

    // Validasi input
    if (quantity < 1) {
        Swal.fire({
            title: "Jumlah tidak valid",
            text: "Minimal 1 item harus dipesan.",
            icon: "warning",
        });
        return;
    }

    // Kirim request AJAX
    $.ajax({
        url: "{{ route('frontend.cart.store') }}",
        method: "POST",
        data: {
            produk_id: productId,
            jumlah: quantity,
            _token: "{{ csrf_token() }}",
        },
        success: function (response) {
            Swal.fire({
                title: "Berhasil!",
                text: response.message,
                icon: "success",
            });
            modal.modal("hide");
        },
        error: function (xhr) {
            let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
            if (xhr.status === 401) {
                errorMessage = "Anda harus login terlebih dahulu!";
            } else if (xhr.responseJSON && xhr.responseJSON.error) {
                errorMessage = xhr.responseJSON.error;
            }
            Swal.fire({
                title: "Gagal!",
                text: errorMessage,
                icon: "error",
            });
        },
    });
}

</script>
