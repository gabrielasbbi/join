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
    <script src="{{asset('js/app.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/categories.js')}}" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <title>Categories</title>
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
                Categories
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
                        <h2>Manage <b>Categories</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addCategoryModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
                        <a href="#deleteCategoryModal" class="btn btn-danger delete-button" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
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
                    <th class="th-sm">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
							<span class="custom-checkbox">
								<input type="checkbox" class="checkbox-item" id="checkbox{{$category->id_categoria_planejamento}}" name="options[]" value="{{$category->id_categoria_planejamento}}">
								<label for="checkbox1"></label>
							</span>
                        </td>
                        <td>{{ $category->nome_categoria }}</td>
                        <td>
                            <a href="#editCategoryModal" class="edit-modal-link" data-name="{{$category->nome_categoria}}" data-id="{{$category->id_categoria_planejamento}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteCategoryModal" class="delete-modal-link" data-id="{{$category->id_categoria_planejamento}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
@include('categories.add-modal')
<!-- Edit Modal HTML -->
@include('categories.edit-modal')
<!-- Delete Modal HTML -->
@include('categories.delete-modal')
</body>
</html>


