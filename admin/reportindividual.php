<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/mobcss.css">

    <title>Individual Report</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
</head>
<body>
<?php include "protect.php"?>;
                    <?php
                   
                    
                    if(isset($_SESSION['success']))
                    {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success Message</strong> <?php echo $_SESSION['success'] ?>
                    <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['error']))
                    {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error Message</strong> <?php echo $_SESSION['error'] ?>
                    <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
                    </div>
                    <?php
                    unset($_SESSION['error']);
                    }
                    ?>


<div style="width:100%; margin-top:20px;">
<div class="text-center"><button class="btn btn-reset" onclick="window.print()">Print</button></div>
<br>
</div>

<div class="text-center">
<?php
                    $id=$_GET['id'];
                    include("../dbcon.php");
                    $sql="select * from booking where username='$id'";
                    $x=mysqli_query($con,$sql);
                    $r=mysqli_fetch_assoc($x);
                    $username=$r['username'];
                    $name=$r['name'];
                    ?>
                    <h2>Report for <?php echo $username ?> <?php echo $name ?></h2>
</div>



 <div class="card mt-4">
                    <div class="card-body">

                                

                        <table class="table table-borderd">
                            <thead>
                            <tr><th>Serial</th><th>Booking ID</th><th>Booking Date</th><th>Status</th><th>Delivery Date</th><th>Amount</th><th>Payment</th></tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                include "../dbcon.php";
                                    $id=$_GET['id'];
                                    $query = "SELECT * FROM booking WHERE username='$id'";
                                    $query_run = mysqli_query($con, $query, );
                                    $i=1;
                                    

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                           
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['bookingdate']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td><?= $row['deliverdate']; ?></td>
                                                <td><?= $row['amount']; ?></td>
                                                <td><?= $row['paystatus']; ?></td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                
                            ?>
                            </tbody>
                            <tbody>
                            <td><strong>Total</strong></td>
                            <?php
                                
                                $sql_qry = "SELECT SUM(quantity) AS count FROM booking WHERE username='$id' ";
                                $duration = $con->query($sql_qry);
                                $record = $duration->fetch_array();
                                $total = $record['count'];
                                
                                ?>
                                <td><strong><?php echo $total;?></strong></td>
                            </tbody>
                        </table>
                    </div>

                </div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>
