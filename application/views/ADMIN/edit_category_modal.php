<?php
if($this->session->flashdata('edit_category_err')!==null){
  $edit_category_err = $this->session->flashdata('edit_category_err');
  // vd("category",$add_category_err);
}else{
  $edit_category_err = '';
}
?>
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Category</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('ADMIN/Category/update_category')?>">
        <input type="hidden" name="category_id" value="<?=$cat_info['category_id']?>">
            <div class="control-group">
              <label class="control-label" required>Category Name:</label>
              <div class="controls">
                <input type="text" name='category_name' class="form form-control" placeholder="Category name" value="<?=$cat_info['category_name']?>" required />

                <?php if($edit_category_err!=''){ ?>
                  <span style='color:red;'><?=$edit_category_err['category_name']?></span><br>
                <?php } ?>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>