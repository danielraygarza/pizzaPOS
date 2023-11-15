<?php
    session_start();
    include 'database.php'; // Include the database connection details
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



    // Fetch employee data based on the selected store from the database
    $storeId = $_GET['storeId'];
    $emp_status = $_GET['emp_status'];
    $result = $mysqli->query("SELECT * FROM employee WHERE Store_ID = $storeId AND active_employee = $emp_status");

    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = ['id' => $row['Employee_ID'], 'name' => $row['E_First_Name'] . " " .$row['E_Last_Name']];
    }

    // Return the data in JSON format
    header('Content-Type: application/json');
    echo json_encode($employees);

   

?>