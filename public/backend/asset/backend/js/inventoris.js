let submitMethod;

const modalInventory = () => {
    submitMethod = "create"; // Pastikan mode diubah ke "create"

    resetForm("#formInventory"); // Reset semua input form
    $("#id").val(""); // Kosongkan ID agar tidak terbawa dari edit
    $("#image").val(null); // Kosongkan file input agar tidak ada gambar lama

    // Pastikan semua elemen modal diubah ke mode "Create"
    $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Inventaris'); // Set judul modal
    $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan'); // Set teks tombol

    resetValidation(); // Reset validasi jika ada
    $("#inventarisModal").modal("show"); // Tampilkan modal
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
    let uuid = e.getAttribute("data-uuid"); // Gunakan UUID sebagai pengganti ID
    console.log("Editing inventory with UUID:", uuid);

    startLoading();
    resetForm("#formInventory"); // Reset form
    resetValidation(); // Reset validasi

    $.ajax({
        type: "GET",
        url: "/admin/inventaris/" + uuid, // Gunakan UUID dalam URL
        success: function (response) {
            if (!response.data) {
                console.error("Data not found in response");
                stopLoading();
                return;
            }

            let parsedData = response.data;

            // Isi form dengan data yang diterima
            $("#id").val(parsedData.uuid); // Gunakan UUID sebagai ID
            $("#nama_produk").val(parsedData.nama_produk);
            $("#spesifikasi").val(parsedData.spesifikasi);
            $("#harga_jual").val(parsedData.harga_jual);
            $("#satuan").val(parsedData.satuan);

            // Set judul modal dan teks tombol untuk mode edit
            $(".modal-title").html('<i class="fa fa-edit"></i> Edit Inventaris');
            $(".btnSubmit").html('<i class="fa fa-save"></i> Update');

            submitMethod = "edit"; // Set mode ke "edit"

            $("#inventarisModal").modal("show"); // Tampilkan modal
            stopLoading();
        },
        error: function (jqXHR) {
            console.log("Error:", jqXHR.responseText);
            toastError(jqXHR.responseText);
            stopLoading();
        },
    });
};

// Event listener untuk memastikan modal direset sebelum ditampilkan
$("#inventarisModal").on("show.bs.modal", function () {
    if (submitMethod !== "edit") {
        // Jika bukan mode edit, reset ke mode create
        submitMethod = "create";
        $("#formInventory")[0].reset(); // Kosongkan semua input form
        $("#id").val(""); // Kosongkan hidden input ID
        $("#image").val(null); // Kosongkan input file
        resetValidation(); // Reset validasi agar tidak ada error lama
        $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Inventaris'); // Set judul modal
        $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan'); // Set teks tombol
    }
});

$("#inventarisModal").on("hidden.bs.modal", function () {
    submitMethod = "create"; // Pastikan kembali ke mode Create setiap modal ditutup
    $("#formInventory")[0].reset(); // Kosongkan semua input form
    $("#id").val(""); // Kosongkan hidden input ID
    $("#image").val(null); // Kosongkan input file
    resetValidation(); // Reset validasi agar tidak ada error lama
});