<?
 
   $to = "callmenow@compuhire.ie";
   $subject ="COMPU-TEXT_".Date();
   $msg = "Name: $name\n\n";
   $msg .= "Phone Nuber: $phone_number\n\n";

   mail($to, $subject, $msg, "");

?>


