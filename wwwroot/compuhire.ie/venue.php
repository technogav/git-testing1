<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['company_name'])){
require('function.php');
}else{}
?>

<!doctype html>

<head>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="form-style.css" rel="stylesheet" type="text/css">
<title>CompuHire Form</title>
</head>
<body>
<div class="container ">
  <div class="main-area">
    <div class="top-area">
    <div id="replacement-logo"></div><p>Were getting ready to set up your training center! <br>
      -just a few things we need to know</p></div>
      
    <div id="picture-box" class="picture-box">
      <div class="form-container">
        <form id="msform" action="" method="post">
          <!--___________________________FIRST SLIDE________________________-->
          <fieldset>
            <div class="panel">
              <div id="first-slide" class="form-group">
                <h4>CONTACT DETAILS</h4>
                <input id="company_name" type="text" name="company_name" placeholder="Company Name *" />
                <br>
                <textarea id="venue_address" cols="40" rows="3" name="venue_address" placeholder="Venue Address *"></textarea>
                <input id="company_phone" type="text" name="company_phone" placeholder="Company Phone Number *" />
                <input id="venue_phone" type="text" name="venue_phone" placeholder="Venue Phone Number *" />
                <input id="company_email" type="text" name="company_email" placeholder="Company E-mail *" />
                <input id="setup_date" type="text" name="setup_date" placeholder="Venue Access Date*">
              </div>
              <!--end of form-group--> 
             
            </div><!--end of panel-->
            <input type="button" name="next" class="next1 action-button" value="Next" />
            
            
          </fieldset>
          <!--___________________________SECOND SLIDE________________________-->
          <fieldset>
            <div class="panel">
              <div class="form-group">
                <h4>ROOM SETUP</h4>
                <br>
                Room
                <select id="room_layout" class="boxy" name="room_layout" />
                
                <option>*</option>
                <option>U shaped</option>
                <option>Desks along wall</option>
                <option>Desks in Rows</option>
                </select>
                <br>
                <br>
                No. of Sockets
                <select id="power_sockets" class="boxy" name="power_sockets" />
                
                <option>*</option>
                <?php for($i = 1; $i < 30; $i++){ echo "<option>" . $i . "</option>";
                                        } ?>
                <option>30+</option>
                </select>
                <br>
                <br>
                Locations
                <select id="location_sockets" class="boxy" name="location_sockets" />
                
                <option>*</option>
                <option>On one wall</option>
                <option>In the floor</option>
                <option>Evenly spread</option>
                </select>
                <br>
                <br>
                Internet
               
                <select id="access_details" class="boxy" name="access_details" />
                
                <option>*</option>
                <option>Cable in the room</option>
                <option>Wifi</option>
                <option>Wifi Only</option>
                </select>
                <br>
                <br>
                Lift
                <select id="lift_access" class="boxy" name="lift_access" />
                
                <option>*</option>
                <option>Room on ground floor</option>
                <option>Has Lift Access</option>
                <option>No Lift Access</option>
                </select>
                <br>
                <br>
              </div>
              <!--end of form-group--> 
            </div>
            <!--end of panel2-->
            
            <input type="button" name="previous" class="previous1 action-button" value="Previous" />
            <input type="button" name="next" class="next2 action-button" value="Next" />
          </fieldset>
          <!--___________________________THIRD SLIDE________________________-->
          <fieldset>
            <div class="panel">
              <div id="third-slide" class="form-group">
                <h4>COURSE DETAILS</h4>
                <div class="left">
                  <input id="course_start" type="text" name="course_start" placeholder="Start Date * ">
                </div>
                <div class="right">
                  <input id="course_end" type="text" class="text_box_style" name="course_end" placeholder="End Date *" />
                </div>
                <br>
                <br>
                <input id="course_reference" type="text" name="course_reference" placeholder="Course Reference *" />
                <br>
                <input id="course_description" type="text" class="text_box_style form-control" name="course_description" placeholder="Course Description *" />
                <br>
                <h4 class="split">TRAINER DETAILS</h4>
                <div class="left">
                  <input id="trainer_name" type="text" name="trainer_name" placeholder="Trainer *" />
                </div>
                <div class="right">
                  <input id="trainer_phone" type="text" name="trainer_phone" placeholder="Phone *" />
                </div>
                <input id="trainer_email" type="text" name="trainer_email" placeholder="Trainers E-mail *" />
                Is the Trainer PC Savy?
                <select name="pcsavy" id="pcsavy">
                  <option>*</option>
                  <option>yes</option>
                  <option>No</option>
                </select>
              </div>
              <!--end of form-group--> 
            </div>
            <!--end of panel-->
            
            <input type="button" name="previous" class="previous2 action-button" value="Previous" />
            <input type="button" name="next" class="next3 action-button" value="Next" />
          </fieldset>
          <!--___________________________FORTH SLIDE________________________-->
          <fieldset>
            <div class="panel">
              <div class="form-group">
                <h4>ORDER DETAILS</h4>
                <br>
                <br>
                PC/Laptop Equipment Needed <br>
                <br>
                <select id="pc_equipment" class="boxy" name="pc_equipment" />
                
                <option>*</option>
                <option>21 x PCs and Monitors</option>
                <option>21 x Laptops</option>
                <option>Other (Please Specify)</option>
                </select>
                <br>
                <br>
                Please Specify <br>
                <br>
                <textarea id="special_requirements" cols="30" rows="3" placeholder="Special Reqirements for Software & Hardware" name="special_reqirements"></textarea>
              </div>
            </div>
            <input type="button" name="previous" class="previous3 action-button" value="Previous" />
            <input type="button" name="next" class="next4 action-button" value="Next" />
          </fieldset>
          <!--___________________________Fifth SLIDE________________________-->
          <fieldset>
            <div class="panel">
              <div class="form-group">
                <h4>ADDITIONAL EQUIPMENT</h4>
                <div id="aDiv" style="width:100%; text-align: left;">
                  <input type="checkbox" name="swivel_chairs">
                  21 x Swivel Chairs<br>
                  <input type="checkbox" name="tables">
                  12 x Tables<br>
                  <input type="checkbox" name="projecter">
                  Data Projector<br>
                  <input type="checkbox" name="screen">
                  Projector Screen<br>
                  <input type="checkbox" name="printer1">
                  1 x Printer<br>
                  <input type="checkbox" name="printer2">
                  2 x Printers<br>
                  <input type="checkbox" name="scanner">
                  Printer/ Scanner<br>
                </div>
                <br>
                <br>
                <textarea id="additional_questions" cols="30" rows="5" placeholder="Additional Questions" name="additional_questions"></textarea>
              </div>
            </div>
            <input type="button" name="previous" class="previous4 action-button" value="Previous" />
            <input id="submit_button" type="submit" name="submit" class="next action-button" value="Submit" />
          </fieldset>
        </form>
      </div>
    </div>
    <br>
    <div class="progress"> <br>
      <br>
      <ul id="progressbar">
        <li class="active"> </li>
        <li ></li>
        <li ></li>
        <li ></li>
        <li ></li>
      </ul>
    </div>
    <div class="logo"> </div>
  </div>
</div>

<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<!-- jQuery easing plugin --> 
<script src="form-js/jquery.easing.min.js" type="text/javascript"></script> 
<script type="type/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.js"></script> 
<script src="form-js/form-plugin.js"></script> 
<script>

</script>
</body>
</html>