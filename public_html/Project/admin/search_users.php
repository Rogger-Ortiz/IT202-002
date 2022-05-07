<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}
?>
<h1>List Users</h1>

<h3>Filter:</h3>
<form method="POST">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname"><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname"><br>

    <input type="submit" name="submit" value="Filter" />
</form>

<?php
    $db = getDB();
    $users = [];
    $query = "SELECT id, email, created, username, first_name, last_name, public FROM Users WHERE id>0";

    if(isset($_POST['submit'])){
        if(isset($_POST['fname'])){
            $fname = $_POST['fname'];
            if(ctype_alpha($fname)){
                $query .= " AND first_name = '$fname'";
            }
        }
        if(isset($_POST['lname'])){
            $lname = $_POST['lname'];
            if(ctype_alpha($lname)){
                $query .= " AND last_name = '$lname'";
            }
        }
    }

    $stmt = $db->prepare($query);
    $stmt->execute();
    $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($l) {
        $users = $l;
    }
?>
<table>
    <thead>
        <th>ID</th>
        <th>Email</th>
        <th>Created</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
    </thead>
    <tbody>
        <?php if (empty($users)) : ?>
            <tr>
                <td colspan="100%">No users</td>
            </tr>
        <?php else : ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php se($user, "id"); ?></td>
                    <td><?php
                        if($user['public'] == 1){
                            se($user, 'email');
                        }else{
                            echo "-";
                        }
                    ?></td>
                    <td><?php se($user, "created"); ?></td>
                    <td><?php se($user, "username")?></td>
                    <td><?php se($user, "first_name")?></td>
                    <td><?php se($user, "last_name")?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>