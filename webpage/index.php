<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>validation forms</title>
</head>
<body>
<?php

$name = "";
$email = "";
$username = "";
$address = "";
$city = "";
$postalCode = "";
$phone = "";
$mobile = "";
$credit = "";
$salary = "";

$isNameValid = true;
$isEmailValid = true;
$isUserNameValid = true;
$isAddressValid = true;
$isCityValid = true;
$isPostalCodeValid = true;
$isPhoneValid = true;
$isMobileValid = true;
$isCreditValid = true;
$isSalaryValid = true;

if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $postalCode = $_REQUEST['postalCode'];
    $phone = $_REQUEST['phone'];
    $mobile = $_REQUEST['mobile'];
    $credit = $_REQUEST['credit'];
    $salary = $_REQUEST['salary'];

    $isNameValid = preg_match('/^([A-Z][a-z][a-z \-]{2,})*([a-z]{2,})$/i', $name);
    $isEmailValid = preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email);
    $isUserNameValid = preg_match('/^([a-z][a-z \-]{2,})*([a-z]{5,})$/i', $username);
    $isAddressValid = preg_match('/^([a-z][a-z \-]{2,})*([a-z]{5,})$/i', $address);
    $isCityValid = preg_match('/^([a-z][a-z \-]{2,})*([a-z]{5,})$/i', $city);
    $isPostalCodeValid = preg_match('/([\d \-+()]{6,})+$/', $postalCode);
    $isPhoneValid = preg_match('/([\d \-+()]{9,})+$/', $phone);
    $isMobileValid = preg_match('/([\d \-+()]{9,})+$/', $mobile);
    $isCreditValid = preg_match('/([\d \-+()]{16,})+$/', $credit);
    $isSalaryValid = preg_match('/[UZS][ \d \-+()]+$/', $salary);

    $isValid = $isNameValid && $isEmailValid && $isUserNameValid && $isAddressValid && $isCityValid && $isPostalCodeValid && $isPhoneValid && $isMobileValid && $isCreditValid && $isSalaryValid;
    if ($isValid)
    {
        header('Location: thanks.php', TRUE, 301);
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>validation forms</h1>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control <?= $isNameValid?'':'is-invalid' ?>" id="name" name="name" value="<?= $name ?>" placeholder="please! enter name">
                    <div class="invalid-feedback">
                        please! enter name
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control <?= $isEmailValid?'':'is-invalid' ?>" id="email" name="email" value="<?= $email ?>" placeholder="please! enter email">
                    <div class="invalid-feedback">
                        please! enter email
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control <?= $isUserNameValid?'':'is-invalid' ?>" id="username" name="username" value="<?= $username ?>" placeholder="please! enter username">
                    <div class="invalid-feedback">
                        please! enter username
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">address</label>
                    <input type="text" class="form-control <?= $isAddressValid?'':'is-invalid' ?>" id="address" name="address" value="<?= $address ?>" placeholder="please! enter address">
                    <div class="invalid-feedback">
                        please! enter address
                    </div>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control <?= $isCityValid?'':'is-invalid' ?>" id="city" name="city" value="<?= $city ?>" placeholder="please! enter city">
                    <div class="invalid-feedback">
                        please! enter city
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postalCode" class="form-label">postal code</label>
                    <input type="text" class="form-control <?= $isPostalCodeValid?'':'is-invalid' ?>" id="postalCode" name="postalCode" value="<?= $postalCode ?>" placeholder="please! enter postal code">
                    <div class="invalid-feedback">
                        please! enter postal code
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">home phone</label>
                    <input type="text" class="form-control <?= $isPhoneValid?'':'is-invalid' ?>" id="phone" name="phone" value="<?= $phone ?>" placeholder="please! enter phone number">
                    <div class="invalid-feedback">
                        please! enter phone number
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">mobile phone</label>
                    <input type="text" class="form-control <?= $isMobileValid?'':'is-invalid' ?>" id="mobile" name="mobile" value="<?= $mobile ?>" placeholder="please! enter mobile phone number">
                    <div class="invalid-feedback">
                        please! enter mobile phone number
                    </div>
                </div>

                <div class="mb-3">
                    <label for="credit" class="form-label">credit card</label>
                    <input type="text" class="form-control <?= $isCreditValid?'':'is-invalid' ?>" id="credit" name="credit" value="<?= $credit ?>" placeholder="please! enter credit card number">
                    <div class="invalid-feedback">
                        please! enter credit card number
                    </div>
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">salary</label>
                    <input type="text" class="form-control <?= $isSalaryValid?'':'is-invalid' ?>" id="salary" name="salary" value="<?= $salary ?>" placeholder="please! enter salary">
                    <div class="invalid-feedback">
                        please! enter salary
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>