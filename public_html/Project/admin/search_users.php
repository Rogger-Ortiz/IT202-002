<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
    $db = getDB();
}
?>

<h3>Filter:</h3>
<form method="POST">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname"><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname"><br>

    <label for="num">Account Number:</label>
    <input type="number" id="num" name="num"><br>

    <input type="submit" value="Filter" />
</form>


<h1>List Users</h1>
<form method="POST">
    <input type="search" name="role" placeholder="Role Filter" />
    <input type="submit" value="Search" />
</form>
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
        <?php if (empty($roles)) : ?>
            <tr>
                <td colspan="100%">No roles</td>
            </tr>
        <?php else : ?>
            <?php foreach ($roles as $role) : ?>
                <tr>
                    <td><?php se($role, "id"); ?></td>
                    <td><?php se($role, "name"); ?></td>
                    <td><?php se($role, "description"); ?></td>
                    <td><?php echo (se($role, "is_active", 0, false) ? "active" : "disabled"); ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="role_id" value="<?php se($role, 'id'); ?>" />
                            <?php if (isset($search) && !empty($search)) : ?>
                                <?php /* if this is part of a search, lets persist the search criteria so it reloads correctly*/ ?>
                                <input type="hidden" name="role" value="<?php se($search, null); ?>" />
                            <?php endif; ?>
                            <input type="submit" value="Toggle" />
                        </form>
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