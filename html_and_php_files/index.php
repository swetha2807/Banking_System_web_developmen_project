<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>

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
            <h2>CUSTOMER DETAILS</h2>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Account No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername="localhost";
                    $username="root";
                    $password="root";
                    $database="customer";

                    //create connection
                    $connection=new mysqli($servername,$username,$password,$database);

                    //check connection
                    if($connection->connect_error){
                        die("Connection failed:" . $connection->connect_error);
                    }

                    //read all row from database
                    $sql="SELECT * FROM customer_data;";
                    $result=$connection->query($sql);

                    if(!$result){
                        die("Invalid query:" . $connection->connect_error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                            <td>$row[Account_no]</td>
                            <td>$row[Name]</td>
                            <td>$row[email]</td>
                            <td>$row[Balance]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/customer/transfer.php?Account_no=$row[Account_no]&Balance=$row[Balance]'>Transfer</a>
                            </td>
                        </tr>
                        ";
                    }


                    ?>
                </tbody>

            </table>

       </div>


</body>
</html>