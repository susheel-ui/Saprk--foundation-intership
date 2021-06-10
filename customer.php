<?php
  include_once 'connectDB.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
    <style>
      table{
      border-collapse :collapse;
      }

    </style>
</head>
<body>
   <div id="header">
         <h1>
             Future Bank
         </h1>
   </div>
   <div id = "navbar">
       <a href="index.html">Home</a>
       <a href="historypage.php">Transaction History</a>
       <a href="#">Aboute</a>

   </div>
   
   <div id= "container">
   <table id = "table" border = '', align='center' cellpadding ='5px'   >
   <tr>
                  <th>SNo.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Balance</th>
                  <th>Transfer Money</th>
                 
                  
                </tr>

     <?php
       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }
        else{
             $sql = "SELECT * FROM `bank_table`";
             $result = mysqli_query($conn,$sql);
             $resultcheck = mysqli_num_rows($result);
              
             if ($resultcheck >0){
                

               while($row = mysqli_fetch_assoc($result)){
              
               
                echo"<tr>";
                echo"<td>".$row['Sno.']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td >".$row['Balance']."</td>";
                echo "<td><a class='text-white' href='transfer.php?Id=".$row['Sno.']." '><button class='button1'>Transfer Credit</button></a></td>";
               echo"</tr>";
                }
               }
             }
        ?>
    </table>


   </div>
   <footer>
       @all copyright of yhis website is to Future bank 
   </footer>
</body>
</html>