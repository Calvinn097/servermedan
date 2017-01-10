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
<div>
    <h1><?=hsc($news["news_title"])?></h1>
    <?=$news['date_created']?>
    <br>
    <?php if($news["header_image"]!=null){ ?>
        <img src="<?=base_url($news['header_image'])?>">
        <br>
    <?php } ?>
    Content:
    <?=$news['content']?>
    <hr>
</div>
<br>
</article>