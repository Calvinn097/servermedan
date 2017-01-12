
<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url("asset/css/main.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("asset/css/screen.css")?>">
    <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">
    <style>
        .forget{
            width: 350px;
            margin-top: 200px;
            background-color : lightblue;
            box-shadow : 3px 3px 5px 0px;
        }
    </style>
</head>

 <!-- margin untuk dorong ke bwh biar gk ketutup header gktw kenapa top saja -->
    <div class="container forget">
        <div class="panel-body">
            <p>Kehilangan password</p>
            <form action="<?=base_url("user/check_user_email")?>" method="post">
            <div class="row">
                <div class="col-md-2">
                    <label>Email:</label>
                </div>
                <div class="col-md-10">
                    <input type="email" name="email">
                    <input type="submit" value="Simpan">
                </div>
            </div>
        </form>
        </div>
        
    </div>