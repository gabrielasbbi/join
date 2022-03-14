<div id="editProductModal" class="modal fade edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route("updateProduct")}}" method="post">
                @csrf
                <input hidden name="id_produto" class="edit-input-id" />
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nome_produto" class="form-control edit-input-name" required>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="id_categoria_produto" class="form-control edit-select-category" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id_categoria_planejamento}}">{{$category->nome_categoria}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <input name="valor_produto" class="form-control edit-input-value decimal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
