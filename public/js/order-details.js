$(document).ready(function() {

    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };

    $(document).on('click', '.delete-order-detail', function(e) {
        var orderdetail_id = $(this).val();
        console.log(orderdetail_id);

        $.ajax({
            type: 'DELETE',
            url: '/api/v2/order-details/destroy/'+orderdetail_id,
            dataType: 'json',
            success: function(response) {
                if(response.status === 404) {
                    toastr.error(response.message, 'Error!!');
                }
                else {
                    window.location.reload();
                    toastr.success(response.message, 'Success!');
                }
            }
        });
    });

    var productsTable = $("#typesTable");
    if (productsTable.length != 0) {
        productsTable.DataTable({
            info: false,
            lengthChange: false,
            scrollX: true,
            order: [
                [0, "desc"]
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            }
        });
    }
});