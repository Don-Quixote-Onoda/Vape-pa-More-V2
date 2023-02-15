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

    // Fetch all products data

    function fetchProducts() {
        $.ajax({
            type: 'GET',
            url: "{{ route('products') }}",
            dataType: 'json',
            success: function(response) {
                if (response.products.length > 0) {
                    $('.products-table').removeClass('d-none');

                    $('tbody').empty();
                    $.each(response.products, function(key, item) {
                        var status = ['Unavailable', 'Back Order', 'Hide'];
                        $('tbody').append('\
                                <tr>\
                                    <td>' + item.product_name + '</td>\
                                    <td>' + item.product_type.name + '</td>\
                                    <td>' + item.price + '</td>\
                                    <td>' + status[item.status - 1] + '</td>\
                                    <td><button type="button" value="' + item.id + '" class="edit-product btn btn-secondary btn-sm"><i class="mdi mdi-pencil text-light"></i></button>\
                                        <button type="button" value="' + item.id + '" class="delete-product btn btn-danger btn-sm"><i class="mdi mdi-delete text-light"></i></button>\
                                    </td>\
                                </tr>\
                            ');
                    });

                }
            }
        });

        // var productsTable = $("#productsTable");
        // if (productsTable.length != 0) {

        //     new DataTable('#productsTable', {

        //     });
        // }


    }

    // Add new product 
    $(document).on('click', '.add-product', function(e) {
        e.preventDefault();

        var data = {
            'product_name': $('.product-name').val(),
            'price': $('.product-price').val(),
            'status': $('.product-status').val(),
            'product_type': $('.product-type').val(),
            'quantity': $('.product-quantity').val()
        };

        // console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/api/v2/products',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status == 400) {
                    $('.add-product-form').addClass('was-validated');
                    if (typeof response.errors.product_name !== 'undefined') {
                        $.each(response.errors.product_name, function(key, err_values) {
                            $('.product-name-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.price !== 'undefined') {
                        $.each(response.errors.price, function(key, err_values) {
                            $('.price-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.status !== 'undefined') {
                        $.each(response.errors.status, function(key, err_values) {
                            $('.status-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.product_type !== 'undefined') {
                        $.each(response.errors.product_type, function(key, err_values) {
                            $('.product-type-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.quantity !== 'undefined') {
                        $.each(response.errors.quantity, function(key, err_values) {
                            $('.quantity-error').text(err_values);
                        });
                    }
                } else {
                    $("#productModal").hide();
                    $("#productModal").find("input").val("");
                    $("#productModal").find("select").val("");
                    $('.modal-backdrop').hide();
                    $('.add-product-form').removeClass('was-validated');
                    toastr.success(response.message, "Success!");
                    fetchProducts();
                }

            }
        });


    });

    // Fetch product data by id
    $(document).on('click', '.edit-product', function(e) {
        e.preventDefault();

        var toaster = $("#toaster");

        var product_id = $(this).val();

        $.ajax({
            type: 'GET',
            url: '/api/v2/products/' + product_id,
            dataType: 'json',
            success: function(response) {

                if (response.status == 200) {
                    $("#editProductModal").modal("show");
                    $('#edit_product_name').val(response.product.product_name);
                    $('#edit_product_price').val(response.product.price);
                    $('#edit_product_status').val(response.product.status);
                    $('#edit_product_type').val(response.product.product_type_id);
                    $('#edit_product_quantity').val(response.product.quantity);
                    $('#edit_product_id').val(response.product.id);
                } else {
                    toastr.error(response.message, "Error!!");
                }
            }
        });

    });

    // Update Product
    $(document).on('click', '.update-product', function(e) {
        e.preventDefault();

        var data = {
            'product_name': $('#edit_product_name').val(),
            'price': $('#edit_product_price').val(),
            'status': $('#edit_product_status').val(),
            'product_type': $('#edit_product_type').val(),
            'quantity': $('#edit_product_quantity').val()
        };

        var product_id = $("#edit_product_id").val();

        $.ajax({
            type: 'PUT',
            url: '/api/v2/products/update/' + product_id,
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status == 400) {
                    $('.add-product-form').addClass('was-validated');
                    if (typeof response.errors.product_name !== 'undefined') {
                        $.each(response.errors.product_name, function(key, err_values) {
                            $('.product-name-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.price !== 'undefined') {
                        $.each(response.errors.price, function(key, err_values) {
                            $('.price-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.status !== 'undefined') {
                        $.each(response.errors.status, function(key, err_values) {
                            $('.status-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.product_type !== 'undefined') {
                        $.each(response.errors.product_type, function(key, err_values) {
                            $('.product-type-error').text(err_values);
                        });
                    }

                    if (typeof response.errors.quantity !== 'undefined') {
                        $.each(response.errors.quantity, function(key, err_values) {
                            $('.quantity-error').text(err_values);
                        });
                    }
                } else {
                    $("#editProductModal").modal('hide');
                    $("#editProductModal").find("input").val("");
                    $("#editProductModal").find("select").val("");
                    $('.edit-product-form').removeClass('was-validated');
                    toastr.success(response.message, "Success!");
                    fetchProducts();
                }
            }
        });
    });

    $(document).on('click', '.delete-product', function(e) {
        var product_id = $(this).val();

        $.ajax({
            type: 'DELETE',
            url: '/api/v2/products/destroy/' + product_id,
            dataType: 'json',
            success: function(response) {
                if (response.status === 404) {
                    toastr.error(response.message, 'Error!!');

                } else {
                    fetchProducts();
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