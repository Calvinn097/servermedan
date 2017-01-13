
<style></style>
<?php
    $header_data = array(
            "title"=>"Welcome to Servermedan",
        );
     $this->load->view("MAIN/side.php",$header_data) 

?>
<section class="main-content-wrapper">
    <div class="pageheader">
        <h1 class="inline">Ranking</h1>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Phone Number</th>
                <th>State</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Skill</th>
                <th>Score</th>
                <th>Point</th>
            </tr>
            
        </thead>
        <tbody>
            
            <?php $i=1?>
            <?php foreach($rank as $key=>$row){?>
            <tr>
                <td><?php echo $i?></td>
                <td><?=$row["fname"]?></td>
                <td><?=$row["phone_number"]?></td>
                <td><?=$row["state"]?></td>
                <td><?=$row["address"]?></td>
                <td><?=$row["gender"]?></td>
                <td><?=$row["keahlian"]?></td>
                <td><?=$row["score"]?></td>
                <td><?=$row["point"]?></td>
            </tr>
            <?php $i++?>
            <?php }?>
        </tbody>
    </table>
         
</section>
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

