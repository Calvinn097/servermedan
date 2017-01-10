<?php
//if($this->session->flashdata('edit_service_type_err')!==null){
//    $edit_service_type_err = $this->session->flashdata('edit_service_type_err');
//    // vd("category",$add_category_err);
//}else{
//    $edit_service_type_err = '';
//}
?>
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit News Category</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url('ADMIN/News/edit_news_category')?>">
                <input type="hidden" name="news_category_id" value="<?=$news_category['news_category_id']?>">
                <div class="control-group">
                    <label class="control-label" required>News Category:</label>
                    <div class="controls">
                        <input type="text" name='news_category' class="form form-control" placeholder="Service type" value="<?=$news_category['news_category']?>" required />
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