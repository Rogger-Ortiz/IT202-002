<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Transfer</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
$db = getDB();
?>

<?php

$results = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_number FROM Accounts WHERE user_id = $uid");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }
?>

<form method="POST">
<label for="account">From:</label>
<select id="account" name="account">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account) {
            $hold = $account['account_number'];
            echo("<option value=$hold>$hold</option>");
    }
    ?>
</select>

<label to="account2">To:</label>
<select id="account2" name="account2">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account2) {
        $hold2 = $account2['account_number'];
        echo("<option value=$hold2>$hold2</option>");
}
    ?>
</select>
<br>
<label for="withdraw">Withdraw Amount:</label>
<input type="number" id="withdraw" name="withdraw"><br>

<label for="memo">Memo:</label>
<input type="text" id="memo" name="memo"><br>

<input type="submit" value="Submit" />
</form>

<?php
$hasError = false;
if(isset($_POST['account']) && isset($_POST['account2'])){
    if($_POST['account'] == "Account" || $_POST['account2'] == "Account"){
        flash("Please choose 2 valid accounts", "warning");
        $hasError = true;
    }
}

if(isset($_POST['account']) && isset($_POST['account2'])){
    if(($_POST['account'] == $_POST['account2']) && ($_POST['account'] != "Account" || $_POST['account2'] != "Account")){
        flash("Please choose 2 different accounts", "warning");
        $hasError = true;
    }
}
if((isset($_POST['account']) && isset($_POST['account2'])) && !($hasError)){
  $accsrc = $_POST['account'];
  $accdest = $_POST['account2'];

    
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>