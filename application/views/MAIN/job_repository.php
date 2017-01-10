<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=base_url("/asset/bootstrap/3.3.7/css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url("/asset/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Animate CSS by Daniel Eden-->
    <link href="<?=base_url("asset/plugin/bootstrap-notify-3.1.3/animate.css");?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url("/asset/javascript/jquery-1.12.4.min.js")?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url("asset/bootstrap/3.3.7/js/bootstrap.min.js")?>"></script>
</head>
<body>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>Progress</h3>
    <table>
    </table>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>History</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Open</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>

</body>
</html>