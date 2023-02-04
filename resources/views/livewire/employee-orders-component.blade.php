<div>
    {{-- Be like water. --}}
    <h1 class="my-3 mb-5">Vape Pa More</h1>

    <div class="row">
        <div class="col-md-7">
            <form action="" method="post" class="add-order-form">
                <div class="col-md-12 mb-3">
                    <div class="form-group product-id-group">
                        <select class=" form-control " name="products" id="products">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex flex-column quantity-group">
                    <label class="text-dark font-weight-medium">Quantity:</label>
                    <input type="number" class="quantity " name="quantity" id="quantity">
                </div>
                <input type="hidden" class="order-number">
                <input type="hidden" class="user-id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-secondary ml-3 add-order">Add</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <p class="m-0">Order Details</p>
                  <p class="order-number m-0"></p>
                </div>
                <div class="card-body" >
                    <table class="w-100 "style="min-height: 50vh;border-bottom: 1px solid;margin-bottom: 15px;">
                        <thead>
                            <tr class="d-flex justify-content-between">
                                <th>Product Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Total Price:</p>
                        <p class="total-amount"><span>₱ </span><span class="amount"></span></p>
                    </div>

                </div>

              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                    <button class="btn btn-success place-order">Place Order</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-none">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <p class="m-0">Order Details</p>
                  <p class="order-number m-0"></p>
                </div>
                <div class="card-body" >
                    <table class="w-100 "style="min-height: 50vh;border-bottom: 1px solid;margin-bottom: 15px;">
                        <thead>
                            <tr class="d-flex justify-content-between">
                                <th>Product Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Total Price:</p>
                        <p class="total-amount"><span>₱ </span><span class="amount"></span></p>
                    </div>

                </div>

              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                    <button class="btn btn-success place-order">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#products').select2({
            placeholder: {
		    id: '', // the value of the option
		    text: 'Select Products'
		  },
		  allowClear: true
        });

        fetchProducts();

        function fetchProducts() {
            $.ajax({
                type: 'GET',
                url: "{{route('products')}}",
                dataType: 'json',
                success: function(response) {
                    if(response.products.length > 0) {
                        $.each(response.products, function(key, item) {
                            $("#products").append("<option value='"+item.id+"'>"+item.product_name+"</option>")
                        });
                    }
                }
            });

        }

        generateOrderNumber();

        function generateOrderNumber() {


            $.ajax({
                type: 'GET',
                url: "/api/v2/orders/",
                dataType: 'json',
                success: function(response) {
                    var order_number = 'VPM-'+response.orders[0].id;
                    $('.order-number').val(order_number);
                    $('.order-number').text(order_number);
                }
            });
        }

        function fetchOrders() {
            $.ajax({
                type: 'GET',
                url: "/api/v2/orders/order_number/foo",
                dataType: 'json',
                success: function(response) {
                    $('tbody').empty();
                    $.each(response.orders, function(key, item) {
                        $('tbody').append('\
                            <tr style="display: flex; justify-content: space-between;">\
                                <td>'+item.quantity+' x '+item.product.product_name+'</td>\
                                <td>'+item.total_price+'</td>\
                            </tr>\
                        ');
                    });

                    $('.total-amount .amount').text(response.total_price);
                }
            });
        }

        fetchOrders();

        // Instatiate product price
        var product_price;
        var order_number;


        $('#products').on('change', function() {
            $.ajax({
                type: 'GET',
                url: "/api/v2/products/"+$("#products").val(),
                dataType: 'json',
                success: function(response) {
                    product_price = response.product.price;
                }
            });

        })


        $('.add-order').on('click', function(e) {
            e.preventDefault();

            // Instantiate required data
            var product_id = $("#products").val();
            var user_id = $('.user-id').val();
            var order_number = $('.order-number').val();
            var quantity = $('.quantity').val();

            var data = {
                'product_id' : product_id,
                'user_id' : user_id,
                'order_number' : order_number,
                'quantity' : quantity,
                'total_price' : product_price * quantity
            };

            $.ajax({
                    type: 'POST',
                    url: '/api/v2/orders',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if(response.status == 400) {
                            $('.add-order-form').addClass('was-validated');
                            if(typeof response.errors.quantity !== 'undefined') {
                                $.each(response.errors.quantity, function(key, err_values) {
                                    $('.quantity-group .text-danger').remove();
                                    $('.quantity-group').append('<span class="text-danger small mt-1">'+err_values+'</span>');

                                });
                            }else {
                                $('.quantity-group .text-danger').remove();
                            }

                            if(typeof response.errors.product_id !== 'undefined') {
                                $.each(response.errors.product_id, function(key, err_values) {
                                    $('.product-id-group .text-danger').remove();
                                    $('.product-id-group').append('<span class="text-danger small mt-1">'+err_values+'</span>');
                                });
                            }else {
                                $('.product-id-group .text-danger').remove();
                            }
                        }
                        else {
                            $('.quantity-group .text-danger').remove();
                            $('.product-id-group .text-danger').remove();
                            $("#products").val(null).trigger('change');
                            $('.quantity').val(" ");
                            fetchOrders();
                        }

                    }
                });
        });


        $('.place-order').on('click', function(e) {
            e.preventDefault();

            var data = {
                'total_amount': $('.total-amount .amount').text(),
                'user_id': $('.user-id').val(),
                'order_number': $('.order-number').val()
            }

            $.ajax({
                    type: 'POST',
                    url: '/api/v2/order_details',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        fetchOrders();
                        generateOrderNumber();

                    }
                });
        });
    });
</script>
