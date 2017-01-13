
<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
            "css"=>array(
                "asset/css/screen.css",
                "asset/css/main.css"
                )
        );
     $this->load->view("MAIN/header.php",$header_data) 
?>

<head>
    <style>
        .profile{
            margin-top : 20px;   
        }
        .profile img{
            margin-bottom: 20px;   
        }
        .profile .col-md-1{
            text-align : right;
            padding : 0px;
        }
        .profile .back{
            width : 50%;
            border-radius : 10px;
            background-color : white;
            padding : 10px;
            margin-bottom: 20px;
            box-shadow : 3px 2px 5px 0px;
        }
        .profile .back a{
            margin-left : 85%;
        }
    </style>

</head>

<?php if(count($user)==0){ ?>
Not found
<?php }else{ ?>
<?php
    $this->load->view("Main/side.php");
?>
<section class="main-content-wrapper">
    <div class="container profile">
        <img src="<?=base_url($user['user_image'])?>" width="400" height="300">
        <div class="back">
            <div class="row">
                <div class="col-md-3 col-sm-1">
                    First Name
                </div>
                <div class="col-md-1 col-sm-1">
                    :
                </div>
                <div class="col-md-3 col-sm-1">
                <?=$user["fname"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                Last Name
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["lname"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                Email
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["email"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                Gender
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["gender"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                Phone Number
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["phone_number"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                State
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["state"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                Address
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["address"]?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                Postal
                </div>
                <div class="col-md-1">
                    :
                </div>
                <div class="col-md-3">
                <?=$user["postal"]?>
                </div>
            </div>
            <?php if($user["user_id"]==$my_user_id && ($is_repairman==0)){ ?>
                <a class="btn btn-info" href="<?=base_url("user/edit_profile_form")?>">Edit</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
</section>