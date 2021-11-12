<?php
if ($_POST['rollno']) {
    $conn = new mysqli("localhost", "root", "p9178", "student");
    if ($conn->connect_error) {
        $output = array("status" => "false", "msg" => 'error');
    } else {
        $sql = "SELECT * from records Where rollno =" . $_POST['rollno'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $output = array("status" => "true", "sql" => $sql, "msg" => mysqli_fetch_assoc($result));
        } else {
            $output = array("status" => "false", "sql" => $sql, "msg" => "0 rec");
        }
    }
    echo json_encode($output);
}
