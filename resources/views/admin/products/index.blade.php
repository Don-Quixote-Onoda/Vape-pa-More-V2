@extends('layouts.app')
@section('content')
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="card card-default">
        <div class="px-6 py-4 d-flex justify-content-between">
            <h1 class="my-3">Products</h1>

            <!-- Form Modal -->
            <button type="button" class="btn btn-secondary my-3" data-toggle="modal" data-target="#productTypeModal">
                Add Products
            </button>
        </div>
    </div>

    
            @if (count($products) > 0)
            <div class="card card-default">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="collapse" id="collapse-data-tables">
                    </div>
                    <table id="typesTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>ID</th>
                                <th>Quantity</th>
                                <th>Sold</th>
                                <th>In Stock</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_type->name}}</td>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuLink">
                                                <button type="button" value="asdfasd" class="dropdown-item edit-product-type" data-toggle="modal" data-target="#editProductTypeModal">
                                                    Edit
                                                </button>
                                                <button type="button" value="afdadf" class="dropdown-item delete-product-type">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        @endif


    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="add-product-form">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control product-name "
                                name="name" id="name" placeholder="Product name" value=""
                                required>
                                <div class="invalid-feedback small mt-1 product-name-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Product Type</label>
                            <div class="form-group">
                                <select class=" form-select product-type" id="product_type" name="product_type" required>
                                    <option value="">Select product type</option>
                                    <option value="1" >Cig-A-Likes</option>
                                    <option value="2">Vape Pens</option>
                                    <option value="3">Mods</option>
                                    <option value="4">Pod Mods</option>
                                </select>
                                <div class="invalid-feedback small mt-1 product-type-error"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control product-price"
                                name="price" id="price" placeholder="Product price"
                                required>
                            
                                <div class="invalid-feedback small mt-1 price-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control product-quantity"
                                name="quantity" id="quantity" placeholder="Product quantity"
                                required>
                            
                                <div class="invalid-feedback small mt-1 quantity-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="text-dark font-weight-medium">Status</label>
                            <div class="form-group">
                                <select class=" form-select  product-status" id="status" name="status" required>
                                    <option value="">Select product status</option>
                                    <option value="1" >Unavailable</option>
                                    <option value="2">Back Order</option>
                                    <option value="3">Hide</option>
                                </select>
                                <div class="invalid-feedback small mt-1 status-error"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3 add-product">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editProductModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="edit-product-form">
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control edit-product-name "
                            name="name" id="edit_product_name" placeholder="Product name" value=""
                            required>
                            <div class="invalid-feedback small mt-1 product-name-error"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="text-dark font-weight-medium">Product Type</label>
                        <div class="form-group">
                            <select class=" form-select edit-product-type" id="edit_product_type" name="product_type" required>
                                <option value="">Select product type</option>
                                <option value="1" >Cig-A-Likes</option>
                                <option value="2">Vape Pens</option>
                                <option value="3">Mods</option>
                                <option value="4">Pod Mods</option>
                            </select>
                            <div class="invalid-feedback small mt-1 product-type-error"></div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control edit-product-price"
                            name="price" id="edit_product_price" placeholder="Product price"
                            required>
                        
                            <div class="invalid-feedback small mt-1 price-error"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control edit-product-quantity"
                            name="quantity" id="edit_product_quantity" placeholder="Product quantity"
                            required>
                        
                            <div class="invalid-feedback small mt-1 quantity-error"></div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="text-dark font-weight-medium">Status</label>
                        <div class="form-group">
                            <select class=" form-select  edit-product-status" id="edit_product_status" name="status" required>
                                <option value="">Select product status</option>
                                <option value="1" >Unavailable</option>
                                <option value="2">Back Order</option>
                                <option value="3">Hide</option>
                            </select>
                            <div class="invalid-feedback small mt-1 status-error"></div>
                        </div>
                    </div>
                    <input type="hidden" id="edit_product_id">
                    <button type="submit" class="btn btn-primary ml-3 update-product">Update</button>
                </form>
            </div>
          </div>
        </div>
      </div>

  <script src="{{ asset('admin-assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script>
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
                    url: "{{route('products')}}",
                    dataType: 'json',
                    success: function(response) {
                        if(response.products.length > 0) {
                            $('.products-table').removeClass('d-none');

                            $('tbody').empty();
                            $.each(response.products, function(key, item) {
                                var status = ['Unavailable', 'Back Order', 'Hide'];
                                $('tbody').append('\
                                    <tr>\
                                        <td>'+item.product_name+'</td>\
                                        <td>'+item.product_type.name+'</td>\
                                        <td>'+item.price+'</td>\
                                        <td>'+status[item.status-1]+'</td>\
                                        <td><button type="button" value="'+item.id+'" class="edit-product btn btn-secondary btn-sm"><i class="mdi mdi-pencil text-light"></i></button>\
                                            <button type="button" value="'+item.id+'" class="delete-product btn btn-danger btn-sm"><i class="mdi mdi-delete text-light"></i></button>\
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
                        if(response.status == 400) {
                            $('.add-product-form').addClass('was-validated');
                            if(typeof response.errors.product_name !== 'undefined') {
                                $.each(response.errors.product_name, function(key, err_values) {
                                    $('.product-name-error').text(err_values);
                                });
                            }
                        
                            if(typeof response.errors.price !== 'undefined') {
                                $.each(response.errors.price, function(key, err_values) {
                                    $('.price-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.status !== 'undefined') {
                                $.each(response.errors.status, function(key, err_values) {
                                    $('.status-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.product_type !== 'undefined') {
                                $.each(response.errors.product_type, function(key, err_values) {
                                    $('.product-type-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.quantity !== 'undefined') {
                                $.each(response.errors.quantity, function(key, err_values) {
                                    $('.quantity-error').text(err_values);
                                });
                            }
                        }
                        else {
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
                    url: '/api/v2/products/'+product_id,
                    dataType: 'json',
                    success: function(response) {

                        if(response.status == 200) {
                            $("#editProductModal").modal("show");
                            $('#edit_product_name').val(response.product.product_name);
                            $('#edit_product_price').val(response.product.price);
                            $('#edit_product_status').val(response.product.status);
                            $('#edit_product_type').val(response.product.product_type_id);
                            $('#edit_product_quantity').val(response.product.quantity);
                            $('#edit_product_id').val(response.product.id);
                        }
                        else {
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
                    url: '/api/v2/products/update/'+product_id,
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == 400) {
                            $('.add-product-form').addClass('was-validated');
                            if(typeof response.errors.product_name !== 'undefined') {
                                $.each(response.errors.product_name, function(key, err_values) {
                                    $('.product-name-error').text(err_values);
                                });
                            }
                        
                            if(typeof response.errors.price !== 'undefined') {
                                $.each(response.errors.price, function(key, err_values) {
                                    $('.price-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.status !== 'undefined') {
                                $.each(response.errors.status, function(key, err_values) {
                                    $('.status-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.product_type !== 'undefined') {
                                $.each(response.errors.product_type, function(key, err_values) {
                                    $('.product-type-error').text(err_values);
                                });
                            }

                            if(typeof response.errors.quantity !== 'undefined') {
                                $.each(response.errors.quantity, function(key, err_values) {
                                    $('.quantity-error').text(err_values);
                                });
                            }
                        }
                        else {
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
                    url: '/api/v2/products/destroy/'+product_id,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status === 404) {
                            toastr.error(response.message, 'Error!!');

                        }
                        else {
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
    </script>
</div>

@endsection