let submitMethod;

const modalInventory = () => {
    submitMethod = "create"; // Mode diubah ke "create"

    resetForm("#formInventory"); // Reset semua input form
    $("#id").val(""); // Kosongkan ID agar tidak terbawa dari edit
    $("#image").val(null); // Kosongkan input file agar tidak ada gambar lama
    $("#imagePreview").attr("src", "").hide(); // Hilangkan preview gambar
    $("#stock").val(""); // Kosongkan field stock

    // Ubah elemen modal ke mode "Create"
    $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Inventaris');
    $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan');

    resetValidation(); // Reset validasi jika ada
    $("#inventarisModal").modal("show"); // Tampilkan modal
};

// Form submit
$("#formInventory").on("submit", function (e) {
    e.preventDefault(); // Hindari submit default
    startLoading(); // Aktifkan loading

    let url = "/admin/inventaris";
    let method = "POST"; // Default method

    const dataInput = new FormData(this); // Ambil data form

    if (submitMethod === "edit") {
        url = "/admin/inventaris/" + $("#id").val(); // Gunakan endpoint update
        dataInput.append("_method", "PUT"); // Gunakan PUT untuk update
    }

    $.ajax({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        type: method,
        url: url,
        data: dataInput,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#inventarisModal").modal("hide"); // Sembunyikan modal
            reloadTable(); // Perbarui tabel
            toastSuccess(response.message); // Tampilkan notifikasi sukses
            resetValidation(); // Reset validasi
            location.reload();
        },
        error: function (jqXHR) {
            console.log(jqXHR.responseText);
            toastError(jqXHR.responseText);
        },
    });
});

// Fungsi edit
const editInventory = (e) => {
    let uuid = e.getAttribute("data-uuid");
    console.log("Editing inventory with UUID:", uuid);

    startLoading();
    resetForm("#formInventory");
    resetValidation();

    $.ajax({
        type: "GET",
        url: "/admin/inventaris/" + uuid,
        success: function (response) {
            if (!response.data) {
                console.error("Data not found in response");
                stopLoading();
                return;
            }

            let parsedData = response.data;

            // Isi form dengan data dari server
            $("#id").val(parsedData.uuid);
            $("#nama_produk").val(parsedData.nama_produk);
            $("#spesifikasi").val(parsedData.spesifikasi);
            $("#satuan").val(parsedData.satuan);
            $("#stock").val(parsedData.stock);

            // Tampilkan gambar jika ada
            if (parsedData.image) {
                $("#imagePreview").attr("src", "/" + parsedData.image).show();
            } else {
                $("#imagePreview").hide();
            }

            // Set mode edit
            $(".modal-title").html('<i class="fa fa-edit"></i> Edit Inventaris');
            $(".btnSubmit").html('<i class="fa fa-save"></i> Update');

            submitMethod = "edit";
            $("#inventarisModal").modal("show");
            stopLoading();
        },
        error: function (jqXHR) {
            console.log("Error:", jqXHR.responseText);
            toastError(jqXHR.responseText);
            stopLoading();
        },
    });
};

// Reset modal saat dibuka
$("#inventarisModal").on("show.bs.modal", function () {
    if (submitMethod !== "edit") {
        submitMethod = "create";
        resetForm("#formInventory"); // Reset form
        $("#id").val("");
        $("#image").val(null); // Kosongkan input file
        $("#imagePreview").attr("src", "").hide(); // Reset preview gambar
        $("#stock").val("");
        resetValidation();
        $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Inventaris');
        $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan');
    }
});

// Reset modal saat ditutup
$("#inventarisModal").on("hidden.bs.modal", function () {
    submitMethod = "create"; // Pastikan kembali ke mode Create
    resetForm("#formInventory");
    $("#id").val("");
    $("#image").val(null);
    $("#imagePreview").attr("src", "").hide(); // Pastikan gambar dihapus
    $("#stock").val("");
    resetValidation();
});

// Fungsi hapus inventaris
const deleteInventory = (e) => {
    e.preventDefault();

    const uuid = e.target.getAttribute("data-uuid");

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                type: "DELETE",
                url: `/admin/inventaris/${uuid}`,
                success: function (response) {
                    if (response.success) {
                        toastSuccess(response.message);
                        location.reload();
                    }
                },
                error: function (jqXHR) {
                    console.log("Error:", jqXHR.responseText);
                    toastError(jqXHR.responseText);
                },
            });
        }
    });
};

// Preview gambar saat memilih file baru
$("#image").on("change", function (event) {
    let reader = new FileReader();
    reader.onload = function () {
        $("#imagePreview").attr("src", reader.result).show();
    };
    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
});
