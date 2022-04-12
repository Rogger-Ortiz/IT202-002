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
        
        <input type="radio" id="check" name="account" value=0>
        <label for="check">Checking</label><br>

        <!-- <input type="radio" id="Savings" name="account" value="Savings">
         <label for="save">Savings</label><br> Use Later-->
    
        <input type="number" id="deposit" name="deposit" value="Initial Deposit">
        <label for="deposit">Deposit</label><br>

        <input type="submit" value="Create" />
</form>

<?php
$hasError = false;
if(isset($_POST["deposit"])){
    if($_POST["deposit"]<5){
        flash("Deposit must be $5 or more.", "danger");
        $hasError = true;
    }
}
if(isset($_POST["account"]) && !$hasError){
    $db = getDB();

    $dupe = [];
    $stmt = $db->prepare("SELECT account_number FROM Accounts");
    $stmt->execute();
    $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($l) {
        $dupe = $l;
    }
    $isDupe = false;
    $myRandomString = '';
    do{
        $myRandomString = generateRandomString(12);
        foreach($l as $number => $account) {
            foreach($account as $num => $value) {
                if($myRandomString == $value) {
                    $isDupe = true;
                }
            }
        }
    }while($isDupe);    

    $accnum = $myRandomString;
    $uid = get_user_id();
    $bal = $_POST["deposit"];
    $acc = $_POST["account"];
    $worldacc = -1;

    $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$bal) WHERE user_id=-1");
    $balstmt->execute();

    // This grabs columns of a table using $results[r][c] where r="rownumber" and c="colname"
    $results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=-1 LIMIT 1");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching items", "danger");
    }
    // Convert result to a string we can enter into the dataset
    $wbal = $results[0]['balance'];
    $wbal = strval($wbal);

    if($acc = 0){
        $stmt = $db->prepare("INSERT INTO Accounts(account_number, user_id, balance, account_type) VALUES($accnum, $uid, $bal, 'Checking')");
    }
    if($acc = 1){
        $stmt = $db->prepare("INSERT INTO Accounts(account_number, user_id, balance, account_type) VALUES($accnum, $uid, $bal, 'Savings')");
    }

    $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($worldacc, $accnum, $bal, 'Deposit', 'Account Creation', $wbal )");
    $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accnum, $worldacc, ($bal*-1), 'Deposit', 'Account Creation', $bal)");

    try {
        $stmt->execute();
        $stmt2->execute();
        $stmt3->execute();

        flash("Successfully registered!", "success");
        die(header("Location: accounts.php"));
    } catch (Exception $e) {
        flash($e);
      }
}

?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>