<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{asset('js/jquery.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('DataTables/datatables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/products.js')}}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <title>Products</title>
</head>
<body>
<div class="container">
    <div class="panel-heading page-header">
        <nav class="navbar">
            <ul class="nav-tabs">
                <a href="{{route("home")}}">
                    <span class="fa fa-home" />
                </a>
                >
                Products
            </ul>
        </nav>
    </div>
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                        <a href="#deleteProductModal" class="btn btn-danger delete-button" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <table id="dtBasicExample" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                    </th>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Value</th>
                    <th class="th-sm">Category</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" class="checkbox-item" id="checkbox{{$product->id_categoria_produto}}" name="options[]" value="{{$product->id_categoria_produto}}">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>{{ $product->nome_produto }}</td>
                        <td>{{ $product->valor_produto }}</td>
                        <td>{{ $product->nome_categoria }}</td>
                        <td>{{ $product->data_cadastro }}</td>
                        <td>
                            <a href="#editProductModal" class="edit-product-modal-link" data-id="{{$product->id_produto}}" data-name="{{$product->nome_produto}}" data-category-id="{{$product->id_categoria_produto}}" data-value="{{$product->valor_produto}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteProductModal" class="delete-modal-link" data-id="{{$product->id_produto}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
@include('products.add-modal')
<!-- Edit Modal HTML -->
@include('products.edit-modal')
<!-- Delete Modal HTML -->
@include('products.delete-modal')
</body>
</html>


