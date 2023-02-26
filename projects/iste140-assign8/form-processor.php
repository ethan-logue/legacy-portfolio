<?php
// NOTICE: this part of this HTML document is just one PHP tag
//  This script doesn't output anything to the user's browser
//  so there is no DOCTYPE or any of the usual HTML things
//  in this part

// **********************************
// SECTION ONE: set all the variables
// **********************************

// set some variables
$emailFrom = "eml8469@rit.edu"; // use YOUR email for both lines 12 and 13
$emailTo = "eml8469@rit.edu";
$subject = "PUP Survery Form";

// for the following lines of code, grab the data being passed 
//   from the method="post" in the HTML form and hold it in a variable

// the words inside each $_POST[] must match a name="" attribute from the 
//   HTML form EXACTLY...

// these are from the text INPUT fields...
$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email'])); 
$phone = Trim(stripslashes($_POST['phone'])); 
// ...used more input fields? Then copy these lines (above)
//   and make more

// these are from the INPUT type="checkbox" fields...
$personalityCheck = $_POST['personalityCheck']; 
$genreCheck = $_POST['genreCheck']; 
$concertCheck = $_POST['concertCheck']; 
$artCheck = $_POST['artCheck']; 
// ...used more checkboxes? Then copy these lines (above)
//   and make more

// this is from all the INPUT type="radio" fields...
$favoriteSelect = $_POST['favoriteSelect']; 
// notice: no matter how many radio buttons, there's only one answer

// this is from the TEXTAREA field...
$howFound = Trim(stripslashes($_POST['howFound'])); 

// **********************************
// SECTION TWO: build the email body
// **********************************

$body = ""; // initialize the variable, then start concatenating
			// backslash-n means new-line in emails

$body .= "Name: ";	//...a label
$body .= $name;			//...a variable
$body .= "<br>\n";		//...a new line

$body .= "Email: ";	//...a label
$body .= $email;		//...a variable
$body .= "<br>\n";		//...a new line

$body .= "Phone Number: ";//...a label
$body .= $phone;		//...a variable
$body .= "<br>\n<hr>";		//...a new line
// ...used more input fields? Then copy these lines (above)
//   and make more

// Do your checkboxes this way...
$body .= "What you like about PUP: <br>\n";	// a heading for your checkbox section

if (isset($personalityCheck)) {			// a checkbox variable
	$body .= "- " . $personalityCheck . "<br>\n";	// the same checkbox variable
}
if (isset($genreCheck)) {				// a checkbox variable
	$body .= "- " . $genreCheck . "<br>\n";		// the same checkbox variable
}
if (isset($concertCheck)) {			// a checkbox variable
	$body .= "- " . $concertCheck . "<br>\n";		// the same checkbox variable
}
if (isset($artCheck)) {				// a checkbox variable
	$body .= "- " . $artCheck . "<br>\n";		// the same checkbox variable
}
$body .= "<br>\n";
// ...used more checkbox fields? Then copy these lines (above)
//   and make more

// This is for your radio buttons (always just one answer)...
$body .= "Your favorite PUP album: <br>\n";	// a heading for your radio button section

if (isset($favoriteSelect)) {	
	$body .= "- " . $favoriteSelect . "<br>\n";	// the (one) radio button variable
}

// This is for your TEXTAREA
$body .= "<hr>How you found PUP: <br>\n";	// a heading for your text area
$body .= $howFound;						// the variable for your text area
$body .= "\n";

// **********************************
// SECTION THREE: send the email
// **********************************
// You won't need to edit anything here...

// send email 
mail($emailTo, $subject, $body, "From: <$emailFrom>");


//end the PHP block here...
?>

<!-- **********************************
	 SECTION FOUR: thank the user in HTML;
	 Below, there needs to be an HTML 
	 webpage with a customized message 
	 for the user
	 ********************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styles.css">
	<title>Thank You</title>
</head>
<body>

	<h1>Thank you for filling out our form!</h1>

	<h2>Thank You <?php echo $name; ?></h2>
	<p>Your infomation has been sent.</p>

	<code>
		<?php echo $body; ?>
	</code>

	<p>Bye-bye.  <a href=".">Back to the home page</a>.</p>

</body>
</html>