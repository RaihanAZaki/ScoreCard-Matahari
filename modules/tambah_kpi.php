<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("config.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user_login = $_SESSION['id_user'];
    if (isset($_POST['selected_kpi']) && is_array($_POST['selected_kpi'])) {
        // Start a transaction
        $conn->begin_transaction();

        try {
            foreach ($_POST['selected_kpi'] as $selected_kpi_id) {
                // Assuming $id_user_login is already defined somewhere in your code
                $insertQuery = "INSERT INTO kpi_user (id_user, Id_kpi, stage) VALUES (?, ?, 'Submit')";

                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("ii", $id_user_login, $selected_kpi_id);

                // Execute the statement and check for errors
                if (!$stmt->execute()) {
                    throw new Exception("Error executing statement: " . $stmt->error);
                }

                // Close the statement for the next iteration
                if (!$stmt->close()) {
                    throw new Exception("Error closing statement: " . $stmt->error);
                }
            }

            // Commit the transaction if all insertions are successful
            $conn->commit();
            echo "Data inserted successfully!";
        } catch (Exception $e) {
            // An error occurred, roll back the transaction
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }
    } else {
        echo "No checkboxes were selected.";
    }
}

// Close the database connection
$conn->close();
?>
