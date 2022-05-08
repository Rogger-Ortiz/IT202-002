<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}
$_SESSION['account'] = $_GET['account'];
?>

<h1>Create Account</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<form onsubmit="return validate(this)" method="POST">
    <h3>Please select your desired account type for creation:</h3>
        <label for="check">Checking</label>
        <input type="radio" id="check" name="account" value="Checking"><br>

        <label for="save">Savings (APY: 1%)</label>
        <input type="radio" id="save" name="account" value="Savings"><br><br>
    
        <label for="deposit">Deposit</label>
        <input type="number" id="deposit" name="deposit" value="Initial Deposit"><br>

        <input type="submit" value="Create" />
</form>

<?php
$hasError = false;

if(!(isset($_POST['account']))){
    if(isset($_POST['deposit'])){
        flash("Please select an account to create", "warning");
    }
}

if(isset($_POST["deposit"])){
    if($_POST["deposit"]<5){
        flash("Deposit must be $5 or more.", "warning");
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
    $uid = $_SESSION['account'];
    $bal = $_POST["deposit"];
    $acc = $_POST["account"];
    $worldacc = 1;

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

    $stmt = $db->prepare("INSERT INTO Accounts(account_number, user_id, balance, account_type) VALUES($accnum, $uid, $bal, '$acc')");
    $stmt->execute();

    $results = [];
    $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_number=$accnum LIMIT 1");
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
    $uAccID = $results[0]['id'];
    $uAccID = (int)$uAccID;

    $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($worldacc, $uAccID, ($bal*-1), 'Deposit', 'Account Creation', $wbal )");
    $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($uAccID, $worldacc, $bal, 'Deposit', 'Account Creation', $bal)");

    try {
        $stmt2->execute();
        $stmt3->execute();

        flash("Successfully registered!", "success");
        
        die(header("Location: admin/search_accounts.php"));
    } catch (Exception $e) {
        flash($e);
      }
}

?>


<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>