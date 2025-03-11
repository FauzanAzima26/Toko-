$(document).ready(function () {
    $("#btnSave").on("click", function () {
        const form = document.getElementById('formInventory');
        const formData = new FormData(form);
        const id = $("#id").val();
        let url = "/admin/inventaris"; // Default URL for creating a new inventory
        let method = "POST"; // Default method

        if (id) {
            url = "/admin/inventaris/" + id; // URL for editing
            method = "PUT"; // Change method to PUT for editing
        }

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: method,
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $("#inventarisModal").modal("hide"); // Hide the modal
                toastSuccess(response.message); // Show success message
                resetValidation(); // Reset validation messages
                location.reload(); // Reload the entire page
            },
            error: function (jqXHR) {
                console.log(jqXHR.responseText); // Log error response
                toastError(jqXHR.responseText); // Show error message
            },
        });
    });
});