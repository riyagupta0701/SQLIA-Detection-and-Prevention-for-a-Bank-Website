<?php 
     session_start();
     if (isset($_SESSION['id']) && isset($_SESSION['cust_id'])) {
          ?>
          <!DOCTYPE html>
          <html>
          <head>
               <title>HOME</title>
               <link rel="stylesheet" type="text/css" href="style.css">
          </head>
          <body>
               <h1>R2S2 Bank welcomes you back, <?php echo $_SESSION['name']; ?></h1>
               <div class="buttons">
                    <a href="">View Account Details</a>
                    <a href="">View Transactions</a>
                    <a href="">View Financial Statements</a>
               </div>
               <br>
               <div class="buttons">
                    <a href="">Transfer Money</a>
                    <a href="">Set up Beneficiary</a>
               </div>
               <br>
               <div class="logout">
                    <a href="logout.php">Logout</a>
               </div>
          </body>
          </html>
          <?php 
     }else{
          header("Location: index.php");
          exit();
     }
?>