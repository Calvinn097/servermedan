<?php
if($this->session->flashdata('edit_sub_category_err')!==null){
  $edit_sub_category_err = $this->session->flashdata('edit_sub_category_err');
  // vd("category",$add_category_err);
}else{
  $edit_sub_category_err = '';
}
?>
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Sub Category</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('ADMIN/Category/update_sub_category')?>">
        <input type="hidden" name="sub_category_id" value="<?=$sub_cat_info['sub_category_id']?>">
            <div class="control-group">
              <label class="control-label" required>Category:</label>
              <div class="controls">
                <select id='category_select' name='category_id' class='form form-control' required>
                  <?php foreach($category_list as $key => $row){ ?>
                    <?php if($row['category_id']==$sub_cat_info['category_id']){ ?>
                    <option value='<?=$row['category_id']?>' selected><?=$row['category_name']?></option>
                  <?php }else{ ?>
                    <option value='<?=$row['category_id']?>'><?=$row['category_name']?></option>
                  <?php } ?>
                  <?php }?>
                </select>

                <?php if($edit_sub_category_err!=''){ ?>
                  <span style='color:red;'><?=$add_sub_category_err['sub_category_name']?></span><br>
                <?php } ?>
              </div>
              <label class="control-label" required>Sub Category Name:</label>
              <div class="controls">
                <input type="text" name='sub_category_name' class="form form-control" placeholder="Sub category name" value="<?=$sub_cat_info['sub_category_name']?>" required />

                <?php if($edit_sub_category_err!=''){ ?>
                  <span style='color:red;'><?=$edit_sub_category_err['sub_category_name']?></span><br>
                <?php } ?>
              </div>
              <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="type[]" value='service' <?=($sub_cat_info['service']==1)?"checked":""; ?>/>
                  Servis</label>
                <label>
                  <input type="checkbox" name="type[]" value='reparation' <?=($sub_cat_info['reparation']==1)?"checked":""; ?>/>
                  Reparasi</label>
                <label>
                  <input type="checkbox" name="type[]" value='jasa' <?=($sub_cat_info['jasa']==1)?"checked":""; ?> />
                  Jasa</label>
              </div>
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