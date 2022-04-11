<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../functions.php");
?>
<h1>Create Account</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<form onsubmit="return validate(this)" method="POST">
    <p>Please select your desired account type for creation:</p>
        
        <input type="radio" id="check" name="accounttype" value="Checking">
        <label for="check">Checking</label><br>
        <input type="radio" id="save" name="accounttype" value="Savings">
        <label for="save">Savings</label><br>
    
        <input type="submit" value="Create" />
</form>

<?php

$accnum = 0;
do{
$myRandomString = generateRandomString(12);
$accnum = $myRandomString;
$result = pg_query("SELECT * FROM Accounts WHERE account_number = $myRandomString");
}while(pg_num_rows($result)>0);

$uid = get_user_id();
$bal = 5;

$acctype = $_POST["accounttype"];

$db = getDB();
$stmt = $db->prepare("INSERT INTO Accounts (account_number, user_id, balance, account_type) VALUES(:accnum, :uid, :bal, :acctype)");
try {
    $stmt->execute([":accnum" => $accnum, ":uid" => $uid, ":bal" => $bal, ":acctype" => $acctype]);
    flash("Successfully registered!", "success");
} catch (Exception $e) {
    users_check_duplicate($e->errorInfo);
}

?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>