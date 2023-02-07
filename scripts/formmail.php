<!-- This is my version of the php, it isn't working tho, so I linked the other extraformmail.php file to the contact form -->

<?php
   if (isset($_POST['submit']))
   {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $phone = $_POST['phone'];
      $mailFrom = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $rating = $_POST['rating'];

      foreach($_POST as $key => $val){
         if (is_array($val)){
            $msg.="Item: $key\n";
            foreach($val as $v){
               $v = stripslashes($v);
               $msg.="   $v\n";
            }
         } else {
            $val = stripslashes($val);
            $msg.="$key: $val\n";
         }
      }


      $mailTo = "annacallies98@gmail.com";
      $headers = "From: ".$mailFrom;
      $txt = "You have received an email from ".$firstname." ".$lastname.".\n\n".$message;
      mail($mailTo, $headers, $subject, $txt, $msg);
      header("Location: index.php?maißlsend");

      echo "<meta http-equiv='refresh' content='5;url=http://annacallies.com/152-112/LP6/contact.html?a=1&b=2'>";

   }