<div id="editCategoryModal" class="modal fade edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route("updateCategory")}}" method="post">
                @csrf
                <input hidden name="id_categoria_planejamento" class="edit-input-id" />
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nome_categoria" class="form-control edit-input-name" required>
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
