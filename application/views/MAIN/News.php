<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homeloginrepair.css",
                "asset/css/detailpost.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
<article>
<?php foreach($news as $key=>$row){ ?>
<div>
    <h1><?=$row["news_title"]?></h1>
    <?=$row['date_created']?>
    <br>
    <?php if($row["header_image"]!=null){ ?>
        <img src="<?=base_url($row['header_image'])?>">
        <br>
    <?php } ?>
    Content:
    <?=$row['content']?>
    <hr>
</div>
<br>
<?php } ?>
</article>