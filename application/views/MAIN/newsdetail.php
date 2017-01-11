<style>
    .image-news
    {
        width: 70%;
        height: 70%;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .news-conf
    {
        color: darkgray;
    }
    hr.separator
    {
        background-color: black;
        height: 1px;
        width: 90%;
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
                echo "
                <div class='news-conf'>
                    Penulis : " . $news["author"] . "<br>"
                    . date('l, j/n/Y H:i A', isset($news['date_created'])?strtotime($news['date_created']) : "-") .
                "</div><br>
                ";
                if($news["header_image"] != null)
                {
                    echo "<img class='image-news' src='" . base_url($news["header_image"]) . "'>";
                }
                else
                {
                    echo "<img class='image-news' src='" . base_url("asset/images/image-not-found.jpg") . "'><br>";
                }
                echo "<br><hr class='separator'><br>";
                echo $news["content"];
                echo "<br><br><br>";
            ?>
        </div>
    </section>
</section>

</body>
</html>