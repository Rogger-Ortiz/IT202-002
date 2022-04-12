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

$fVal = -1;
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
    <?php
    foreach($results as $account) {
            $hold = $account['account_number'];
            echo("<option value=$hold>$hold</option>");
    }
    ?>
</select>

<label to="account2">To:</label>
<select id="account2" name="account2">
    <?php
    foreach($results as $account2) {
        $hold2 = $account2['account_number'];
        echo("<option value=$hold2>$hold2</option>");
}
    ?>
</select>
<input type="submit" value="Submit" />
</form>

<?php
if(isset($_POST['account']) && isset($_POST['account2'])){
    se("Success!", "success");
}
?>