<?php
require(__DIR__ . "/../../partials/nav.php");
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
        
        <input type="radio" id="Checking" name="account" value="Checking">
        <label for="check">Checking</label><br>

        <!-- <input type="radio" id="Savings" name="account" value="Savings">
         <label for="save">Savings</label><br> Use Later-->
    
        <input type="submit" value="Create" />
</form>

<?php
if(isset($_POST["account"])){
    $myRandomString = generateRandomString(12);
    $db = getDB();

    $accnum = $myRandomString;
    $uid = get_user_id();
    $bal = 5;
    $acc = $_POST["account"];
    $worldacc = -1;

    $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+5) WHERE user_id=1");
    $balstmt->execute();

    $stmt = $db->prepare("INSERT INTO Accounts(account_number, user_id, balance, account_type) VALUES($accnum, $uid, $bal, 'Checking')");
    $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($worldacc, $accnum, $bal, 'Deposit', 'Account Creation', 5 )");
    $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accnum, $worldacc, ($bal*-1), 'Deposit', 'Account Creation', )");

    try {
        $stmt->execute();
        $stmt2->execute();
        $stmt3->execute();
        flash("Successfully registered!", "success");
    } catch (Exception $e) {
        flash($e);
      }
}

?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>