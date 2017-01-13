<?php
if($this->session->flashdata('add_service_type_err')!==null){
  $service_type_err = $this->session->flashdata('add_service_type_err');
  // vd("category",$add_category_err);
}else{
  $service_type_err = '';
}
// vd('res',$results);
?>




<?php $this->load->view('/ADMIN/header')?>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="<?=base_url('/ADMIN')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Service Type</a></div>
  <h1>Manage Service Type</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
  <!-- Sub Category-->
  <div class="span12">
      <div class="widget-box">
        <div class="widget-title" id='add_service_type_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Service Type (clickme to slide down :) )</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='add_service_type_div'>
          <form action="<?=base_url('/ADMIN/Service_type/add_service_type')?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" required>Service Type:</label>
              <div class="controls">
                <input type="text" name='service_type' class="span11" placeholder="Service Type name" />

                <?php if($service_type_err!=''){ ?>
                  <span style='color:red;'><?=$service_type_err['service_type']?></span><br>
                <?php } ?>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Add</button>
            </div>
          </form>
        </div>
      </div>
  </div>

 </div>
 <div class="row-fluid">
 <div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
    <h5>Service Type List</h5>
  </div>

  
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Service Type ID</th>
          <th>Service Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($service_type as $key=>$row){ ?>
       <tr class="gradeX">
          <td><?=$row['service_type_id']?></td>
          <td><?=$row['service_type']?></td>
          <td>
          <a href="#" data-service_type_id="<?=$row['service_type_id']?>" class="edit_service_type"><i class="fa fa-edit"></i></a>
          <a class="delete_service_type" href="#" data-service_type_id="<?=$row['service_type_id']?>"><i class="fa fa-trash"></i></a>
          </td>
       </tr>
      <?php } ?>
      </tbody>
    </table>

</div>
</div>
 </div>
 </div>
<div id="edit_service_type_modal" class="modal fade" role="dialog">
  
</div>
 <?php $this->load->view("ADMIN/footer")?>
 <script>
 $("document").ready(function(){
  $("#edit_service_type_modal").appendTo("body");
 })
 $("#add_service_type_toggle").click(function(){
  $("#add_service_type_div").toggle("777");
 });

 $(".edit_service_type").click(function(e){
  e.preventDefault();
    var service_type_id = $(this).data('service_type_id');
    $.ajax({
        type:"POST",
        url:"<?=base_url('/ADMIN/service_type/edit_service_type/')?>",
        dataType:"html",
        data:{
            service_type_id:service_type_id
        },
        success:function(res){
            $("#edit_service_type_modal").html(res);
            $("#edit_service_type_modal").modal("show");
        }
    })
});
$(".delete_service_type").click(function(){
  if (confirm('Delete?')) {
    var service_type_id = $(this).data('service_type_id');
    $(this).attr('href',"<?=base_url('ADMIN/service_type/delete_service_type')?>/"+service_type_id);
  } else {
    return false;
  }
})
 
 
 </script>




