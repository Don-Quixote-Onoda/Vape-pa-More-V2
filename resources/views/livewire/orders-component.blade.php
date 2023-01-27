<div>
    {{-- Be like water. --}}
    <h1 class="my-3 mb-5">Vape Pa More</h1>

    <div class="row">
        <div class="col-md-7">
            <form action="" method="post">
                <div class="col-md-12 mb-3">
                    <label class="text-dark font-weight-medium">Search Product</label>
                    <div class="form-group">
                        <select class=" form-control" name="products" id="products" required>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="text-dark font-weight-medium">Enter Quantity:</label>
                    <input type="number" class="quantity" name="quantity" id="quantity">
                </div>
                <input type="hidden" name="{{'VPM-' . time()}}">
                <button type="submit" class="btn btn-primary ml-3 add-order">Add</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="product-content">
                <h4>Details:</h4>
                <p>{{ Auth::id() == 1? 'd' : 'dfsd' }}{{Auth::id()}}</p>
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
                    <p>₱ '+response.product.price+'</p>\
                    ');
                }
            });

        })


        $('.add-order').on('click', function(e) {
            e.preventDefault();
            console.log();
        });
    });
</script>