1.Use normal on localhost
2.Use DB Example if you want to test it out (the db name is set in code to 'otp' and the default credentials for localhost without password) (ofcourse use connection file better)
3.Ofcourse before using in your project go into php/Send_OTP.php and change the last line:
from : echo "Sent Successfully ! ".$r;
to : echo "Sent Successfully !";
in order to not display the unencrypted password on the modal and send it to the designated user for example:
-via email like using PHPMailer or whatever you like.