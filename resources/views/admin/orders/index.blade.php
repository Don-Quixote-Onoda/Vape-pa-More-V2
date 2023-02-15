@extends('layouts.app')
@section('content')
    <div>

        @if (count($orders) > 0)
            <div class="card card-default">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="collapse" id="collapse-data-tables">
                    </div>
                    <table id="typesTable" class="table table-hover table-product" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Order Number</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product->product_name }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuLink">
                                                <button type="button" value="{{ $order->id }}"
                                                    class="dropdown-item delete-order">
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
                                <input type="text" class="form-control product-name " name="name" id="name"
                                    placeholder="Product name" value="" required>
                                <div class="invalid-feedback small mt-1 product-name-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-dark font-weight-medium">Product Type</label>
                                <div class="form-group">
                                    <select class=" form-select product-type" id="product_type" name="product_type"
                                        required>
                                        <option value="">Select product type</option>
                                        <option value="1">Cig-A-Likes</option>
                                        <option value="2">Vape Pens</option>
                                        <option value="3">Mods</option>
                                        <option value="4">Pod Mods</option>
                                    </select>
                                    <div class="invalid-feedback small mt-1 product-type-error"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control product-price" name="price" id="price"
                                    placeholder="Product price" required>

                                <div class="invalid-feedback small mt-1 price-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control product-quantity" name="quantity" id="quantity"
                                    placeholder="Product quantity" required>

                                <div class="invalid-feedback small mt-1 quantity-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-dark font-weight-medium">Status</label>
                                <div class="form-group">
                                    <select class=" form-select  product-status" id="status" name="status" required>
                                        <option value="">Select product status</option>
                                        <option value="1">Unavailable</option>
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

        <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
            aria-hidden="true">
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
                                <input type="text" class="form-control edit-product-name " name="name"
                                    id="edit_product_name" placeholder="Product name" value="" required>
                                <div class="invalid-feedback small mt-1 product-name-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-dark font-weight-medium">Product Type</label>
                                <div class="form-group">
                                    <select class=" form-select edit-product-type" id="edit_product_type"
                                        name="product_type" required>
                                        <option value="">Select product type</option>
                                        <option value="1">Cig-A-Likes</option>
                                        <option value="2">Vape Pens</option>
                                        <option value="3">Mods</option>
                                        <option value="4">Pod Mods</option>
                                    </select>
                                    <div class="invalid-feedback small mt-1 product-type-error"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control edit-product-price" name="price"
                                    id="edit_product_price" placeholder="Product price" required>

                                <div class="invalid-feedback small mt-1 price-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control edit-product-quantity" name="quantity"
                                    id="edit_product_quantity" placeholder="Product quantity" required>

                                <div class="invalid-feedback small mt-1 quantity-error"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-dark font-weight-medium">Status</label>
                                <div class="form-group">
                                    <select class=" form-select  edit-product-status" id="edit_product_status"
                                        name="status" required>
                                        <option value="">Select product status</option>
                                        <option value="1">Unavailable</option>
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
        <script src="{{ asset('/js/order.js') }}"></script>
    </div>

@endsection
