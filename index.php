<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home: SPARKS BANK</title>
    <link rel="icon" type="image/x-icon" href="icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .col img{
            width:600px;
            height: 350px;
            border-radius:8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
           
        }

        h1{
            color:white;
            font-size:50px;
            margin-left:50px;
            
}
        }
        
    </style>
</head>
<body class="bg">
    <?php
        include 'navbar.php';
    ?>
     <div class="container-fluid">
        <section >
            <div class="row">
            <div class="col" id="welcome" >
                <h1 ><strong><br><br>Welcome <br><br>&nbsp;&nbsp;&nbsp;To<br><br>SPARKS BANK!</strong></h1>
            </div>
            <div class="col">
                <img src="bank-office.jpg" alt="img" >
            </div>
            </div>
        </section>
        
    <?php
        include 'footer.php';
        ?>
     </div>   
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
    </body>
    
</html>