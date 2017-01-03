<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data);

?>
<br><br><br>
<br>
<br> <!-- br hanya untuk enter aja hilangkan saja kalau tidak perlu!-->
<div class="row">
<form action="<?=base_url("/repairman/pasang_banner")?>" method="post" enctype="multipart/form-data" role="form">

Pilih Categgory
<select name="category_id" class="btn btn-info" required id="select_category_banner">
	<option value="" disabled selected>Pilih kategori anda</option>
    <?php foreach($category as $row){ ?>
        <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
    <?php } ?>
    <!-- <option>Gadget</option> -->
    <!-- 
    <option>Kendaraan</option>
    <option>Listrik</option>
    <option>Bangunan</option>
    <option>Saluran Air</option> -->
</select>
Pilih subcategory
<select name="sub_category_id" id="select_sub_category_banner">
</select>

Upload gambar promo untuk ditampilkan di home servermedan
Gambar yang telah di approve admin akan ditampilkan di homepage (GRATIS)
<label for="upload_promo_banner"></label>
<input type="file" name="userfile" id="upload_promo_banner">
<input type="submit" value="kirim">
</form>

<script>
$("#select_category_banner").change(function() {
  var cat_id = $(this).val();
  $.ajax({
      type:"POST",
      url:"<?=base_url('/Category/sub_category_list/')?>",
      dataType:"html",
      data:{
          category_id:cat_id
      },
      success:function(res){
          $("#select_sub_category_banner").html(res);
      }
  });
});
</script>
</div>