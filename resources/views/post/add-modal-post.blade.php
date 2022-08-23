<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="add-post">
                @csrf
                <div class="form-group">
                    <label for="add-title">Title</label>
                    <input type="text" name="add-title" id="add-title" class="form-control">
                    <small class="form-text text-danger" id="title-error-add"></small>
                  </div>
                  <div class="form-group">
                    <label for="add-content">Content</label>
                    <input type="text" name="add-content" id="add-content" class="form-control">
                    <small class="form-text text-danger" id="content-error-add"></small>
                  </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Post</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>