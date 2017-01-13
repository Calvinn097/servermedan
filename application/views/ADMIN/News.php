<?php $this->load->view('/ADMIN/header')?>
<script src="<?=base_url('/asset/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script>
tinymce.init({
    selector: '#news_area',
    toolbar: 'newdocument | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify | styleselect | formatselect | fontselect | fontsizeselect | cut | copy | paste | bullist | numlist | outdent | indent | blockquote | undo | redo | removeformat | subscript | superscript'

  });
</script>
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="<?=base_url('/ADMIN')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Manage News</a></div>
  <h1>Manage News</h1>
  </div>
  <div class="container-fluid">
  <hr>
  <div class="widget-title"> <span class="icon"> <i class="icon-file"></i></span>
  <h5>Recent News</h5>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="widget-content nopadding">
    <ul class="recent-posts">
    <?php foreach($news as $key=>$row){ ?>
      <li>
        <?php if($row['header_image']!=null){ ?>
        <img src="<?=base_url($row['header_image'])?>">
        <?php } ?>
        <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
        <div class="article-post">
          <div class="fr"><a href="<?=base_url("ADMIN/News/edit_news/".$row["news_id"])?>" class="btn btn-primary btn-mini edit_news" data-news_id="<?=$row['news_id']?>">Edit</a> 
          <a href="#" class="btn btn-success btn-mini publish_news" data-news_id="<?=$row['news_id']?>">Publish</a> 
          <a href="#" class="btn btn-danger btn-mini delete_news" data-news_id="<?=$row['news_id']?>">Delete</a></div>
          <span class="user-info"><h3><?=$row["news_title"]?></h3> By: <?=$row['author']?> / Date: <?=$row['date_created']?> / Edited:<?=$row['date_edited']?> By: <?=$row['edited_by']?> </span>
          <p><a href="#"><?=$row['content']?></a> </p>
        </div>
      </li>
    <?php } ?>
    <li>
      <div class="pagination alternate"><?=$links?></div>
    </li>
    </ul>
    </div>
  </div>
  </div>
  </div>
  <div class="container-fluid">
    <div class="widget-title" id="news_category_div_collapser"> <span class="icon"> <i class="icon-file"></i></span>
    <h5>Add News Category (can be clicked)</h5>
    </div>
    <div class="widget-content nopadding" style='display:none;' id='add_news_category_div'>
      <form action="<?=base_url('/ADMIN/News/insert_news_category')?>" method="post" class="form-horizontal">
        <div class="control-group">
          <label class="control-label" required>News Category:</label>
          <div class="controls">
            <input type="text" name='news_category' class="span11" placeholder="News Category" />
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </form>
    </div>
  </div>
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>News Category List</h5>
      </div>


      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>News Category ID</th>
          <th>News Category</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($news_category as $key=>$row){ ?>
          <tr class="gradeX">
            <td><?=$row['news_category_id']?></td>
            <td><?=$row['news_category']?></td>
            <td>
              <a href="#" data-news_category_id="<?=$row['news_category_id']?>" class="edit_news_category"><i class="fa fa-edit"></i></a>
              <a class="delete_news_category" href="#" data-news_category_id="<?=$row['news_category_id']?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>

    </div>
  </div>
  <div class="container-fluid">
  <hr>
  <div class="widget-title"> <span class="icon"> <i class="icon-file"></i></span>
  <h5>Add Posts</h5>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="widget-content nopadding">
    <form method="post" role="form" enctype="multipart/form-data" action="<?=base_url('/ADMIN/news/add_news')?>">
    <select class="form form-control" name="news_category_id">
    <?php foreach($news_category as $key=>$row){ ?>
    <option value = "<?=$row["news_category_id"]?>"><?=$row["news_category"]?></option>
    <?php } ?>
    </select>
    <br>
    <label for="news_title">News Title</label>
    <input type="text" name="news_title">
    <label>Header Image</label>
    <input type="file" name="userfile">
    <textarea id="news_area" name="content"></textarea>
    <input type="submit" class="btn btn-success" value="Post">
    <button class="btn btn-warning btn-cancel">Cancel</button>
    </form>
    </div>
  </div>
  </div>
  </div>
</div>
<div id="edit_news_category_modal" class="modal fade" role="dialog">

</div>
<?php $this->load->view('/ADMIN/footer')?>
<script>
$(".delete_news").click(function(){
  if (confirm('Delete?')) {
    var news_id = $(this).data('news_id');
    $(this).attr('href',"<?=base_url('ADMIN/News/delete_news')?>/"+news_id);
  } else {
    return false;
  }
})
</script>
<script>

$("document").ready(function(){
  // $(".btn-cancel").click(function(e){
  //   alert('hello');
  //   // e.preventDefault();
  //   // var tinymce_editor_id = 'news_area'; 
  //   // tinymce.get(tinymce_editor_id).setContent('');
  // });
  $("#news_category_div_collapser").click(function(){
    $("#add_news_category_div").toggle("777");
  });
});

$(".btn-cancel").click(function(e){
    //alert('hello');
    e.preventDefault();
    var tinymce_editor_id = 'news_area'; 
    tinymce.get(tinymce_editor_id).setContent('');
});

$(".edit_news_category").click(function(e){
  e.preventDefault();
  var news_category_id = $(this).data('news_category_id');
  $.ajax({
    type:"POST",
    url:"<?=base_url('/ADMIN/news/edit_news_category_modal/')?>",
    dataType:"html",
    data:{
      news_category_id:news_category_id
    },
    success:function(res){
      $("#edit_news_category_modal").html(res);
      $("#edit_news_category_modal").modal("show");
    }
  })
});
$(".delete_news_category").click(function(){
  if (confirm('Delete?')) {
    var news_category_id = $(this).data('news_category_id');
    $(this).attr('href',"<?=base_url('ADMIN/news/delete_news_category')?>/"+news_category_id);
  } else {
    return false;
  }
})
</script>