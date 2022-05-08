<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
    
}
$_SESSION['account'] = $_GET['account'];
?>

<?php
 $db = getDB();
 $results = [];
 $uid = $_SESSION['account'];
 $stmt = $db->prepare("SELECT id, account_number, account_type, modified, balance, frozen FROM Accounts WHERE user_id = $uid AND is_active = 1 ORDER BY modified desc LIMIT 10");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }
?>

<table>
    <thead>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Modified</th>
        <th>Balance</th>
        <th>APY</th>
        <th>Frozen</th>
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
                    <td>
                        <?php
                            $frozen = $item["frozen"];
                            if($frozen == True){
                                echo "Yes";
                            }
                            if($frozen == False){
                                echo "No";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<h3>Toggle Freeze:</h3>
<form method="POST">
    <label for="acc">Account:</label>
    <input type="number" id="acc" name="acc">

    <input type="submit" value="Toggle" />
</form>

<?php
    if(isset($_POST['acc'])){
        $acc = $_POST['acc'];
        if(ctype_digit($acc) == True){
            $db = getDB();

            $fres = [];
            $stmt = $db->prepare("SELECT frozen FROM Accounts WHERE account_number = $acc LIMIT 1");
            $stmt->execute();
            $fres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $frozenval = $fres[0]['frozen'];
            echo $frozenval;

            $stmt = $db->prepare("UPDATE Accounts SET Frozen = !$frozenval");
            flash("Account Freeze Toggled!", "Success");
        }
    }
?>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>