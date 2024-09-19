<?php


const MIN_DONATION = 1;

$errors = [];
$inputs = [];
$valid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // sanitize & validate amount
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $inputs['amount'] = $amount;
    if ($amount !== false && $amount !== null) {
        $amount = filter_var($amount, FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => MIN_DONATION]]);
        if ($amount === false) {
            $errors['amount'] = 'The minimum donation is $1';
        } else {
            $valid = true;
        }
    } else {
        $errors['amount'] = 'Please enter a donation amount';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP - without PRG</title>
</head>

<body>
<main>
    <form action="" method="post">
        <h1>Donation</h1>
        <?php if ($valid) : ?>
            <div class="alert alert-success">
                Thank you for your donation of $<?= $inputs['amount'] ?? '' ?>
            </div>
        <?php endif ?>
        <div>
            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="<?= $inputs['amount'] ?? '' ?>" id="amount"
                   placeholder="Minimum donation $<?= MIN_DONATION ?>">
            <small><?= $errors['amount'] ?? '' ?></small>
        </div>
        <button type="submit">Donate</button>
    </form>
</main>
</body>
</html>