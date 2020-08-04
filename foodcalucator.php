<?php include_once "header.php";
include_once "dbConnection.php";
include_once "classes/breeds.php" ?>
<style type="text/css">
.cid-s5L8Qfeb7X{
    background-image: url("../../../assets/images/background1.jpg");
}
</style>
<section class="tabs2 cid-s5L8Qfeb7X" id="tabs2-9" style="margin-top:50px ;">
    <div  class="container" >
        <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">Feed it how you would do it to your kid</h2>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <div class="mbr-section-btn align-center"><a class="btn btn-md btn-black-outline display-4" href="">Get Started</a></div>

    </div>
</section>
<section>
<?php
//Calling the funtion to list out the breeds in the drop down
//Connetion to db
$db = Database::getDb();
$b = new Breed();
$breeds =  $b->getAllBreeds(Database::getDb());
// define variables and set to empty values
$nameErr = $yearAgeErr =$monthAgeErr= $typeErr =  "";
$name = $yearAge = $pettype = $monthAge = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["yearAge"])) {
    $yearAgeErr = "number of years are required";
  } else {
    $yearAgeErr = test_input($_POST["yearAge"]);
    // check if age is only having numbers
    if (!preg_match("/[0-9]+/",$yearAge)) {
        $yearAgeErr = "Only numbers are allowed";
      }
    }
    if (empty($_POST["monthAge"])) {
        $monthAgeErr = "number of months are required";
      } else {
        $monthAgeErr = test_input($_POST["monthAge"]);
        // check if age is only having numbers
        if (!preg_match("/[0-9]+/",$monthAge)) {
            $monthAgeErr = "Only numbers are allowed";
          }
        }

    
  


  if (empty($_POST["pettype"])) {
    $typeErr = "pet type is required";
  } else {
    $pettype = test_input($_POST["pettype"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>We know that you love talking about your fur baby</h2>
<p><span class="error">* mandatory field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name of your Fur Baby: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Your fur baby is:
  <input type="radio" name="pettype" <?php if (isset($pettype) && $pettype=="dog") echo "checked";?> value="dog">Dog
  <input type="radio" name="pettype" <?php if (isset($pettype) && $pettype=="cat") echo "checked";?> value="cat">Cat
  <input type="radio" name="pettype" <?php if (isset($pettype) && $pettype=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $typeErr;?></span>
  <br><br>
  <label for="breed">Breed :</label>    
            <select class="dropdown-toggle" name="breed"> 
                <option value='' selected>--Select Breed--</option>
                  <?php
                    foreach ($breeds as $breed) {                         
                  ?>
                <option value="<?= $breed->id; ?>"> <?= htmlspecialchars($breed->breed);?></option>
                <?php } ?>
            </select>
  <h4>How old is your fur baby</h4>
  <input type="text" name="yearAge" value="<?php echo $name;?>">Year(s)
  <span class="error">* <?php echo $yearAgeErr;?></span>
  <input type="text" name="monthAge" value="<?php echo $name;?>">month(s)
  <span class="error">* <?php echo $monthAgeErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>
</section>

<?php include_once "footer.php" ?>