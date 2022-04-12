<?php
function toAccnum(int $id){
    $db = getDB();
    $results = [];
    $stmt = $db->prepare("SELECT id, account_number FROM Accounts WHERE id=$id LIMIT 1");
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
    $res = $results[0]['account_number'];
    $res = strval($res);
    return $res;
}