<?php
/* Set e-mail recipient */
$myemail  = "ynotinnovate@gmail.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['name'], "Enter your name");
$email = check_input($_POST['email']);
$number = check_input($_POST['number']);
$website = check_input($_POST ['website']);
$budget = check_input($_POST ['budget']);
$comments = check_input($_POST['comment'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* E-mail Content */
$message = "Hello!

Your contact form has been submitted by:

Name: $yourname
E-mail: $email
Number: $number
URL: $website
Budget: $budget

Comments:
$comments

End of message
";

mail($myemail, $subject, $message);

/* Thanks Page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>