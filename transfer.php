<?php
include 'conn.php';
$emal=$_GET['id'];
$sql="SELECT * FROM users WHERE email='$emal'";
$result=mysqli_query($conn,$sql);

// FUNCTION FOR RECEIVER
function Calculation_1($conn,$sq,$bal)
{
    $result=mysqli_query($conn,$sq);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $em=$row['email'];
        $bal=$row['current_balance']+$bal;
        $sql="UPDATE users SET current_balance='$bal' WHERE email='$em'";
        mysqli_query($conn,$sql);
    }
}

// FUNCTION FOR SENDER
function Calculation_2($conn,$sq,$bal,$r_name,$r_email)
{
    $result=mysqli_query($conn,$sq);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $amount=$bal;
        $bal=$row['current_balance']-$bal;
        $em=$row['email'];
        $s_name=$row['name'];

        $sql="UPDATE users SET current_balance='$bal' WHERE email='$em' ";
        mysqli_query($conn,$sql);

        $sql_new = "INSERT INTO transfers (srno,sender,receiver,r_email,amount,date_time)VALUES (null,'$s_name','$r_name','$r_email', '$amount',null)";
                    
    mysqli_query($conn,$sql_new);

    }
}
$log=false;
$vne=false;
$vna=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["amount"]))){
        $bal_err = "Please enter Amount";
        $log=true;
    } 
    else
    {
        $bal = trim($_POST["amount"]);
        if($bal<0)
        {
          $vna=true;
        }
        
    }
    if(empty(trim($_POST['email']))){

        $ne_err = "Please Enter e-mail";
        $vne=true;
    }

    if(empty($bal_err) && empty($ne_err) && !$vna)
    {
    $name=$_POST['cname'];
    $amount=$_POST['amount'];
    $email=$_POST['email'];

    $sql_2="SELECT current_balance,email,name FROM users WHERE email='$emal'";
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_2));

    if($amount<$row['current_balance']){
    Calculation_2($conn,$sql_2,$amount,$name,$email);

    $sql_1="SELECT current_balance,email,name FROM users WHERE email='$email'";
    Calculation_1($conn,$sql_1,$amount);
    echo '<script>confirm("Money Transfer Sucessfully!!")</script>';
    echo '<script>window.location.href="allHistory.php"</script>';
    }
    else{
      echo '<script>alert("Insufficient Balance ")</script>';
      
    }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <style>
    .c1 {
    margin-top:25px;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-around;
    align-content: center;
}
    h3{
        text-align:center;
    }
    .buttons a{
        margin-left: 20px;
        
    }
    .b1{background-color:#ea2020; border-color:#ea2020;border-radius:5px;}
    </style>
    
</head>
    <body class="bg">
        <header>
            <?php
                include 'navbar.php';
            ?>
        </header>
        
    
    <div class="c1">
        <div class="card bg-light mb-3" style="width:30rem;height:32rem;">
            <div class="card-header"><h3>Transaction</h3> </div>
                <div class="card-body" >
                    <form method="post">

                    <div class="form-group">
                    <label style="font-size:1.3rem"for="fname"><i class="fa fa-user"></i> Transfer To</label>
                       <select class="form-select" id="option_id" name="cname" onChange="update()" aria-label="Default select example" >
                        <option selected><strong>------SELECT--------</strong></option>
                        <?php
                      //Fetch data from datbase
                        $sql1="SELECT * FROM users WHERE NOT email='$emal'";
                        $result1=mysqli_query($conn,$sql1);
                        
                        if($result1->num_rows>0){
                        while($row=$result1->fetch_assoc()){
                            echo '<option  value="'.$row['name'].'" name="'.$row['email'].'">'.$row['name'].'</option>';
                        
                        }
                    }
                    ?>
                       </select><br>
                       <label for="emails"><i class="fa fa-envelope"></i> Email</label>
                        <input  class="form-control" list="emails" name="email" id="email">
                        <datalist id="emails">
                            <option id="set_value">
                        </datalist><br><br>

                       <label style="font-size:1.3rem" for="amount" ><i class="fas fa-rupee-sign"></i>Amount</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₹</span>
                            </div>
                                <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="buttons" style="margin-top:5rem">
                            <button type="submit" class="btn btn-success btn-lg"  >Send</button>
                            <button type="button" class="btn btn-danger btn-lg" style="margin-left:30px;" onclick="history.back()">Cancel</button>
                            <button type="reset" class="btn btn-info btn-lg " style="margin-left:30px;" >Reset</button>
                        </div>
                        </form>
                    </div>
            </div>
    </div>
    <?php
        include 'footer.php';
        ?>

    <script>
                function update() {
				  var select = document.getElementById('option_id');
				  var option = select.options[select.selectedIndex];
                let email_value=option.getAttribute('name');
                console.log(email_value)
                document.getElementById('set_value').value=email_value;
			    }
                
    </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
  
</html>