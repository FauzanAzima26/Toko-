let submitMethod;

// Fungsi untuk menampilkan modal untuk menambah inventaris
const modalInventory = () => {
    submitMethod = "create"; // Set method ke create

    resetForm("#formInventory"); // Reset form
    $("#inventarisModal").modal("show"); // Tampilkan modal
    $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Inventaris'); // Set judul modal
    $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan'); // Set teks tombol
    resetValidation(); // Reset validasi
};

// Fungsi untuk menyimpan atau memperbarui data inventaris
$("#formInventory").on("submit", function (e) {
    e.preventDefault(); // Mencegah pengiriman form default
    startLoading(); // Mulai loading

    let url, method;
    url = "/admin/inventaris"; // URL default untuk menyimpan data
    method = "POST"; // Metode default

    const dataInput = new FormData(this); // Ambil data dari form

    if (submitMethod == "edit") {
        url = "/admin/inventaris/" + $("#id").val(); // URL untuk mengupdate
        dataInput.append("_method", "PUT"); // Tambahkan metode PUT
    }

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // CSRF token
        },
        type: method,
        url: url,
        data: dataInput,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#inventarisModal").modal("hide"); // Sembunyikan modal
            reloadTable(); // Reload tabel untuk menampilkan data terbaru
            toastSuccess(response.message); // Tampilkan pesan sukses
            resetValidation(); // Reset validasi
            location.reload();
        },
        error: function (jqXHR) {
            console.log(jqXHR.responseText); // Log error
            toastError(jqXHR.responseText); // Tampilkan pesan error
        },
    });
});

// Fungsi untuk mengedit data inventaris
const editInventory = (e) => {
    let uuid = e.getAttribute("data-uuid"); // Use UUID instead of ID
    console.log("Editing inventory with UUID:", uuid);

    startLoading();
    resetForm("#formInventory");
    resetValidation();

    $.ajax({
        type: "GET",
        url: "/admin/inventaris/" + uuid, // Use UUID in URL
        success: function (response) {
            if (!response.data) {
                console.error("Data not found in response");
                stopLoading();
                return;
            }

            let parsedData = response.data;

            $("#id").val(parsedData.uuid); // Store UUID instead of integer ID
            $("#nama_produk").val(parsedData.nama_produk);
            $("#spesifikasi").val(parsedData.spesifikasi);
            $("#harga_jual").val(parsedData.harga_jual);
            $("#satuan").val(parsedData.satuan);
            $("#inventarisModal").modal("show");
            $(".modal-title").html('<i class="fa fa-edit"></i> Edit Inventaris');
            $(".btnSubmit").html('<i class="fa fa-save"></i> Update');

            submitMethod = "edit";

            stopLoading();
        },
        error: function (jqXHR) {
            console.log("Error:", jqXHR.responseText);
            toastError(jqXHR.responseText);
            stopLoading();
        },
    });
};
