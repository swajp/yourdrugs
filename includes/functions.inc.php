<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat){
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd, usersRole) VALUES (?, ?, ?, 'user');";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($email, $pwd){
    $result;
    if (empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $email, $pwd){
    $emailExists = emailExists($conn, $email);

    if($emailExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $emailExists["usersId"];
        $_SESSION["name"] = $emailExists["usersName"];
        $_SESSION["email"] = $emailExists["usersEmail"];
        $_SESSION["role"] = $emailExists["usersRole"];

        if($emailExists["usersRole"] == "user")
        {
            header("location: ../index.php");
            exit();
        }
        else if ($emailExists["usersRole"] == "admin"){
            header("location: ../adminpanel.php");
            exit();
        }
    }
}
function allUsers($conn){
    $sql = "SELECT * FROM users";

    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<h2>Users</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Role</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['usersId'] . "</td>";
                echo "<td>" . $row['usersName'] . "</td>";
                echo "<td>" . $row['usersEmail'] . "</td>";
                echo "<td>" . $row['usersRole'] . "</td>";
                if ($row['usersName'] != "admin"){
                    echo "<td> <a href=adminpanel.php?idDelete=" . $row['usersId'] . deleteUser($conn) . ">Delete user<a/></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "No rows in database.";
        }
    } else{
        echo "Error:  $sql. " . mysqli_error($conn);
    }
}
function deleteUser($conn){
    if (isset($_GET['idDelete'])){
        $sql = "DELETE FROM users WHERE usersId = " . $_GET['idDelete'];
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "Deleted successfully";
            header("location: ../adminpanel.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
}
function allProducst($conn)
{
    $sql = "SELECT * FROM products";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Products</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Price</th>";
            echo "<th>Is Available</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['productsName'] . "</td>";
                echo "<td>" . $row['productsPrice'] . "</td>";
                if ($row['productAvailable'] == 1) {
                    echo "<td> Available  </td>";
                } else {
                    echo "<td> Not Available  </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "No rows in database.";
        }
    } else {
        echo "ERROR: $sql. " . mysqli_error($conn);
    }
}