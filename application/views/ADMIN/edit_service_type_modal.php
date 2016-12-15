<?php
if($this->session->flashdata('edit_service_type_err')!==null){
  $edit_service_type_err = $this->session->flashdata('edit_service_type_err');
  // vd("category",$add_category_err);
}else{
  $edit_service_type_err = '';
}
?>
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Service Type</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('ADMIN/Service_type/update_service_type')?>">
        <input type="hidden" name="service_type_id" value="<?=$service_type['service_type_id']?>">
            <div class="control-group">
              <label class="control-label" required>Service Type:</label>
              <div class="controls">
                <input type="text" name='service_type' class="form form-control" placeholder="Service type" value="<?=$service_type['service_type']?>" required />

                <?php if($edit_service_type_err!=''){ ?>
                  <span style='color:red;'><?=$edit_service_type_err['service_type']?></span><br>
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