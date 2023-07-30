<?php

ini_set("SMTP", "localhost");
ini_set("smtp_port", "25");


$EmailFrom = "contact@yourmail.com";
$EmailTo = "muhammadamin0598@gmail.com";
$Subject = "New Message from Porfo Web";
$Name = Trim(stripslashes($_POST['InputName'])); 
$Phone = Trim(stripslashes($_POST['InputPhone'])); 
$Email = Trim(stripslashes($_POST['InputEmail']));
$Subject = Trim(stripslashes($_POST['InputSubject'])); 
$Message = Trim(stripslashes($_POST['InputMessage'])); 
$Headers = "From:" . $Email;

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, $Headers);

// redirect to success page 
// if ($success){
//   print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
// }
// else{
//   print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
// }

try {
  if ($success){
    print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
  }
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}
?>