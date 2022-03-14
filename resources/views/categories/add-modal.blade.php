<div id="addCategoryModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route("storeCategory")}}" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input value="" name="nome_categoria" id="nome_categoria" type="text" class="form-control" required="true">
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
