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
  <h5>Recent Posts</h5>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="widget-content nopadding">
    <ul class="recent-posts">
    <?php foreach($news as $key=>$row){ ?>
      <li>
        <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
        <div class="article-post">
          <div class="fr"><a href="#" class="btn btn-primary btn-mini edit_news" data-news_id="<?=$row['news_id']?>">Edit</a> 
          <a href="#" class="btn btn-success btn-mini publish_news" data-news_id="<?=$row['news_id']?>">Publish</a> 
          <a href="#" class="btn btn-danger btn-mini delete_news" data-news_id="<?=$row['news_id']?>">Delete</a></div>
          <span class="user-info"> By: <?=$row['author']?> / Date: <?=$row['date_created']?> / Edited:<?=$row['date_edited']?> By: <?=$row['edited_by']?> </span>
          <p><a href="#"><?=$row['content']?></a> </p>
        </div>
      </li>
    <?php } ?>
    <li>
      <button class="btn btn-warning btn-mini">View All</button>
    </li>
    </ul>
    </div>
  </div>
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
    <form method="post" role="form" action="<?=base_url('/ADMIN/news/add_news')?>">
    <select class="form form-control" name="news_category_id">
    <?php foreach($news_category as $key=>$row){ ?>
    <option value = "<?=$row["news_category_id"]?>"><?=$row["news_category"]?></option>
    <?php } ?>
    </select>
    <textarea id="news_area" name="content">Hello world!</textarea>
    <input type="submit" class="btn btn-success" value="Post">
    <button class="btn btn-warning btn-cancel">Cancel</button>
    </form>
    </div>
  </div>
  </div>
  </div>
</div>
<?php $this->load->view('/ADMIN/footer')?>
<script>

$("document").ready(function(){
  // $(".btn-cancel").click(function(e){
  //   alert('hello');
  //   // e.preventDefault();
  //   // var tinymce_editor_id = 'news_area'; 
  //   // tinymce.get(tinymce_editor_id).setContent('');
  // });
});

$(".btn-cancel").click(function(e){
    alert('hello');
    e.preventDefault();
    var tinymce_editor_id = 'news_area'; 
    tinymce.get(tinymce_editor_id).setContent('');
});
$(".edit_news").click(function(){
  
});
$(".publish_news").click(function(){

});
$(".delete_news").click(function(){

});
</script>