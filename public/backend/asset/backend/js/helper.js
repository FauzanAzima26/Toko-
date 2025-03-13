let Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
})

const toastSuccess = (message) => {
    Toast.fire({
        icon: 'success',
        title: message
    })
}

const toastError = (message) => {
    let resJson = JSON.parse(message);

    let errText = '';

    for (let key in resJson.errors) {
        errText += resJson.errors[key][0];
        break;
    }

    Toast.fire({
        icon: 'error',
        title: 'Invalid data <br>' + errText
    })
}

const reloadTable = () => {
    $('#example').DataTable().draw(false);
}

const startLoading = (str = 'please wait...') => {
    swal.fire({
        title: 'Loding...',
        text: str,
        allowOutsideClick: false,
        didOpen: () => {
            swal.showLoading();
        }
    })
}

const stopLoading = () => {
    swal.close();
}

const resetForm = (form) => {
    $(form).trigger("reset"); // Reset semua input
    $(form).find("input, textarea, select").val(""); // Kosongkan semua input
    $(form).find("input[type='file']").val(null); // Kosongkan file input
};



const resetValidation = () => {
    $('.is-invalid').removeClass('is-invalid');
    $('.is-valid').removeClass('is-valid');
    $('span.invalid-feedback').remove();
}