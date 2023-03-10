<div>
    {{-- Be like water. --}}
    <h1 class="my-3 mb-5">Vape Pa More</h1>

    <div class="row">
        <div class="col-md-7">
            <form action="" method="post">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <select class=" form-control" name="products" id="products" required>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3 d-flex flex-column">
                    <label class="text-dark font-weight-medium">Quantity:</label>
                    <input type="number" class="quantity" name="quantity" id="quantity">
                </div>
                <input type="hidden" class="order-number" value="{{'VPM-' . time()}}">
                <input type="hidden" class="user-id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary ml-3 add-order">Add</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                  Order Details
                </div>
                <div class="card-body">
                    <table class="w-100">
                        <thead>
                            <tr class="d-flex justify-content-between">
                                <th>Product Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              </div>
        </div>
    </div>
    {{-- <table id="ordersTable" class="table table-hover table-order" style="width:100%">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th style="border-bottom: none">Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table> --}}
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

        $('#products').on('change', function() {
            $.ajax({
                type: 'GET',
                url: "/api/v2/products/"+$("#products").val(),
                dataType: 'json',
                success: function(response) {
                    $('.product-content h5').empty();
                    $('.product-content p').empty();
                    $('.product-content').append('\
                    <h5>'+response.product.product_name+'</h5>\
                    <p>??? '+response.product.price+'</p>\
                    ');
                }
            });

        })


        $('.add-order').on('click', function(e) {
            e.preventDefault();
            var product_id = $("#products").val();
            var user_id = $('.user-id').val();
            var order_number = $('.order-number').val();
            var quantity = $('.quantity').val();

            console.log({
                'product_id' : product_id,
                'user_id' : user_id,
                'order_number' : order_number,
                'quantity' : quantity
            });
        });
    });
</script>