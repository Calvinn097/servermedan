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
    <h1><?=hsc($row["news_title"])?></h1>
    <?=$row['date_created']?>
    <br>
    <?php if($row["header_image"]!=null){ ?>
        <img src="<?=base_url($row['header_image'])?>">
        <br>
    <?php } ?>
    Content:
    <?=(substr($row['content'],0,674))?>...
    <a class="btn btn-info" href="<?=base_url("news/complete_news/".$row["news_id"])?>">Baca Selengkapnya</a>
    <hr>
</div>
<br>
<?php } ?>
</article>