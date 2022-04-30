<?php
function toAccId(int $accnum){
    $db = getDB();
    $results = [];
    $stmt = $db->prepare("SELECT id, account_number FROM Accounts WHERE account_number=$accnum LIMIT 1");
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
    $res = $results[0]['id'];
    $res = strval($res);
    return $res;
}