
<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url("asset/css/main.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("asset/css/screen.css")?>">
    <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">
    <style>
        .forget{
            width: 350px;
            height : 400px;
            margin-top: 100px;
            background-color : lightblue;
            box-shadow : 3px 3px 5px 0px;
            border-radius : 10px;
            text-align : center;
        }
        .forget p{
            margin : 30px auto;   
        }
        .forget input [type:email]{
            width: 100%;   
        }
        .forget img{
            margin-top:30px;   
        }
    </style>
</head>

 <!-- margin untuk dorong ke bwh biar gk ketutup header gktw kenapa top saja -->
<div class="container forget">
    <img src="<?=base_url("asset/images/laptop.jpg")?>" width="100" height="100">
    <p>
        Silahkan masukkan email anda untuk melakukan verifikasi diri
    </p>
    <form action="<?=base_url("user/check_user_email")?>" method="post">
        <div class="row">
            <div class="col-md-3">
                <label>Email:</label>
            </div>
            <div class="col-md-9">
                <input type="email" name="email">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
</div>