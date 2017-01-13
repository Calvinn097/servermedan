<style>
    .btn-dropdown
    {
        width:200% !important; 
    }
    .inline
    {
        display: inline;
    }
    .separator
    {
        height: 1px;
        background-color: black; 
    }
    .content
    {
        margin-top: 20px;
    }
    .grid-news
    {
        height: 330px;
        background-color: rgba(10, 10, 10, 0.8);
        box-shadow: 0px 0px 10px #0A0000;
        cursor: pointer;
    }
    .grid-news:hover
    {
        background-color: rgba();
        transition: all 0.5s; 
    }
    .image-news
    {
        margin-top: 15px;
        width: 100%;
        height: 200px;
    }
    .news_time
    {
        font-size: 13px;
        color: white;
    }
    h3
    {
        text-align: center;
        color: lightgray !important;
        margin-top: 10px !important;
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
        <h1 class="inline">Kategori Berita </h1>
        <div class="btn-group inline">
            <button type="button" class="btn btn-info btn-block btn-dropdown dropdown-toggle" data-toggle="dropdown">
                <?php
                    echo (isset($_GET["category"]) ? $_GET["category"] : "Semua Kategori");
                ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu btn-dropdown" role="menu">
                <li>
                    <a href="<?=base_url("news")?>">Semua Kategori</a>
                </li>
                <?php
                    foreach($category as $key=>$value)
                    {
                        echo "<li class='divider'></li>";
                        echo "
                        <li><a href='" . base_url("news?id=" . $value["news_category_id"] . "&category=" . $value["news_category"]) . "'>" . $value["news_category"] . "</a></li>
                        ";
                    }
                ?>  
            </ul>
        </div>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid">
            <div class="row">
            <?php foreach($news as $key=>$row){ ?>
                <div class="col-md-4 content">
                    <a href="<?=base_url("news/getDetail/$row[news_id]")?>">
                    <div class="col-md-12 grid-news">
                        <?php
                        if($row["header_image"]!=null) {
                            echo "<img class='image-news' src='" . base_url($row["header_image"]) . "'>";
                        }
                        else {
                            echo "<img class='image-news' src='" . base_url("asset/images/image-not-found.jpg") . "'><br>";
                        } ?> 
                        <h3>
                            <?php
                                $newsTitle = isset($row["news_title"]) ? $row["news_title"] : "Tidak ada judul";
                                if(strlen($newsTitle) > 70)
                                {
                                    echo substr($newsTitle, 0, 67) . "...";
                                }
                                else
                                {
                                    echo $newsTitle;
                                }
                            ?>
                        </h3>
                        <hr>
                        <span class="news_time"><?=date('l, j/m/Y H:i A', isset($row['date_created'])?strtotime($row['date_created']) : "No created Date") ?></span>
                    </div>
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
        <br>
        <br>
    </section>
</section>
</body>
</html>

<!--/asset/images/news/7/header_image/-->