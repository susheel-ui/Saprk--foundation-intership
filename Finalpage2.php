<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
</head>
  <body>
          <div id="header">
              <h1>
                Future Bank
              </h1>
          </div>
          <div id = "navbar">
              <a href="Index.html">Home</a>
              <a href="historypage.php">Transaction History</a>
              <a href="#">Aboute</a>

          </div>
          <div id= "containerhome">
     
              <?php
                  $Sno = $_GET['Id']; 
                  $person1 = $_POST['person2'];
                  $Amount = $_POST['amount'];
                  include_once 'connectDB.php';
                  $query_for_name = "SELECT * FROM `bank_table` WHERE `Sno.`=".$Sno;
                  $result = mysqli_query($conn,$query_for_name);
                  $sname = mysqli_query($conn,$query_for_name);
                  while($row =  mysqli_fetch_assoc($result)){
                      $current_balance = $row['Balance'];

                  }
                  if ($Amount>$current_balance || $Amount<=0){
                    echo "<center><h1 id =\"INF\">Insufficient Balance.</h1></center> " . $conn->error;

                }
                else{
                    while($row =  mysqli_fetch_assoc($sname)){
                  $nameSender = $row['Name'];
                  }
                  
              

                  $query_for_name = "SELECT * FROM `bank_table` WHERE `Sno.`=".$person1;
                  $result2 = mysqli_query($conn,$query_for_name);
                    while($row =  mysqli_fetch_assoc($result2)){
                        $namereciver = $row['Name'];
                        }

                  $sql = "INSERT INTO `transaction_history` (`Sno_Sender`,`from_customer`, `to_customer`, `amount`) VALUES ('".$Sno."','".$nameSender."','" .$namereciver."','".$Amount."');";
                      if (mysqli_query($conn, $sql)) {
  // echo "New record created successfully";
                              } 
                      else {
                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                      // $conn->close();
                  ?>
<?php
   if(isset($_POST['Submit']))
   {
      $person1=(int)$_GET['Id'];
      $person2=(int)$_POST['person2'];
      $amount=(int)$_POST['amount'];
    $sql = "UPDATE `bank_table` SET `Balance` = `Balance` +".$amount." WHERE `Sno.` = ".$person2;
    $sql1 = "UPDATE `bank_table` SET `Balance` = `Balance` -".$amount." WHERE `Sno.` = ".$person1;
    if ((mysqli_query($conn,$sql) === TRUE)&&(mysqli_query($conn,$sql1) === TRUE)) {
      echo  "<center><h1 id =\"Succ\">Successful Transfer money<h1><centerr>";
    } 
    else {
      echo "Error updating record: " . $conn->error;
    }

    $conn->close();
   }
}

  

  
?>
<center><a href="customer.php" id = "BackButton"><button>back</button></a></center>
</div>
   <footer>
       @all copyright of yhis website is to Future bank 
   </footer>
</body>
</html>