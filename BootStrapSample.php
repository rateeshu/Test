<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$name = $email = $gender = $comment = $website = "";
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_POST);die;
    $email      = $_POST["email"];
    $contact    = $_POST["contact"];
    $address    = $_POST["address"];
    //$Gender    = $_POST["gender"];
    $website   = $_POST["website"];
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname = "rateeshdb";
    
       
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    //// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO form (CUSTOMERNAME,EMAIL,CONTACT,ADDRESS,WEBSITE)
  VALUES ('$name','$email', '$contact','$address','$website')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
    function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>

  <h2>Horizontal form</h2>
  <div class="container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
      <label class="control-label col-sm-2" for="name">CustomerName:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" id="name" placeholder="Enter CustomerName" name="name" required>
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="contact" placeholder="Enter Contact" name="contact" required>
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="website">Website Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="website" placeholder="Enter Website Name" name="website">
      </div>
    </div>
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
  </div>

</body>
</html>
