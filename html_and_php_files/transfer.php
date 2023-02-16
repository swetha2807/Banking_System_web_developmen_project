<?php

$servername="localhost";
$username="root";
$password="root";
$database="customer";

$connection= new mysqli($servername,$username,$password,$database);



$Account_no ="";
$Balance="";
$amount="";

$errormsg="";
$successmsg="";

if(count($_POST)>0){

    $Account_no= $_POST['Account_no'];
    $amount= $_POST['amount'];

    $sql="SELECT * FROM customer_data WHERE Account_no=$Account_no;";

    $result=connection->query($sql);
    $row=$result->fetch_assoc();

    $Balance=row['Balance'];
do{
    $Balance=$Balance+$amount;
    $sql="UPDATE customer_data SET Balance=$Balance WHERE Account_no=$Account_no;";
    $result=connection->query($sql);

    if(!$result){
        $errormsg="Invalid Query:".$connection->error;
        
    }

    $successmsg="Successful transfer";

}while(false);
    


}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Montserrat&family=Raleway:wght@100&family=Roboto:wght@300&family=Sacramento&family=Source+Sans+3:wght@300;400&display=swap');
        body{
        
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            text-decoration: none;
        }
        
        nav{
            background-color:cornflowerblue;
            height:45px;
            width:100%;
            padding:0;
            display:inline-block;
            margin-bottom: 0!important;
        }
        
        .logo{
            height:45px; width:45px; line-height: 45px;
        
        }
        
        .lab{
            font-size: 20px;
            line-height: 45px;
            margin-left: 5px;
            margin-top: 0px;
            margin-bottom: 20px;
            padding: 5 5 25 25;
            text-transform: uppercase;
            position:absolute;
            color:white;
        
        }
        
        nav ul{
            float:right;
            margin-right: 15px;
            margin-top: 0px;
            padding-left:50px;
            line-height:45px;
        
        }
        
        nav ul li{
            display:inline-block;
            padding-left: 25px;
        }
        
        nav ul li a{
            color:white;
            text-transform: uppercase;
            font-size: 15px;
            text-decoration: none;
        
        }
        
        nav ul li a:hover{
            color:black;
            transition: .5s;
            text-decoration:none;
        }
        
        .sec{
            height:100vh;
        }
        .topic{
              font-size: 80px;
              color:cornflowerblue;
              filter: brightness(100%);
              text-align: center;
              font-weight: 500;
              padding:0px 60px 0px 60px;
              font-family: 'Raleway', sans-serif;
              margin-bottom: 12px;
            }
            .desc {
                font-size: 25px;
                float:center;
                text-align: center;
                padding-top: 5px;
                color: cornflowerblue;
        
            }
            .center a{
                text-decoration: none;
        
            }
        
            button{
                position: relative;
                border:none;
                height: 50px;
                width: 150px;
                border-radius: 5px;
                transition: .4s ease-in;
                font-family:'Raleway';
                font-size:15px;
                margin:auto;
                font-weight: 600;
                z-index:1;
                display:block;
                background-color: cornflowerblue;
                color: white;
            }
        
            button:hover
            {
                color:black;
            }
        
        </style>


</head>



<body>
    

    <nav>
        <img class="logo" src="spark.png">
        <label class="lab">SPARKS FOUNDATION</label>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="index.php">Customers</a></li>
            
            
        </ul>
       </nav>
    
    <div class="container my-5">
        <h2>Transfering money</h2>
        
        <?php
        if(!empty($errormsg))
        {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errormsg</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>






        <form action="post">
            <input type="hidden" name="Account_no" value="<?php echo $Account_no; ?>">
            <input type="hidden" name="Balance" value="<?php echo $Balance; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Account No</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Account_no" value=$Account_no>

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Amount</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="amount" value="">

                </div>
            </div>
            <br>
            <br>

            <?php
        if(!empty($successmsg))
        {
            echo"
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successmsg</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" value="submit">Tranfer</button>
            </div>
            <div class="col-sm-2 d-grid">
                <a  class="btn btn-outline-primary" href="/customer/index.php" role="button">Cancel</a>
            </div>
        </div>

        </form>

    </div>


    <script src=”https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js” integrity=”sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo” crossorigin=”anonymous”></script>

<script src=”https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js” integrity=”sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/” crossorigin=”anonymous”></script>


</body>
</html>