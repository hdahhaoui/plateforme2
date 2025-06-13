<?php
function initializeDatabase(mysqli $mysqli, string $schemaPath): void {
    $result = $mysqli->query("SHOW TABLES LIKE 'users'");
    if (!$result || $result->num_rows === 0) {
        if (!file_exists($schemaPath)) {
            return; // schema missing
        }
        $sql = file_get_contents($schemaPath);
        if ($sql !== false) {
            $mysqli->multi_query($sql);
            // flush multi queries
            while ($mysqli->more_results()) {
                $mysqli->next_result();
            }
        }
    }
}
?>
