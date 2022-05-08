<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}
?>
<h1>Search Users</h1>
<?php
 $db = getDB();
 $query = "SELECT account_number, user_id, frozen FROM Accounts WHERE id != 1";

 if(isset($_POST['acc'])){
    $acc = $_POST['acc'];
    if(ctype_digit($acc) == True){
        $query .= " AND account_number LIKE '%$acc%'";
    }
 }

 $stmt = $db->prepare($query);
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }else{
     flash("No accounts found", "warning");
 }
?>

<h3>Search by Account Number:</h3>
<form method="POST">
    <label for="acc">Account Number:</label>
    <input type="number" id="acc" name="acc">

    <input type="submit" value="Filter" />
</form>

<table>
    <thead>
        <th>Account Number</th>
        <th>Is Frozen</th>
        <th>Freeze Account</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No Accounts</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $item) : ?>
                <tr>
                    <td><a href="<?php echo get_url('../details.php'); ?>?account=<?php se($item, "user_id");?>&page=1"><?php se($item, "account_number"); ?></a></td>
                    <td>
                        <?php
                            $isdis = $item["frozen"];
                            if($isdis == True){
                                echo "Yes";
                            }
                            if($isdis == False){
                                echo "No";
                            }
                        ?>
                    </td>
                    <td><a href="<?php echo get_url('admin/freeze_account.php'); ?>?account=<?php se($item, "account_number");?>">Toggle Freeze</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>