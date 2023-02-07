<?php
function connect() {
    $db = "t2204m-java1";
    $host = "localhost";
    $user = "root";
    $pwd = "";

    $conn = new mysqli($host, $user, $pwd, $db);

    //Ket noi khong thanh cong
    if($conn->connect_error) {
//        echo $conn->error;
//        die();
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

//--Ham doc du lieu (tra ve ket qua mang)
/**
 * @param $sql
 * @return array
 */
function querry($sql) {
    $conn = connect();
    $rs = $conn->query($sql);
    $data = [];
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

//--Ham them sua xoa (tra ve true/false)
/**
 * @param $sql
 * @return bool|mysqli_result
 */
function execute($sql) {
    $conn = connect();
    return $rs = $conn->query($sql);
}


