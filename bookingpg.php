<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    h1
    {
      color:BLACK;
      text-align:CENTER;
    }
    body
    {
      background-color:ROSYBROWN;
    }
    fieldset
    {
      background-color:lavenderblush;
    }
  </style>
  <link rel="stylesheet" href="bookingpg.css">
</head>
<body>
<main>
<?php
   $con=pg_connect("host=localhost dbname=BG28 user=postgres password=admin123");
 if($con)
 {
  echo"success";
 }
 else{
  echo"fail";
 }
   if(isset($_POST['submit']))  
   {
    $name= $_POST['name'];
    $email = $_POST['email'];
    $mno=$_POST['mno'];
    $adults=$_POST['adults'];
    $children=$_POST['children'];
    $c_in=$_POST['c_in'];
    $c_out=$_POST['c_out'];
    $date=$_POST['date'];
    $vehicle=$_POST['vehicle'];
    $suggest=$_POST['suggest'];
    
    $insertquery="INSERT INTO booking(username,user_email_id,curren_date,checkin_date,checkout_date,booking_phone,child_number,adult_number,vehicle_preference,anything_else) 
    VALUES('$name','$email','$date','$c_in','$c_out','$mno','$children','$adults','$vehicle','$suggest')";
    
    $insert_data=pg_query($con,$insertquery);

    
    if($insert_data)
    {
     header("Location:trial.html");
    }
    else
    {
      ?>
        <script>
        echo"Data Not Inserted";
        </script>
      <?php 
    }
   }
   else{
    echo"data not inserted properly"; 
   }
   // header("refresh:1;url=./test.php");

?>
   
  <div class="signup_form">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="myform" class="form" enctype="multipart/form-data" id="form">
       <h1 class="text-center">Book Your Vehicle</h1>
       <div class="form-step form-step-active">
          <div class="input-group">
             <label for="name">Name</label>
             <input type="text" name="name" id="name" autocomplete="off">
             <span id="nameMsg"></span>
          </div>

          <div class="input-group">
              <label for="email">Email-Id</label>
              <input type="email" name="email" id="email" placeholder="abc@gmail.com" autocomplete="off">
              <span id="emailMsg"></span>
          </div>

          <div class="input-group">
              <label for="mno">Mobile Number</label>
              <input type="tel" name="mno" id="mno" placeholder="1234567890" autocomplete="off">
              <span id="mnoMsg"></span>
          </div>

          <div class="input-group">
              <label for="adults">Adults</label>
              <input type="number" name="adults" id="adults" placeholder="" autocomplete="off">
              <span id="adultMsg"></span>
          </div>

          <div class="input-group">
              <label for="children">Children</label>
              <input type="number" name="children" id="children" placeholder="" autocomplete="off">
              <span id="childrenMsg"></span>
          </div>

          <div class="input-group">
             <label for="c_in">Check-In Date</label>
             <input type="date" name="c_in" id="c_in" autocomplete="off">
             <span id="c_inMsg"></span>
          </div>

          <div class="input-group">
             <label for="c_out">Check-Out Date</label>
             <input type="date" name="c_out" id="c_out" autocomplete="off">
             <span id="c_outMsg"></span>
          </div>

          <div class="input-group">
             <label for="date">Date</label>
             <input type="date" name="date" id="date" autocomplete="off">
             <span id="dateMsg"></span>
          </div>

          <div class="input_group">
            <label for="vehicle">Select Vehicle Preference</label>
            <select name="vehicle" id="vehicle">
                <option value=""></option>
                <option value="Bus">Bus</option>
                <option value="5 seater">5 seater</option>
                <option value="6 seater">6 seater</option>
                <option value="Mini Bus">Mini Bus</option>
            </select>
        </div>

        <div class="input_group">
           <textarea name="suggest" id="suggest" cols="55" rows="10"></textarea>
           
        </div>
         
          <div class="btns-group">
              <input class="btn btn-next" id="submit" type="submit" name="submit" value="Submit">
          </div>
       </div>
    </form>
   </div> 
<main>



<!---------------------------------------------------------------
  <fieldset>
    <h1>Book Your Vehicle</h1><center>
    <form>
        Your Name&nbsp&nbsp&nbsp:
        <input type="Name" Placeholder="Enter Name" Name="Your Name"required><br><br>
        </label>
        <label>
        E-Mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<input type="mail" Placeholder="Enter email-id" Name="EMAIL ID"required><br><br>
</label>
<div class="elem-group">

Your Phone&nbsp&nbsp:
<label for="phone">
<input type="tel" id="phone" name="visitor_name"Placeholder="Enter contact"
pattern=(\d{3})-?(\d{3})-?\s?(\d{4}) required> <br><br>	
<hr>
<div class="elem-group inlined">
<label for="adult">Adults&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
<input type="child"><br><br>Children&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>
<input type="number" id="Child"
name="total_children"placeholder="2" min="0"required><br>
</div>
<div class="elem-group inlined"><br>
<label for="check-in date">Check-in Date&nbsp:</label>
<input type="date" id="checkin-date"name="checkin" required>
</div>
<div class="elem-group inlined"><br>
<label for="checkout-Date">Checkout-Date:</label>
<input type="Date" id="checkout-Date"name="checkout" required><br><br>
Date&nbsp:<label>
<input type="date" id="checkout-date" name="checkout" required>
</div>
<div class="elem-group"><br>
<label for="vehicle-selection">Select Vehicle Preference:</label>
<select id="vehicle-selection" name="vehicle_selection" placeholder="type of vehicle"required>

<option value="Bus">Bus</option>
<option value="5-Seater">5-Seater </option>
<option value="6-Seater">6-Seater</option>
<option value="Mini-Bus">mini-bus</option>


</select>
</div>
<hr>
<div class="elem-group">
<label for="message">Anything Else?</label><textarea id="message"  name="visitor_message" placeholder="tell us anything else that might be important."required></textarea>
</div><br><br>
<input type="button" value="submit" required class="btn mt-4" onclick="myFunction()"/>
<script>
function myFunction() {
  alert("Booking Confirmed!");
}
</script>
</form></center></fieldset>
</body>
</html>
->

