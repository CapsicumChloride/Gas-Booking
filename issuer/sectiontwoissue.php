<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section Two Issue : Drona Gas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../files/boot.css">
     <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style/mobcss.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    
    <div class="container">
    
        <div class="row justify-content-center">
                    <div style="width:100%; margin-top:20px;">
                    <div style="width:50%; float:left"><a href="reports.php"><button class="btn btn-transfer" style="float:left; margin-left:10%;">Close</button></a></div>
                    <div style="width:50%; float:left"><button class="btn btn-reset" style="float:right; margin-right:10%;" onclick="window.print()">Print</button></div>
                    </div>
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <center><h4>GAS ISSUED TO SECTION TWO BETWEEN DATES</h4></center>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Click to Filter</label><br>
                                      <button type="submit" class="btn btn-primary">Get Details</button>
                                     
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                
                                <tr>
                                    <th>Ser</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Date</th>
                                    <th>Quantity</th>
                                    
                                </tr>
                               
                            </thead>
                                                        
                            <tbody>
                            
                            <?php 
                                include("../dbcon.php");
                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT * FROM sectiontwo WHERE issuedate BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);
                                    $i=1;
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['rank']; ?></td>
                                                <td><?= $row['issuedate']; ?></td>
                                                <td><?= $row['quantity']; ?></td>
                                                
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                            <tbody>
                            <?php
                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                            $from_date = $_GET['from_date'];
                            $to_date = $_GET['to_date'];
                               $sql_qry = "SELECT SUM(quantity) AS count FROM sectiontwo WHERE issuedate BETWEEN '$from_date' AND '$to_date'";

                            $duration = $con->query($sql_qry);
                            $record = $duration->fetch_array();
                            $total = $record['count'];
                           
                            }
                            else{
                                $total='Nor Records Found';
                            }
                            ?>
                                <td><strong>Total</strong></td>
                                <td><strong><?php echo $total;?></strong></td>
                           
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>