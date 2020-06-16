<div class="modal-header">
    <h5 class="modal-title">New Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_categories">
    <div class="modal-body">
        <div class="row mg-tb-15">
            <div class="col-12">
                <div class="form-group">
                    <label for="name_category">Name: </label>
                    <input type="text" name="name_category" class="form-control" id="name_category">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group"><label for="desc_category">Description: </label></div>
            </div>
            <textarea name="desc_category" class="form-control" id="desc_category"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Ok</button>
    </div>
</form>