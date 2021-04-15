<?php

$email = "";
$mail="it is not checked yet";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $email = $_REQUEST['email'];
    if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        $mail = "email is valid";
    } else {
        $mail = "email is not valid";
    }
}

$phone = "";
$number="it is not checked yet";
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $phone = $_REQUEST['phone'];
    if (preg_match('/[+][\d \-+()]+$/', $phone)) {
        $number = "phone number is valid";
    } else {
        $number = "phone number is not valid";
    }
}

$str = "";
$removed ="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $str = $_REQUEST['str'];
    $removed = str_replace(' ', '', $str);
}

$non_numeric = "";
$non_numeric_removed = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $non_numeric = $_REQUEST['non_numeric'];
    $non_numeric_removed = preg_replace('/^[^0-9]/', '', $non_numeric);
}

$task = "";
$new_line = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $task = $_REQUEST['task'];
    $new_line = preg_replace('/\r | \n/', '', $task);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>


	<form action="regex_valid_form.php" method="post">

        <dl>
            <dt>email</dt>
            <dd>
                <label>
                    <input type="email" name="email" value="<?= $email ?>">
                </label>
            </dd>
            <dt>output email</dt>
            <dd><?=	$mail ?></dd>



            <dt>phone</dt>
            <dd>
                <label>
                    <input type="text" name="phone" value="<?= $phone ?>">
                </label>
            </dd>
            <dt>output number</dt>
            <dd><?=	$number ?></dd>



            <dt>string</dt>
            <dd>
                <label>
                    <input type="text" name="str" value="<?= $removed ?>">
                </label>
            </dd>


            <dt>non-numeric</dt>
            <dd>
                <label>
                    <input type="text" name="non_numeric" value="<?= $non_numeric_removed ?>">
                </label>
            </dd>


            <dt>new-line</dt>
            <dd>
                <label>
                    <input type="text" name="task" value="<?= $new_line ?>">
                </label>
            </dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>