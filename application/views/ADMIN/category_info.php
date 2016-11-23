<?php
if($this->session->flashdata('add_category_err')!==null){
	$add_category_err = $this->session->flashdata('add_category_err');
	// vd("category",$add_category_err);
}else{
	$add_category_err = '';
}
?>




<?php $this->load->view('/ADMIN/header')?>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="<?=base_url('/ADMIN')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Category &amp; Sub-Category</a></div>
  <h1>Common Form Elements</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
  <!-- Sub Category-->
  <div class="span6">
      <div class="widget-box">
        <div class="widget-title" id='add_sub_category_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Category</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='add_sub_category_div'>
          <form action="<?=base_url('/ADMIN/Category/add_category')?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" required>Category Name:</label>
              <div class="controls">
                <input type="text" name='category_name' class="span11" placeholder="Last name" />

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
        <div class="widget-title" id='add_category_toggle'> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Sub-Category</h5>
        </div>
        <div class="widget-content nopadding" style='display:none;' id='add_category_div'>
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Company info :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Description field:</label>
              <div class="controls">
                <input type="text" class="span11" />
                <span class="help-block">Description field</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Message</label>
              <div class="controls">
                <textarea class="span11" ></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
  </div>
 </div>
</div>
</div>
<?php $this->load->view('/ADMIN/footer')?>

<script>
	$("document").ready(function(){
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
</script>