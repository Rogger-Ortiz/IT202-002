<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
    
}
$_SESSION['account'] = $_GET['account'];
?>


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