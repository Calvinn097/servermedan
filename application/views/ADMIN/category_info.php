<?php
if($this->session->flashdata('add_category_err')!==null){
	$add_category_err = $this->session->flashdata('add_category_err');
	// vd("category",$add_category_err);
}else{
	$add_category_err = '';
}
if($this->session->flashdata('add_sub_category_err')!==null){
	$add_sub_category_err = $this->session->flashdata('add_sub_category_err');
	// vd("category",$add_category_err);
}else{
	$add_sub_category_err = '';
}
// vd('res',$results);
?>




<?php $this->load->view('/ADMIN/header')?>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="<?=base_url('/ADMIN')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Category &amp; Sub-Category</a></div>
  <h1>Manage Category & Sub Category</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
  <!-- Sub Category-->
  <div class="span6">
      <div class="widget-box">
        <div class="widget-title" id='add_category_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Category (click to slide!)</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='add_category_div'>
          <form action="<?=base_url('/ADMIN/Category/add_category')?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" required>Category Name:</label>
              <div class="controls">
                <input type="text" name='category_name' class="span11" placeholder="Category name" />

                <?php if($add_category_err!=''){ ?>
                	<span style='color:red;'><?=$add_category_err['category_name']?></span><br>
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

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title" id='add_sub_category_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Sub-Category (click to slide!)</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='add_sub_category_div'>
          <form method="post" action="<?=base_url('ADMIN/Category/add_sub_category')?>" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" required>Category:</label>
              <div class="controls">
                <select id='category_select' name='category_id' class='span11' required>
                	<?php foreach($category_list as $key => $row){ ?>
                		<option value='<?=$row['category_id']?>'><?=$row['category_name']?></option>
                	<?php } ?>
                </select>

                <?php if($add_sub_category_err!=''){ ?>
                	<span style='color:red;'><?=$add_sub_category_err['sub_category_name']?></span><br>
                <?php } ?>
              </div>
              <label class="control-label" required>Sub Category Name:</label>
              <div class="controls">
                <input type="text" name='sub_category_name' class="span11" placeholder="Sub category name" required />

                <?php if($add_sub_category_err!=''){ ?>
                	<span style='color:red;'><?=$add_sub_category_err['sub_category_name']?></span><br>
                <?php } ?>
              </div>
              <div class="control-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="type[]" value='service'/>
                  Servis</label>
                <label>
                  <input type="checkbox" name="type[]" value='reparation'/>
                  Reparasi</label>
                <label>
                  <input type="checkbox" name="type[]" value='jasa'/>
                  Jasa</label>
              </div>
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
    <h5>Category List</h5>
  </div>

  
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Cateogry ID</th>
          <th>Category Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($results as $key=>$row){ ?>
       <tr class="gradeX">
          <td><?=$row['category_id']?></td>
          <td><?=$row['category_name']?></td>
          <td>
          <a href="#" data-cat_id="<?=$row['category_id']?>" class="editcat"><i class="fa fa-edit"></i></a>
          <a class="delete_cat" href="#" data-cat_id="<?=$row['category_id']?>"><i class="fa fa-trash"></i></a>
          </td>
       </tr>
      <?php } ?>
      </tbody>
    </table>
  <div class="pagination alternate"><?=$links?></div>

</div>
</div>
</div>

<div class="container-fluid">
  <hr>
  <div class="row-fluid">
  <!-- Sub Category-->
  <div class="span12">
      <div class="widget-box">
        <div class="widget-title" id='sub_category_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Sub Category (click to slide!)</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='sub_category_div'>
		    <div class="widget-box collapsible">
		    <?php foreach($sub_category_list as $key=>$row){ ?>
		    	<div class="widget-title"> <a href="#collapse_<?=$key?>" data-toggle="collapse"> <span class="icon"><i class="icon-arrow-right"></i></span>
		    	<h5><?=$key?></h5>
		        </a> </div>
		        <div class="collapse in" id="collapse_<?=$key?>">
		        <div class="widget-content">
					<table class="table table-bordered table-striped">
					<thead>
				        <tr>
				          <th>Sub Category ID</th>
				          <th>Sub Category Name</th>
				          <th>Service</th>
				          <th>Reparation</th>
				          <th>Jasa</th>
                  <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
		    	<?php foreach($row as $key2=>$row2){ ?>
			       <tr class="gradeX">
			          <td><?=$row2['sub_category_id']?></td>
			          <td><?=$row2['sub_category_name']?></td>
			          <td><?=($row2['service']==1)?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>'?></td>
			          <td><?=($row2['reparation']==1)?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>'?></td>
			          <td><?=($row2['jasa']==1)?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>'?></td>
                <td><a href="#" data-sub_cat_id="<?=$row2['sub_category_id']?>" class="span2 edit_subcat"><i class="fa fa-edit"></i></a>
                <a class="span2 delete_subcat" href="#" data-sub_cat_id="<?=$row2['sub_category_id']?>"><i class="fa fa-trash"></i></a>
                </td>
			       </tr>
		    	<?php } ?>
		    		</tbody>
		    		</table>    
		        </div>
		      	</div>
		    <?php } ?>
		    </div>
        </div>
      </div>
  </div>

 </div>
</div>

</div>
<div id="editsubcat" class="modal fade" role="dialog">
  
</div>
<div id="editcat" class="modal fade" role="dialog">
  
</div>
<?php $this->load->view('/ADMIN/footer')?>

<script>
	$("document").ready(function(){
    $("#editsubcat").appendTo("body");
    $("#editcat").appendTo("body");
		<?php if($this->session->flashdata('add_category_err')!==null){ ?>
			$("#add_category_div").toggle();
		<?php } ?>
	});
	$("#add_category_toggle").click(function(){
		$("#add_category_div").toggle('777');
	});
	$("#add_sub_category_toggle").click(function(){
		$("#add_sub_category_div").toggle('777');
	});
	$("#sub_category_toggle").click(function(){
		$("#sub_category_div").toggle('777');
	});
  $(".edit_subcat").click(function(e){
    e.preventDefault();
    var sub_cat_id = $(this).data('sub_cat_id');
    $.ajax({
        type:"POST",
        url:"<?=base_url('/ADMIN/Category/edit_subcat/')?>",
        dataType:"html",
        data:{
            sub_cat_id:sub_cat_id
        },
        success:function(res){
            $("#editsubcat").html(res);
            $("#editsubcat").modal("show");
        }
    })
  });
  $(".delete_subcat").click(function(e){
    if (confirm('Delete?')) {
      var sub_cat_id = $(this).data('sub_cat_id');
      $(this).attr('href',"<?=base_url('ADMIN/category/delete_sub_category')?>/"+sub_cat_id);
    } else {
      return false;
    }
  })

$(".editcat").click(function(e) {
  e.preventDefault();
  var cat_id = $(this).data('cat_id');
  $.ajax({
      type:"POST",
      url:"<?=base_url('/ADMIN/Category/edit_cat/')?>",
      dataType:"html",
      data:{
          cat_id:cat_id
      },
      success:function(res){
          $("#editcat").html(res);
          $("#editcat").modal("show");
      }
  });
});
  $(".delete_cat").click(function(e){
    if (confirm('Delete?')) {
      var cat_id = $(this).data('cat_id');
      $(this).attr('href',"<?=base_url('ADMIN/category/delete_category')?>/"+cat_id);
    } else {
      return false;
    }
  });
</script>