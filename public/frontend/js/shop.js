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
const detailProduk = (e) => {
    let id = e.getAttribute("data-id");

    startLoading();

    $.ajax({
        type: "GET",
        url: "/shop/" + id,
        success: function (response) {
            let parsedData = response.data;

            console.log(parsedData);
            // Mengisi data ke dalam modal
            $("#viewName").text(parsedData.jasa_produk);
            $("#productPrice").text("Rp." + parsedData.harga.toLocaleString('id-ID'));
            $("#productDescription").text(parsedData.deskripsi);

            // Menampilkan gambar
            const imageContainer =
                document.getElementById("viewImageContainer");
            imageContainer.innerHTML = ""; // Kosongkan container sebelum menambahkan gambar baru
            if (parsedData.image) {
                const img = document.createElement("img");
                img.src = "/" + parsedData.image; // Pastikan ini sesuai dengan path yang benar
                img.alt = "Gambar Produk";
                img.className = "img-fluid"; // Gunakan class Bootstrap untuk gambar responsif
                img.style.width = "100%"; // Gambar mengisi container
                img.style.height = "auto"; // Menjaga rasio aspek
                imageContainer.appendChild(img); // Tambahkan gambar ke container
            }

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
