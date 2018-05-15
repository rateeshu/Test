<html>
<head>
</head>
<body>  

<?php
$name = $email = $gender = $comment = $website = "";
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_POST);die;
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = $_POST["name"];
      }  
    //$name       = $_POST["name"];
    $email      = $_POST["email"];
    $contact    = $_POST["contact"];
    $address    = $_POST["address"];
    $Gender    = $_POST["gender"];
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
    
    $sql = "INSERT INTO form (CUSTOMERNAME, CONTACT, EMAIL, ADDRESS, GENDER, WEBSITE)
  VALUES ('$name', '$contact', '$email', '$address', '$Gender', '$website')";
    
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
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Contact: <input type="number" name="contact">
  <br><br>
  Address: <textarea name="address" rows="5" cols="40"></textarea>
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
 Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $contact;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $gender;
echo "<br>";
echo $website;
?>

</body>
</html>