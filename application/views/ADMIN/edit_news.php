<?php $this->load->view('/ADMIN/header')?>
<script src="<?=base_url('/asset/tinymce/js/tinymce/tinymce.min.js')?>"></script>
<script>
tinymce.init({
    selector: '#news_edit_area',
    toolbar: 'newdocument | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify | styleselect | formatselect | fontselect | fontsizeselect | cut | copy | paste | bullist | numlist | outdent | indent | blockquote | undo | redo | removeformat | subscript | superscript'

  });
</script>
<div id="content">
  <div class="container-fluid">
  <hr>
  <div class="widget-title"> <span class="icon"> <i class="icon-file"></i></span>
  <h5>Add Posts</h5>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="widget-content nopadding">
      <form method="post" role="form" action="<?=base_url('/ADMIN/news/change_news/'.$news["news_id"])?>">
      <select class="form form-control" name="news_category_id">
      <?php foreach($news_category as $key=>$row){ ?>
      <option value = "<?=$row["news_category_id"]?>"><?=$row["news_category"]?></option>
      <?php } ?>
      </select>
      <textarea id="news_edit_area" name="content"><?=$news["content"]?></textarea>
      <input type="submit" class="btn btn-success" value="Save">
      <a class="btn btn-warning btn-cancel" href="<?=base_url("/ADMIN/News")?>">Cancel</a>
      </form>
    </div>
  </div>
  </div>
  </div>
</div>
<script>
</script>