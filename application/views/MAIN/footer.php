<head>
    <link rel="stylesheet" href="<?base_url("asset/css/screen.css")?>" style="css">
</head>

<footer id="footer">
    <?php if(!isset($_COOKIE["sm_login"])){ ?>
        <h1>Server Medan</h1>
        <h3>Follow us</h3>
        <ul class="social-a">
            <li class="fb"><a rel="external" href="#">Facebook</a></li>
            <li class="tw"><a rel="external" href="#">Twitter</a></li>
            <li class="in"><a rel="external" href="#">Instagram</a></li>
        </ul>
        <ul class="download-a">
            <li class="as"><a rel="external" href="#">Download on the App Store</a></li>
        </ul>
        <p>&copy; <span class="date">2015</span> ReTouch App, LLC. All rights reserved. <a href="#">Privacy Policy</a> <a href="#">Terms of Service</a></p>
    
    <?php }else{ ?>
        <p>&copy; <span class="date">2015</span> ReTouch App, LLC. All rights reserved. <a href="#">Privacy Policy</a> <a href="#">Terms of Service</a></p>
    <?php } ?>
</footer>