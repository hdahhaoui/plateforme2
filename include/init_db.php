<?php
function initializeDatabase(mysqli $mysqli, string $schemaPath): void {
    $tables = [
        'users',
        'client',
        'freelancer',
        'projects',
        'post_req',
        'mssgusers',
        'messages'
    ];

    $missing = false;
    foreach ($tables as $table) {
        $table = $mysqli->real_escape_string($table);
        $result = $mysqli->query("SHOW TABLES LIKE '$table'");
        if (!$result || $result->num_rows === 0) {
            $missing = true;
            break;
        }
    }

    if ($missing) {
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
