<?php
include 'conn.php';
$emal=$_GET['id'];
$sql="select * from users where email='$emal'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <style>
    h4{
        text-align:center;
    }
    .buttons a{
        margin-left: 20px;
        margin-right: 20px
    }
    .b1{background-color:#ea2020; border-color:#ea2020;border-radius:5px;}
    .container{
    width: 100%;
    padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    flex-direction: row;
}
    </style>
    
</head>
    <body class="bg">
        <?php
        include 'navbar.php';
        ?>
    <div class="container">
        <div class="card bg-light mb-3" style="width: 35rem;margin-top:25px">
            <div class="card-header"><h4>Customer Profile</h4> </div>
                <div class="card-body" >
                    <div class="content">
                        
                        <p><b>Name :</b>  <?php echo $row['name'];?></p>
                        <p><b>Account No :</b> <?php echo $row['accno'];  ?></p>
                        <p><b>Mobile No. :</b> <?php echo $row['contact'];  ?></p>
                        <p><b>Email : </b> <?php echo $row['email'];  ?></p>
                        <p><b>Current Balance :</b> <?php echo $row['current_balance'];  ?></p>
                        
                    </div>
            
                    <div class="buttons"style="margin-top:130px;">
                        <a href="#" class="btn btn-dark btn-md" style="background-color:#ec2121;" onclick="history.back()">Back</a>
                        <a href="transaction.php?id=<?php echo $row['name'];?>" class="btn btn-primary btn-md">Transactions</a>
                        <a href="transfer.php?id=<?php echo $row['email'];?>" class="btn btn-success btn-md">Transfer Money</a>
                    </div>

                </div>
        </div>
</div>
        <?php
        include 'footer.php';
        ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
    </body>
  
</html>