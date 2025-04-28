// Deklarasikan semua fungsi helper di atas
const startLoading = (str = "please wait...") => {
    swal.fire({
        title: "Loading...",
        text: str,
        allowOutsideClick: false,
        didOpen: () => {
            swal.showLoading();
        },
    });
};

const stopLoading = () => {
    swal.close();
};

const toastError = (message) => {
    let resJson = JSON.parse(message);
    let errText = "";
    for (let key in resJson.errors) {
        errText += resJson.errors[key][0];
        break;
    }
    Swal.fire({
        icon: "error",
        title: "Invalid data <br>" + errText,
    });
};

// Fungsi detailProduk
// Fungsi detailProduk
const detailProduk = (e) => {
    const productUuid = $(e).data('id'); // Ambil data-id dari elemen yang diklik

    startLoading();

    $.ajax({
        type: "GET",
        url: "/shop/" + productUuid,
        success: function (response) {
            const parsedData = response.data;

            console.log(parsedData);

            // Mengisi data ke dalam modal
            $("#viewName").text(parsedData.jasa_produk);
            $("#productPrice").text("Rp " + parsedData.harga.toLocaleString('id-ID'));
            $("#productDescription").text(parsedData.deskripsi);

            // Menampilkan gambar
            const imageContainer = document.getElementById("viewImageContainer");
            imageContainer.innerHTML = ""; // Kosongkan container sebelum menambahkan gambar baru

            if (parsedData.image) {
                const img = document.createElement("img");
                img.src = "/" + parsedData.image; // Pastikan ini sesuai dengan path
                img.alt = "Gambar Produk";
                img.className = "img-fluid"; // Class Bootstrap untuk responsif
                img.style.width = "100%";
                img.style.height = "auto";
                imageContainer.appendChild(img);
            }

            // Set id produk ke modal untuk kebutuhan lain (misal tambah ke keranjang)
            $("#modalView").data('id', parsedData.id);

            // Tampilkan modal
            $("#modalView").modal("show");
            $(".modalTitle").html('<i class="fa fa-eye"></i> Detail Produk');

            stopLoading();
        },
        error: function (jqXHR, response) {
            console.log("Error:", jqXHR.responseText);
            toastError(jqXHR.responseText);
            stopLoading();
        },
    });
};

