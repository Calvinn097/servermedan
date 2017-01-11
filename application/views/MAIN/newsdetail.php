<style>
    .image-news
    {
        width: 90%;
        height: 60%;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>

<?php
    $header_data = array(
        "title"=>"Berita - SERVER Medan"
    );
     $this->load->view("MAIN/side.php",$header_data);
?>

<section class="main-content-wrapper">
    <div class="pageheader">
        <h1>
            <?php
                echo $news["news_category"] . " - ";
                echo isset($news["news_title"])?$news["news_title"]: "Tidak Ada Judul"; 
             ?>
        </h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid">
            <?php
                if($news["header_image"] != null)
                {
                    echo "<img class='image-news' src='" . base_url($news["header_image"]) . "'>";
                }
                else
                {
                    echo "<img class='image-news' src='" . base_url("asset/images/image-not-found.jpg") . "'><br>";
                }
                print_r($news);
            ?>
        </div>
    </section>
</section>

</body>
</html>