<!--google style-->
<!--<style>-->
<!--    #map {-->
<!--        height: 70%;-->
<!--    }-->
<!--    .controls {-->
<!--        margin-top: 10px;-->
<!--        border: 1px solid transparent;-->
<!--        border-radius: 2px 0 0 2px;-->
<!--        box-sizing: border-box;-->
<!--        -moz-box-sizing: border-box;-->
<!--        height: 32px;-->
<!--        outline: none;-->
<!--        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);-->
<!--    }-->
<!---->
<!--    /*#gmap_input {*/-->
<!--    /*background-color: #fff;*/-->
<!--    /*font-family: Roboto;*/-->
<!--    /*font-size: 15px;*/-->
<!--    /*font-weight: 300;*/-->
<!--    /*margin-left: 12px;*/-->
<!--    /*padding: 0 11px 0 13px;*/-->
<!--    /*text-overflow: ellipsis;*/-->
<!--    /*width: 300px;*/-->
<!--    /*}*/-->
<!---->
<!--    #gmap_input:focus {-->
<!--        border-color: #4d90fe;-->
<!--    }-->
<!---->
<!--    /*.pac-container {*/-->
<!--    /*font-family: Roboto;*/-->
<!--    /*}*/-->
<!---->
<!--    #type-selector {-->
<!--        color: #fff;-->
<!--        background-color: #4d90fe;-->
<!--        padding: 5px 11px 0px 11px;-->
<!--    }-->
<!---->
<!--    #type-selector label {-->
<!--        font-family: Roboto;-->
<!--        font-size: 13px;-->
<!--        font-weight: 300;-->
<!--    }-->
<!---->
<!--</style>-->
<!--Google Maps Script below-->
<script>
    function initMap() {
        var marker2;
        var geocoder = new google.maps.Geocoder();
        <?php if($detail_post["user_lat"]!=null && $detail_post["user_lng"]!=null){ ?>
        var map = new google.maps.Map(document.getElementById('map'),{
            center: {lat: <?=$detail_post["user_lat"]?>, lng: <?=$detail_post["user_lng"]?>},zoom:17
        });
        var myLatlng = new google.maps.LatLng(<?=$detail_post["user_lat"]?>, <?=$detail_post["user_lng"]?>);
        marker2 = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        marker2.setMap(map);
        <?php } ?>
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7DAYC5xAZ2cARU_7olhRhRtVgcV3jeWc&libraries=places&callback=initMap"
      async defer></script>
<?php

    $header_data = array(
            "title"=>"Welcome to Servermedan"
        );
     $this->load->view("MAIN/side.php",$header_data) 

?>
<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline">Kategori Berita </h1>
    </div>
    <section id="main-content" class="animated fadeInUp">
        <div class="container-fluid">
            <div id="wrapper">
                <div class="container">
                            <div class="portfolio">
                                <!-- Portfolio Item Heading -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">Detail Posting
                                            <!-- <small><?=$detail_post["post_title"]?></small> -->
                                        </h1>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <!-- Portfolio Item Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- <img class="img-responsive" src="http://placehold.it/750x500" alt=""> -->
                                        <img class="img-responsive" width="750" height="500" src=<?=base_url($detail_post["image"])?>>
                                    </div>

                                    <div class="col-md-6">
                                    <?php 
                                    if(count($finished)>0){
                                        echo "Date Finished = ".$finished["date_finished"]."<br>";
                                        echo "Review: ".$finished["review"]."<br>";
                                        echo "Rate: ".$finished["rate"]."<br>";
                                        $status="Finished";
                                        if($finished["lunas"]){
                                            $status="lunas";
                                        }else{
                                            if($repairman){
                                                echo "<a href='".base_url('user/lunas/'.$finished["post_finished_id"])."' class='btn btn-info'>Lunas!</a>";
                                            }
                                        }
                                        echo "<h5>Status: ".$status."</h5>";
                                    }
                                    ?>
                                        
                                        <h4><?=$detail_post["post_title"]?></h4> Posted by: <?=$detail_post["fname"]." ".$detail_post["lname"]?>
                                        <p><?=$detail_post["content"]?></p>
                                        <p>Service :<?=$detail_post["service_type"]?></p>
                                        <p>Category :<?=isset($detail_post["category_name"])?$detail_post["category_name"]:""?></p>
                                        <p>Category :<?=isset($detail_post["sub_category_name"])?$detail_post["sub_category_name"]:""?></p>
                                        <p>Address :<?=isset($detail_post["post_address"])?$detail_post["post_address"]:""?></p>
                                        <!-- <h4>Detail Kerusakan</h4>
                                        <ul>
                                            <li>Sulit dibaca</li>
                                            <li>Sulit dilihat</li>
                                            <li>Tidak dapat diterawang</li>
                                            <li>Tembus pandang</li>
                                        </ul> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map" style="height:400px; width:400px;"></div>
                                            </div>
                                        </div>
                                        <?php if($repairman){ ?>
                                            <?php if((isset($accepted["user_dealed"])?$accepted["user_dealed"]:0)==0 && count($finished)==0){ ?>
                                            <div class="agree">
                                                <ul>
                                                    <li>
                                                    <?php if(!empty($accepted)){ ?>
                                                    <?php $post_accepted_id=$accepted["post_accepted_id"]?>
                                                    <form action="<?=base_url("repairman/edit_post/".$detail_post["user_post_id"]);
                                                    ?>" method="post">
                                                    <?php }else{ ?>
                                                    <form action="<?=base_url("repairman/accept_post/".$detail_post["user_post_id"]);
                                                    ?>" method="post">
                                                    <?php } ?>
                                                    Estimasi waktu dalam hari:<input type="number" placeholder="7" min="1" max="365" name="estimasi_waktu" value="<?=$accepted["estimated_time"]?:""?>">
                                                    Harga:<input type="number" placeholder="min 5000"  name="harga" value="<?=$accepted["price"]?:""?>">
                                                    <?php if(!empty($accepted) ){ ?>
                                                    <input class="btn btn-info" type="submit" value="Edit">
                                                    <?php }else{ ?>
                                                    <input class="btn btn-info" type="submit" value="Terima">
                                                    <?php } ?>
                                                    </form>
                                                    </li>
                                                    <li>
                                                        <a href="<?=base_url("repairman/reject_post/".$detail_post["user_post_id"]);?>" class="btn btn-info">Tolak</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="comment">
                                Comment:
                                <ul>
                                    <?php foreach ($detail_post["comment"] as $key => $value): ?>
                                        <li>
                                        At <?=$value["date"]?>
                                        <?php 
                                        if($value["user_level"]>0){$linkprofile=base_url("user/profile_user_id/".$value["user_id"]);}
                                        else{$linkprofile=base_url("user/profile/".$value["user_id"]);}
                                        ?>
                                        <a href="<?=$linkprofile?>">
                                        <?=hsc($value["fname"])?> </a> is
                                        <?= ($value["user_level"]==null)?"User":"Repairman"; ?> Says:"
                                        <?=hsc($value["comment"])?>"
                                            
                                        </li>
                                        
                                    <?php endforeach ?>
                                </ul>

                                <form action="<?=base_url("user/user_comment")?>" method="post">
                                    <input type="hidden" name="user_post_id" value="<?=$detail_post["user_post_id"]?>">
                                    <textarea name="comment"></textarea>
                                    <input type="submit" value="Submit comment"></input>
                                </form>
                            </div>
                            <ul>
                        <!-- /.col-lg-8 -->
                        <!-- /.col-lg-4 -->
                    </div>
                    <h3>Repairman yang menerima order dari sang user akan nampak oleh author detail post ini.</h3>
                    <?php if(count($accepted_repairman_list)>0){ ?>
                        <?php foreach($accepted_repairman_list as $key=>$row){ ?>
                        <div style="border:1px solid black">
                        Accepted by<br>
                        Repairman name=<a href="<?=base_url("repairman/profile/".$row["repairman_accepter_id"])?>"><?=$row["repairman_accepter_name"]?></a><br>
                        Time accepted = <?=$row["date_accept"]?><br>
                        price = <?=toMoney($row["price"])?><br>
                        estimated repair time = <?=$row["estimated_time"]?><br>
                        <?php if($row["user_dealed"]>0){ ?>
                        <strong>Dealed at: </strong><?=$row["date_dealed"]?>
                        <!-- RATEEEEEEEEEEEEEEEEEEEEEE -->
                        <h3>RATE</h3>
                        <form action="<?=base_url("user/user_finished/".$row["user_post_id"]."/".$row["post_accepted_id"])?>" method="post">
                            Rate : 1-5 <input type="number" name="rate" min="1" max="5" required><br>
                            Review : <textarea name="review" required></textarea><br>
                            <input type="submit" value="Finish">
                        </form>
                        <h3>End rate</h3>
        <!-- TOMBOL ACCEPT ATAU REJECTTTTTTTTTTTTTTTT UNTUK USERRRRRRRRRRRRRRR -->
                        <?php }else{ ?>
                        <a href="<?=base_url("user/deal_post/".$row["user_post_id"]."/".$row["post_accepted_id"])?>" class="btn btn-default">Accept</a>
                        <a href="<?=base_url("user/user_reject_repairman/".$row["user_post_id"]."/".$row["post_accepted_id"])?>" class="btn btn-default">Reject</a>
                        <?php } ?>
                        comment:<br>
                        <ul stlye="border:1px solid black;">
                        <?php if(count($row["comment"])>0){?>
                        <?php foreach ($row["comment"] as $key2=>$row2){ ?>
                        <li>
                        comment time: <?=$row2["date"]?><br>
                        name: <a href="<?=base_url("user/profile_hybrid/".$row2["user_id"])?>"><?=$row2["fname"]?> <?=$row2["lname"]?></a><br>
                        comment: <?=$row2["comment"]?><br>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        Comment here:<br>
                        <form method="post" action="<?=base_url("user/comment_post_accepted/")?>">
                        <input type="hidden" name="post_accepted_id" value="<?=$row["post_accepted_id"]?>">
                            <textarea name="comment"></textarea>
                            <input type="submit">
                        </form>
                        </div>
                        </ul>
                        <?php } ?>
                    <?php } ?>
                    <h3>end of Repairman yang menerima order dari sang user akan nampak oleh author detail post ini.</h3>

                    <?php if($repairman){ ?>
                    <h3>Repairman 1 on 1 comment with user</h3>

                    <?php foreach ($i_accept_comment as $key2=>$row2){ ?>
                    <?php $post_accepted_id=$row2["post_accepted_id"]?>
                        <li>
                        comment time: <?=$row2["date"]?><br>
                        name: <a href="<?=base_url("user/profile_hybrid/".$row2["user_id"])?>"><?=$row2["fname"]?> <?=$row2["lname"]?></a><br>
                        comment: <?=$row2["comment"]?><br>
                        </li>
                    <?php } ?>  
                    <?php if(isset($post_accepted_id)){ ?>
                    <form method="post" action="<?=base_url("user/comment_post_accepted/")?>">
                    <input type="hidden" name="post_accepted_id" value="<?=$post_accepted_id?>">
                        <textarea name="comment"></textarea>
                        <input type="submit">
                    </form>
                    <?php } ?>
                    <h3>end Repairman 1 on 1 comment with user</h3>
                    <?php } ?>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->

            </div>
        </div>
    </section>
</section>

</body>
</html>

<script>
    function initMap() {
        var uluru = {lat: <?=$detail_post["user_lat"]??0?>, lng: <?=$detail_post["user_lng"]??0?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR2UoHvCPMicvAkJunYJtyoc-8imUuWkc&signed_in=true&libraries=places&callback=initMap"
        async defer></script>
<?php //vd("asd",$detail_post) ?><!-- -->
<?php //vd("accepted_repairman_list",$accepted_repairman_list)?>
<?php //vd("i_accept_comment",$i_accept_comment);?>