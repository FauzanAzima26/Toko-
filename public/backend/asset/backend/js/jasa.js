let submitMethod;

const modalJasa = () => {
    console.log("Opening modal in CREATE mode");
    submitMethod = "create"; // Mode diubah ke "create"

    resetForm("#formJasa"); // Reset semua input form
    $("#id").val(""); // Kosongkan ID agar tidak terbawa dari edit
    $("#image").val(null); // Kosongkan input file agar tidak ada gambar lama
    $("#imagePreview").attr("src", "").hide(); // Hilangkan preview gambar

    // Ubah elemen modal ke mode "Create"
    $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Jasa/Produk');
    $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan');

    resetValidation(); // Reset validasi jika ada
    $("#jasaModal").modal("show"); // Tampilkan modal
};

// Form submit
$("#formJasa").on("submit", function (e) {
    e.preventDefault(); // Hindari submit default
    startLoading(); // Aktifkan loading

    let url = "/admin/jasa_produk";
    let method = "POST"; // Default method

    const dataInput = new FormData(this); // Ambil data form

    if (submitMethod === "edit") {
        let uuid = $("#id").val(); // Ambil UUID dari input hidden
        url = "/admin/jasa_produk/" + uuid; // Gunakan endpoint update
        dataInput.append("_method", "PUT"); // Gunakan PUT untuk update
    }

    $.ajax({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        type: "POST",
        url: url,
        data: dataInput,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#jasaModal").modal("hide"); // Sembunyikan modal
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

const editJasa = (e) => {
    let uuid = e.getAttribute("data-uuid");
    console.log("Editing Jasa with UUID:", uuid);

    startLoading();
    resetForm("#formJasa");
    resetValidation();

    $.ajax({
        type: "GET",
        url: "/admin/jasa_produk/" + uuid,
        success: function (response) {
            if (!response.data) {
                console.error("Data not found in response");
                stopLoading();
                return;
            }

            let parsedData = response.data;

            // Isi form dengan data dari server
            $("#id").val(parsedData.uuid); // Pastikan UUID dikirim dengan benar
            $("#jasa_produk").val(parsedData.jasa_produk);
            $("#harga").val(parsedData.harga);
            $("#deskripsi").val(parsedData.deskripsi);

            // Tampilkan gambar jika ada
            if (parsedData.image) {
                $("#imagePreview").attr("src", "/" + parsedData.image).show();
            } else {
                $("#imagePreview").hide();
            }

            // Set mode edit
            $(".modal-title").html('<i class="fa fa-edit"></i> Edit Jasa/Produk');
            $(".btnSubmit").html('<i class="fa fa-save"></i> Update');

            submitMethod = "edit";
            $("#jasaModal").modal("show");
            stopLoading();
        },
        error: function (jqXHR) {
            console.log("Error:", jqXHR.responseText);
            toastError(jqXHR.responseText);
            stopLoading();
        },
    });
};

// Reset modal saat ditutup
$("#jasaModal").on("hidden.bs.modal", function () {
    console.log("Modal closed, resetting to CREATE mode");
    submitMethod = "create"; // Pastikan kembali ke mode Create
    resetForm("#formJasa");
    $("#id").val("");
    $("#image").val(null);
    $("#imagePreview").attr("src", "").hide(); // Pastikan gambar dihapus
    resetValidation();

    // Reset judul modal dan tombol submit
    $(".modal-title").html('<i class="fa fa-plus"></i> Tambah Jasa/Produk');
    $(".btnSubmit").html('<i class="fa fa-save"></i> Simpan');
});

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

const deleteJasa = (e) => {
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
                url: `/admin/jasa_produk/${uuid}`,
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