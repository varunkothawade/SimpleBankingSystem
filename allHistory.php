<?php
include 'conn.php';

$sql = "SELECT * FROM transfers;";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction history</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
</head>

  <body class="bg">
      <?php
        include 'navbar.php';
      ?>
    <div class="container" style="width: 65%; margin-top:25px;">
            <table class="table table-bordered table-light border-0 table-hover">
                <thead>
                  <tr>
                    <div class=""></div><th colspan="6"> <h2 class="text-center">Transaction History</h2> </th>
                  </tr>
                    <tr>
                      <th scope="col">Sr.No.</th>
                      <th scope="col">Date</th>
                      <th scope="col">Sender</th>
                      <th scope="col">Receiver</th>
                      <th scope="col">Receiver Email</th>
                      <th scope="col">Amount(INR)</th>
        
                    </tr>
                  </thead>
                  <tbody>
                    
                      <?php
                      //Fetch data from datbase
                      if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                          ?>
                          <tr>
                            <td><?php echo $row['srno']; ?></td>
                            <td><?php echo $row['date_time']; ?></td>
                            <td><?php echo $row['sender']; ?></td>
                            <td><?php echo $row['receiver']; ?></td>
                            <td><?php echo $row['r_email']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                          </tr>
                            <?php
                        }
                      }
                      else{
                        ?>
                        <tr>
                          <th class="text-center" colspan="6">There's No Data found!!!</th>
                        </tr>
                        <?php
                      }
                      ?>
                  </tbody>
            </table> 
            <div class="btn" style="display:revert;">
              <a href="#" class="btn btn-dark btn-lg" style="background-color:#ec2121;" onclick="history.back()">Back</a>
            </div>      
      </div>

      <?php
        include 'footer.php';
        ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>

</html>