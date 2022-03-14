<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route("storeProduct")}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nome_produto" class="form-control edit-input-name" required>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="id_categoria_produto" class="form-control categoria_produto" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id_categoria_planejamento}}">{{$category->nome_categoria}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <input name="valor_produto" class="form-control edit-input-name decimal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
