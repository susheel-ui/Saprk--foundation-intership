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
   <div id= "container">
    <?php
     include_once 'connectDB.php';
     $sql = "SELECT *FROM transaction_history ;";
     $result = mysqli_query($conn,$sql);
     $resultcheck = mysqli_num_rows($result);
     ?>

     
     <div id = "history_table" >
          <table border ="1" id ="table" align ="center" cellpadding="collaps">
              <tr>
                  <th>Sender Sno.</th>
                  <th>From customer </th>
                  <th>To customer </th>
                  <th>Amount</th>
                  <th>Date & Time</th>
              </tr>
              <?php
               if ($resultcheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                
              ?>
              <tr>
                  <td><?php echo $row['Sno_Sender'];?></td>
                  <td><?php echo $row['from_customer'];?></td>
                  <td><?php echo $row['to_customer'];?></td>
                  <td><?php echo $row['amount'];?></td>
                  <td><?php echo $row['Time'];?></td>
                  
              </tr>
              <?php
                }
            }

            
            ?>

              
              

          </table>
     </div>
</div>
   <footer>
       @all copyright of yhis website is to Future bank 
   </footer>
</body>
</html>