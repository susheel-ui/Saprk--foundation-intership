
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="style.css">
	<style>
	
	</style>
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
   <div>
       <div id="From_word">
              <h2 >From</h2>
       </div>
    
   	<table border="1" align="center" id ="table2" >
		<tr>
			<th>Sno.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Balance</th>
			
		</tr>
	
   <?php
  include_once 'connectDB.php';
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
   
	 ?>
	 
	 <?php
	      $kk = $_GET['Id'];
		  $sql = "SELECT * FROM `bank_table` WHERE `Sno.` = ".$kk;
           $result = mysqli_query($conn,$sql);
             $resultcheck = mysqli_num_rows($result);
              
             if ($resultcheck >0){
                

               while($row = mysqli_fetch_assoc($result)){
                // echo  " ".." " . " ".$row['Balance']. "<br>";
               
                echo"<tr>";
                echo"<td>".$row['Sno.']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td >".$row['Balance']."</td>";
                
				
		  }
		  }
        //   $quer= "SELECT `Balance` FROM `bank_table` WHERE  `Sno.`= ".$kk;
        //   $curant_balance = mysqli_query($conn,$quer);
        
	 ?>
	
	 
	 
</table>
</div>

 <div id= "content2">
 <center>
            <div>
             <h2> Transfer to </h2>
             </div>
<!-- <table align="center" id =""> -->

             <div>
	        <form action ="Finalpage2.php?Id=<?php echo $kk;?>" method ="POST">
           <select class = "person2"  name ="person2" required >
               
			<option value="" id = "Select_option">Select user</option>
            
             
             
             <?php
            include_once 'connectDB.php';
             $kk = $_GET['Id'];
                    $sql1 = "SELECT * FROM `bank_table` WHERE `Sno.`!=".$kk;

                    $res = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_assoc($res)){

                    
                    ?>
                
                <option value="<?php echo $row['Sno.'];?>"><?php echo $row['Name'];?></option>
  
                <?php
                    }
                ?>
           
            </select>
            </div>
        <div>
           <h2>Amount :</h2>
        </div>
        <div>
           <input type="Amount" class ="person2" name = "amount"  id ="myInput" placeholder = "    Amount" required>
        </div>
        <div>
           <input type="submit" id ="Send_button" name="Submit" value ="Send" >
        </div> 

			</form>
	 
	  <!-- </table> -->
        </div>
</div>      
</div>
     
   <footer>
       @all copyright of yhis website is to Future bank 
   </footer>
</body>
</html>
