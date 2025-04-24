<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3b5d50; color: white;">
                <h5 class="modal-title" id="modalViewLabel">Detail Produk</h5> <button type="button"
                    class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
            </div>
            <div class="modal-footer">
            <button class="btn btn-black btn-lg py-3 btn-block" onclick="addToCart()">Buat pesanan</button>
        </div>
    </div>
</div>
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
        font-weight: 400 !important; /* Mengatur ketebalan font menjadi normal */
        font-size: 18px !important; /* Perkecil ukuran font */
    }

    .swal2-content {
        font-size: 14px !important; /* Perkecil ukuran font isi */
    }

    .swal2-confirm {
        font-size: 14px !important; /* Perkecil ukuran font tombol OK */
        padding: 6px 12px !important; /* Sesuaikan ukuran tombol */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function addToCart() {
        // Contoh data produk (ambil dari elemen halaman)
        let product = {
            id: 1, // Ganti dengan id dinamis
            name: "Product 1",
            price: 49000,
            quantity: 1,
            image: "{{ asset('frontend/images/product-1.png') }}"
        };

        // Ambil data cart dari localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Cek apakah produk sudah ada di cart
        let existingProduct = cart.find(item => item.id === product.id);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push(product);
        }

        // Simpan kembali ke localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Tampilkan SweetAlert dengan ukuran font lebih kecil
        Swal.fire({
            title: "Produk berhasil ditambahkan ke keranjang!",
            customClass: {
                title: "swal2-title",
                content: "swal2-content",
                confirmButton: "swal2-confirm"
            }
        });
    }
</script>
