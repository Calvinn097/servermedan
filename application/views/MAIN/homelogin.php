<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/grayscale.css",
                "asset/css/nav.css",
                "asset/css/homelogin.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 

?>
<style>
    #map {
        height: 70%;
    }
    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    /*#gmap_input {*/
        /*background-color: #fff;*/
        /*font-family: Roboto;*/
        /*font-size: 15px;*/
        /*font-weight: 300;*/
        /*margin-left: 12px;*/
        /*padding: 0 11px 0 13px;*/
        /*text-overflow: ellipsis;*/
        /*width: 300px;*/
    /*}*/

    #gmap_input:focus {
        border-color: #4d90fe;
    }

    /*.pac-container {*/
        /*font-family: Roboto;*/
    /*}*/

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

</style>
<body data-spy="scroll" data-target="#side-menu" data-offset="20">
    <div id="wrapper">

        <!-- Navigation -->
        <?php
            $this->load->view("main/navprofile")
         ?>

        <div id="page-wrapper">
            <div class="row posting">
                <div class="col-lg-8">
                    <div class="button-bar">
                        <!--form postingan-->
                        <form id="post_order" method="post" enctype="multipart/form-data" role="form" action="<?=base_url("User/user_posting")?>">
                            <div class="form-group">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <!-- <input type="submit" class="btn btn-info" value="locate"> -->
                                        
                                    </li>
                                    <li>
                                        <input type="file" name="userfile">
                                    </li>
                                    <li>
                                        <select class="btn btn-info" name="service_type_id">
                                            <?php foreach($service_type as $key=>$row){ ?>
                                            <option value="<?=$row["service_type_id"]?>"><?=$row["service_type"]?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="category_id" class="btn btn-info" required>
                                        <option value="" disabled selected>Pilih kategori anda</option>
                                            <?php foreach($this->category_list as $row){ ?>
                                                <option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="sub_category_id" class="btn btn-info" required>
                                        
                                        </select>
                                    </li>
                                </ul>
                                
                                <textarea class="form-control" rows="5" name="content" id="posting"></textarea>
                                <!-- select location on map -->
                                <input type="hidden" name="user_lat" id="user_lat">
                                <input type="hidden" name="user_lng" id="user_lng">
                                <label for="post_title_input">Post Title:</label> <input id="post_title_input" type="text" name="post_title">
                                <div class="box-tools pull-right">
                                    <a type="button" class="btn btn-info" title="locate map" data-toggle="collapse" data-target="#locate_map">Pilih lokasi di peta</a>
                                </div>
                                <div id="locate_map" class="collapse">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="gmap_input" class="form-control controls" placeholder="Search your location and click at the map to get your lat and lng.">
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                    <label for="address">Alamat:</label>
                                    <input type="text" name="address" id="address">
                                </div>
                                <input class="btn btn-info" type="submit" value="Post" style="float:right;"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 customer">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Timeline
                            
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul>
                            <?php foreach($user_posting as $key=>$row){ ?>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?=hsc($row["post_title"])?></h4><!--post title--> status: <?=$row["progress"]?>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?=$row["date_posted"]?></small>
                                            </p>
                                            <p></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?=hsc($row["content"])?></p><!--postcontent-->
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-default" href="<?=base_url("user/detail_post/".$row["user_post_id"])?>">View Detail</a>
                                        Kategori: <?=$row["category_name"]?>, Tipe Jasa: <?=$row["service_type"]?><br>
                                        Sub Kategori: <?=isset($row["sub_category_name"])?$row["sub_category_name"]:""?><br>
                                        <?php if($row["image"]!=null){?>
                                        Photo:<img class="view_image" src="<?=base_url($row["image"])?>" height="100" width="150">
                                        <?php } ?>
                                        <!-- <b>Number of likes: <span class="<?=$row["user_post_id"]."_num_likes"?>" data-num_likes="<?=$row["like_count"]?>"><?=$row["like_count"]?></span></b> <button class="like" data-user_post_id="<?=$row["user_post_id"]?>"><?=$row["like_by_me"]?"Liked":"Like";?></button> -->
                                        <div class="panel">
                                        Comment:
                                        <ul>
                                            <?php foreach ($row["comment"] as $key => $value): ?>
                                                <li>
                                                <?php 
                                                    if($value["user_level"]>0){$linkprofile=base_url("user/profile_user_id/".$value["user_id"]);}
                                                    else{$linkprofile=base_url("user/profile/".$value["user_id"]);}
                                                    ?>

                                                    At <?=$value["date"]?>
                                                    <a href="<?=$linkprofile?>"><?=hsc($value["fname"])?></a> is
                                                <?= ($value["user_level"]==null)?"User":"Repairman"; ?> Says:"
                                                <?=hsc($value["comment"])?>"
                                                    
                                                </li>
                                                
                                            <?php endforeach ?>
                                        </ul>
                                        <form action="<?=base_url("user/user_comment")?>" method="post">
                                            <input type="hidden" name="user_post_id" value="<?=$row["user_post_id"]?>">
                                            <textarea name="comment"></textarea>
                                            <input type="submit" value="Submit comment"></input>
                                        </form>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                                <!-- <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan mobil</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Terjadi kerusakan luar biasa dibagian belakang mobil dikarenakan ditabrak oleh tank yang sedang lewat mohon agar segera diberikan feedback untuk perbaikkannya.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-panel">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Rusak baling-baling kipas</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 10 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Terjadi insiden yang cukup menegangkan mengakibatkan baling-baling kipas rusak berantakan kepada mekanik mohon agar dapat di cek serpihan yang dapat diperbaiki</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Darurat kerusakan tutup botol</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Kepada para mekanik mohon agar segera ditanggapi kerusakan tutup botol yang mengakibatkan botol tidak dapat tertutup dengan rapat.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan AC tidak dingin</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut adalah kronologi terjadinya kerusakan AC. Dikarenakan pemasukkan batu es kedalam kipas AC yang mengakibatkan terjadinya peledakan terhadap mesin AC tersebut mohon kepada mekanik agar dapat diperiksa</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan Lemari es</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut laporan kerusakan yang di alami oleh lemari es yaitu: lampu lemari es tidak dapat hidup, lemari es tidak dapat mengeluarkan angin, kipas lemari es tidak dapat berputar, pintu lemari es sulit ditutup, mesin lemari es tidak dapat ditemukan.</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Kerusakan sepeda motor</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 9 hours ago via Twitter</small>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Berikut laporan kerusakan yaitu: ban sepeda motor tidak dapat ditemukan, mesin sepeda motor tidak dapat dilihat, badan sepeda motor tidak memiliki fisik. Kepada mekanik bersangkutan mohon agar segera datang dan melihat kondisi sepeda motor</p>
                                            <div class="progresscust">
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if(count($user_notification)>0){ ?>
                            <?php foreach($user_notification as $key=>$row) { ?>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <?=$row["post_title"]?>
                                        <?=$row["notif_user"]?> by <?=$row["repairman_accepter_name"]?>
                                        <span class="pull-right text-muted small"><em><?=$row["date_accept"]?></em>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    No Notifications
                                </a>
                            </div>
                        <?php } ?>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <?php $this->load->view("MAIN/footer.php"); ?>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
<script>
$(".like").click(function(){
    var button = $(this);
    var user_post_id = $(this).data("user_post_id");
    $.ajax({
        url:"<?=base_url("user/user_post_like_action")?>",
        type:"post",
        dataType:"json",
        data:{
            user_post_id:user_post_id
        },
        success:function(res){
            if(res["like"]==true){
                button.html("Liked");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like++;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }else if(res["like"]==false){
                button.html("Like");
                $like_span = $("."+user_post_id+"_num_likes");
                $num_like = $like_span.data("num_likes");
                $num_like--;
                $like_span.data("num_likes",$num_like);
                $like_span.html($num_like);
            }
        }
    })
})
$("select[name='category_id']").change(function() {
  var cat_id = $(this).val();
  $.ajax({
      type:"POST",
      url:"<?=base_url('/Category/sub_category_list/')?>",
      dataType:"html",
      data:{
          category_id:cat_id
      },
      success:function(res){
          $("select[name='sub_category_id']").html("<option value='' disabled selected>Pilih sub-kategori anda</option>"+res);
      }
  });
});
$("document").ready(function(){
    initMap();
})
</script>

<!-- google map script -->
<script>
    function initMap() {
        var marker2;
        var geocoder = new google.maps.Geocoder();
        var map = new google.maps.Map(document.getElementById('map'));
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('gmap_input'));
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//        var options = {
//            types: ['(cities)'],
//            componentRestrictions: {country: "id"}
//        };
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setComponentRestrictions({country:"id"});
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed',autocomplete_function);
        google.maps.event.addListener(map, 'click', function( event ) {
            if (typeof marker2 != 'undefined') {
                marker2.setMap(null);
            }
            if (typeof marker != 'undefined') {
                marker.setMap(null);
            }
//            alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
            var myLatlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
            $("#user_lat").val(event.latLng.lat());
            $("#user_lng").val(event.latLng.lng());
            marker2 = new google.maps.Marker({
                position: myLatlng,
                map: map
            });
            marker2.setMap(map);
        });


        function autocomplete_function() {
            infowindow.close();
            marker.setVisible(true);
            var place = this.getPlace();

            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            $("#user_lat").val(place.geometry.location.lat());
            $("#user_lng").val(place.geometry.location.lng());
//            marker.setIcon(/** @type {google.maps.Icon} */({
//                url: place.icon,
//                size: new google.maps.Size(71, 71),
//                origin: new google.maps.Point(0, 0),
//                anchor: new google.maps.Point(17, 34),
//                scaledSize: new google.maps.Size(35, 35)
//            }));
            marker.setPosition(place.geometry.location);
        }
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7DAYC5xAZ2cARU_7olhRhRtVgcV3jeWc&signed_in=true&libraries=places&callback=initMap"
        async defer></script>
