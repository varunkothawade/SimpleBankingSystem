<?php
include 'conn.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

  <body class="bg">
      <?php
        include 'navbar.php';
      ?>
    <div class="container" style="color:white;text-align:center;width:78%;margin-top:25px;background-color:black;padding:10px;border-radius:7px"><h2>List Of Customers</h2></div>
      <div class="container" style="width: 80%; margin-top:20px; ">
            <table class="table table-bordered table-light border-0 table-hover" style="padding: 10px 10px 10px 10px;text-align: center;height:400px;overflow:scroll;">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Account Holder Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Current Balance (INR)</th>
                      <th scope="col">Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      <?php
                      //Fetch data from datbase
                      if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                          ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['current_balance']; ?></td>
                            <td>
                              <a class="btn btn-info" href="details.php?id=<?php echo $row['email'];?>">View Details</a> 
                            </td>
                            
                          </tr>
                            <?php
                        }
                      }
                      else{
                        ?>
                        <tr>
                          <th colspan="5">There's No Data found!!!</th>
                        </tr>
                        <?php
                      }
                      ?>
                  </tbody>
            </table>
      </div>
      <?php
        include 'footer.php';
        ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>

</html>