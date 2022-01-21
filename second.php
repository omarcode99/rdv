<?php 


if($_SERVER['REQUEST_METHOD']== "POST"){ 
    if(isset($_POST['home'])){
    
        header("location: index.php") ;
    }
    
}

$host = "localhost" ;
$user = "root" ;
$pass = "" ;
$db = "prise" ;
    
$conn = new mysqli($host, $user, $pass, $db);

// verification de connection .
if ($conn) {

  $cnx= "connected !" ;
}else{

    die("Connection failed " . $conn->connect_error);
} 

// Verifier les variable si ils sont vide 

if(isset($_POST["btn"])){

  // Nchofo wach kamlin 3amriin
  // if true, ghadi nchofo wach mktobin shah, 
  //if false, ghadi n9lbo 3la lkhata2
  if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['datee'])){
  
    //kamlin 3amriin
    
    // save variable, li ghadi nchofoho wach shah ola la !! 
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['datee']);

    //Check firtname input
    // ila kant shiha ! true = false
    //ila kant khat2a ! false= true    
    //Check variables
    $check_fname=true;
    $check_lname=true;
    $check_email=true;
    $check_array1=true;
    
    
   

    $array = array( $fname , $lname , $email , $date);
    
    foreach ($array as $i) {
      if (is_numeric($i)) {

         $checknum = "please repeat the first name and last name we don't consider the numbers" ;
          $fname = "" ;
          $lname = "" ;
          $email1 = $_POST['email'] ;
          $date1 = $_POST['datee'] ;
          $check_array1=false;
      }
    }
    

  /*

    foreach($array as $a){

      if (ctype_alnum($a)){

        $checknumalpha = "please repeat the first name and last name we don't consider the numbers and letter together" ;
        $fname = "" ; 
        $lname = "" ;   
        $email1 = $_POST['email'] ;
        $date1 = $_POST['datee'] ;
        $check_array2=false;

        


      } 




    }
    
   */


    // check if fname include a number


    // check if lname include a number

    

   

    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {

      // Print error
      $fnameError = "error in your first name ";
      // empty the input
      $fname = "";
      // sejel autre input
      $lname1 =  strip_tags($_POST['lname']);
      $email1 = strip_tags($_POST['email']);
      $date1 = strip_tags($_POST['datee']);
      
      $check_fname=false;

    }

    
    
    //Check lastname input
  
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {

      $lnameError = "error in your last name ";
      $lname= "";
      $fname1 = strip_tags($_POST['fname']);
      $email1 = strip_tags($_POST['email']);
      $date1 = strip_tags($_POST['datee']);
      $check_lname=false;
    }

   

    

    //Check email input
    if(!preg_match("/^[^@]+@[^@]+\.[a-z]{2,6}$/i",$email)){

      $emailError = "error in email" ;
      $email = "";
      $fname1 = strip_tags($_POST['fname']);
      $lname1 =  strip_tags($_POST['lname']);
      $date1 = strip_tags($_POST['datee']);
      $check_email=false;
    }

    
    if($check_email && $check_lname && $check_fname && $check_array1   ){

      //dekhelhom data base
      $sql = "INSERT INTO tab(userfname, userlname , useremail , userdate) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[datee]');";

      $text= " Hello <b> $fname  $lname  <br>    thank you for making your appointment in $date see you later. " ;

      $select = mysqli_query($conn, "SELECT * FROM tab WHERE userdate = '".$_POST['datee']."'");


   if(mysqli_num_rows($select)) {

      
    $delete="This date address is already used! please change the date";
      unset($sql) ;
      unset($text) ;
      $date = "";
      $fname = $_POST['fname'] ;
      $lname = $_POST['lname'] ;
      $email = $_POST['email'] ;
    }

      if(!empty($sql)){
      
        if ($conn->query($sql) === TRUE) {
  
          $true="New record created successfully";
          $text= " Hello <b> $fname  $lname  <br>    thank you for making your appointment in $date see you later. " ;
          $fname = "";
          $lname = "";
          $email = "";
          $date = "";
  
           
        } else {
           $false= "Error:  . $sql . <br> . $conn->error";
        }
      
        
      }
    }


    //verifier wach kolchi mktoob shiih
    // if true, dowz l data base
    //if not, printi lkhata2 !! 
  
  
  
  
  }else{

      //n9lbo 3la li khat2aa

      if (empty($_POST['fname'])) {


        $checkfname = "first Name is required";
        $fname1 = "";
        //enregistrer input diyal l user
        $lname1 = strip_tags($_POST['lname']);
        $email1 = strip_tags($_POST['email']);
        $date1 = strip_tags($_POST['datee']);
                  
      }
    
      if (empty($_POST['lname'])) {
    
    
        $checklname = "last Name is required";
        
        $lname1 = "";
        $fname1 = strip_tags($_POST['fname']);
        $email1 = strip_tags($_POST['email']);
        $date1 = strip_tags($_POST['datee']);
        
      }
    
      if (empty($_POST['email'])) {
    
    
        $checkemail = "email is required";
        
        $email1 = "";
        $fname1 = strip_tags($_POST['fname']);
        $lname1 = strip_tags($_POST['lname']);
        $date1 = strip_tags($_POST['datee']);
        
      }
    
      if (empty($_POST['datee'])) {
    
    
        $checkdate = "date is required";
        
        $date1 = "";
        $fname1 = strip_tags($_POST['fname']);
        $lname1 = strip_tags($_POST['lname']);
        $email1 = strip_tags($_POST['email']);
        
      }
      
  }

/*


  function checknumberincluding($name){

  
    $nameToarray= str_split($name);
    for($i=0; $i<count($nameToarray);$i++){


      echo $nameToarray[$i] ;
      echo "<br>";
    }


    return $boolVariable;

  }


*/










  

}





    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>

body {
    background-image: url('https://www.france-assos-sante.org/wp-content/uploads/2018/10/Rdv-en-ligne-768x576.jpg') ;
    background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  align-items: center;
  background-color: #000;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 700px;
  padding: 20px;
  width: 320px;
  box-shadow: 5px 10px 8px #888888;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}
.ic3 {
  margin-top: -50px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}
.input1 {
    background-color: #303245;
  border-radius: 12px;
  height: 50px;
  border: 10px;
  border-top : 50px ;
  box-sizing: border-box;
  color: #eee;
  font-size: 25px;
  height: 100%;
  outline: 0;
  padding: 20px 20px 0;
  width: 100%;
  position: relative;
  


}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}




.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 98px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit1{

    background-color: red;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 10px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

.php{
  color:red ;
}



</style>

<form method = "post" action="">
<div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Enter the following information</div>
      <div class="input-container ic1">
        <input name ="fname" id="firstname" class="input" type="text" value =  <?php if(!empty($fname)){?> <?php echo $fname   ?> <?php } ?> <?php if(!empty($fname1)){?> <?php echo $fname1    ?> <?php } ?> <?php if(!empty($fname2)){?> <?php echo $fname2    ?> <?php } ?> >   
        <div class="cut"></div>
        <label  for="firstname" class="placeholder">First name</label>
      </div>
      <div class="input-container ic2">
        <input  name="lname" id="lastname"  class="input" type="text"   value = <?php if(!empty($lname)){?> <?php echo $lname    ?> <?php } ?> <?php if(!empty($lname1)){?> <?php echo $lname1    ?> <?php if(!empty($lname2)){?> <?php echo $lname2   ?> <?php } ?> <?php } ?> >  
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Last name</label>
      </div>
      <div class="input-container ic2">
        <input name ="email" id="email" class="input" type="" value = <?php if(!empty($email)){?> <?php echo $email  ?> <?php } ?> <?php if(!empty($email1)){?> <?php echo $email1    ?> <?php } ?> >
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</label>
<br>
<br>
<br>
<br>
<br>
        <div class="input-container ic3">
        <input name ="datee" id="date" class="input1" type="date" max="01-01-23" min="01-01-2020"  value =  <?php if(!empty($date)){?> <?php echo $date    ?> <?php } ?> <?php if(!empty($date1)){?> <?php echo $date1   ?> <?php } ?>   >
        <div class="cut"></div>
        <label for="date" class="placeholder" ></label>
      </div>

      </div>
      <button name ="btn" type="submit" class="submit">submit</button>

      <br>
      <br>
      <div class = "php">
     
   
     
      <?php if(!empty($checknum)){ ?>
 <?php echo  "<h3> $checknum<h3>" ; ?> 
   <?php } ?>

   
   


   <?php if(!empty($fnameError)){ ?>
 <?php echo  "<h3>$fnameError<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($lnameError)){ ?>
 <?php echo  "<h3>$lnameError<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($emailError)){ ?>
 <?php echo  "<h3>$emailError<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($checkfname)){ ?>
 <?php echo  "<h3>$checkfname<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($checklname)){ ?>
 <?php echo  "<h3>$checklname<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($checkemail)){ ?>
 <?php echo  "<h3>$checkemail<h3>" ; ?> 
   <?php } ?>


   <?php if(!empty($checkdate)){ ?>
 <?php echo  "<h3>$checkdate<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($text)){ ?>
 <?php echo  "<h3>$text<h3>" ; ?> 
   <?php } ?>

   <?php if(!empty($delete)){ ?>
 <?php echo  "<h3>$delete<h3>" ; ?> 
   <?php } ?> 





      </div>
      <button name ="home" type="submit" class="submit1">Home</button>
    </div>