<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}
?>
<h1>List Accounts</h1>

<h3>Filter:</h3>
<form method="POST">
    <label for="num">Account Number:</label>
    <input type="number" id="number" name="num"><br>

    <input type="submit" name="submit" value="Filter" />
</form>

<form method="POST">
<label for="num2">Account To Freeze/Unfreeze:</label>
    <input type="number" id="num2" name="num2"><br>
    <input type="submit" name="submit2" value="Toggle" />
</form>

<?php
 $db = getDB();
 $results = [];
 $hasError = false;

 $query = "SELECT id, account_number, account_type, modified, balance FROM Accounts WHERE is_active = 1 AND id != 1";

 if(isset($_POST['submit'])){
    $numval = $_POST['num'];
    $numval = strval($numval);
    if(ctype_digit($numval)){
        $query .= " AND account_number LIKE '%$numval%'";
    }else{
        flash("Please only use digits in account number", "warning");
    }
 }

    $res = [];
    if(isset($_POST['submit2'])){
        $accnum = $_POST['num2'];
        $stmt = $db->prepare("SELECT frozen FROM Accounts WHERE account_number=$accnum LIMIT 1");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $frozen = $res[0]['frozen'];

        if($frozen == True){
         $stmt = $db->prepare("UPDATE Accounts SET frozen=False WHERE account_number=$accnum");
         $stmt->execute();
         flash("Account unfrozen!", "Success");
        }elseif($frozen == False){
            $stmt = $db->prepare("UPDATE Accounts SET frozen=True WHERE account_number=$accnum");
            $stmt->execute();
            flash("Account frozen!", "Success");
        }else{
            flash("Something went wrong", "warning");
        }
    }

 $query .= " ORDER BY modified desc LIMIT 10";
 $stmt = $db->prepare($query);
 if(!$hasError){
     $stmt->execute();
     $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
     if ($l) {
        $results = $l;
    }
 }
 
?>

<table>
    <thead>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Modified</th>
        <th>Balance</th>
        <th>APY</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No Accounts</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $item) : ?>
                <tr>
                    <td><a href="<?php echo get_url('details.php'); ?>?account=<?php se($item, "id");?>&page=1"><?php se($item, "account_number"); ?></a></td>
                    <td><?php se($item, "account_type"); ?></td>
                    <td><?php se($item, "modified"); ?></td>
                    <td><?php se($item, "balance"); ?></td>
                    <td>
                        <?php
                            $acc = $item["account_type"];
                            $sys = [];
                            $stmt = $db->prepare("SELECT * FROM Sys");
                            $stmt->execute();
                            $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($l) {
                                $sys = $l;
                            }

                            if($acc == "Loan" || $acc == "Savings"){
                                if($acc == "Loan"){
                                    $apy = $sys[0]["loan_apy"];
                                    $apy*=100;
                                    echo "$apy" . "%";
                                }
                                if($acc == "Savings"){
                                    $apy = $sys[0]["savings_apy"];
                                    $apy*=100;
                                    echo "$apy" . "%";
                                }
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>