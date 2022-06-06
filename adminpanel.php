<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

if ($_SESSION['role'] != 'admin') {
    header("location: ./index.php");
    exit();
}
?>
<div style="background-color: rgb(22, 22, 22);">
<h1 class=" text-center text-light">Administration</h1>
    <hr class="text-white">
<?php
$sql = "SELECT * FROM products";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h3 class='text-center mt-5 text-white'>Products</h3>";
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th class='text-white'>ID</th>";
        echo "<th class='text-white'>Name</th>";
        echo "<th class='text-white'>Price</th>";
        echo "<th class='text-white'>Is Available</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='text-light'>" . $row['id'] . "</td>";
            echo "<td class='text-light'>" . $row['productsName'] . "</td>";
            echo "<td class='text-light'>" . $row['productsPrice'] . "</td>";
            if ($row['productAvailable'] == 1) {
                echo "<td> <a href=adminpanel.php?idProduct=" .  $row['id'] ."&available=" . $row['productAvailable'] . productStatus($conn) . "><p class='text-success'>Available</p><a/></td>";
            } else if ($row['productAvailable'] == 0) {
                echo "<td> <a href=adminpanel.php?idProduct=" .  $row['id'] ."&available=" . $row['productAvailable'] . productStatus($conn) . "><p class='text-danger'>Not Available</p><a/></td>";
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
?>
<?php
$sql = "SELECT * FROM users";

if ($result = mysqli_query($conn, $sql)) {
    echo "<h3 class='text-center mt-5 text-white'>Users</h2>";
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th class='text-white'>ID</th>";
    echo "<th class='text-white'>Name</th>";
    echo "<th class='text-white'>Email</th>";
    echo "<th class='text-white'>Role</th>";
    echo "<th class='text-white'>Delete action</th>";
    echo "<th class='text-white'>Role action</th>";
    echo "</tr>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='text-light'>" . $row['usersId'] . "</td>";
            echo "<td class='text-light'>" . $row['usersName'] . "</td>";
            echo "<td class='text-light'>" . $row['usersEmail'] . "</td>";
            echo "<td class='text-light'>" . $row['usersRole'] . "</td>";
            if ($row['usersName'] == "admin") {
                echo "<td></td>";
            }
            if ($row['usersName'] != "admin") {
                echo "<td> <a href=adminpanel.php?idDelete=" . $row['usersId'] . deleteUser($conn) . ">Delete user<a/></td>";
            }
            echo "<td> <a href=adminpanel.php?idEdit=" .  $row['usersId'] ."&roleEdit=" . $row['usersRole'] . changeRole($conn) . ">Change role<a/></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "No rows in database.";
    }
} else {
    echo "Error:  $sql. " . mysqli_error($conn);
}
function productStatus($conn)
{
    if (isset($_GET['idProduct'])) {
        if ($_GET['available'] == "0"){
            $sql = "UPDATE products SET productAvailable = " . '1 ' . "WHERE id = " . $_GET['idProduct'];
            echo $sql;
            if (mysqli_query($conn, $sql)) {
                echo "Deleted successfully";
                header("location: adminpanel.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        if ($_GET['available'] == "1"){
            $sql = "UPDATE products SET productAvailable = " . '0 ' . "WHERE id = " . $_GET['idProduct'];
            if (mysqli_query($conn, $sql)) {
                echo "Deleted successfully";
                header("location: adminpanel.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
function deleteUser($conn)
{
    if (isset($_GET['idDelete'])) {
        $sql = "DELETE FROM users WHERE usersId = " . $_GET['idDelete'];
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "Deleted successfully";
            header("location: adminpanel.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
function changeRole($conn)
{
    if (isset($_GET['idEdit'])) {
        if ($_GET['roleEdit'] == "user"){
            $sql = "UPDATE users SET usersRole = " . '"admin "' . "WHERE usersId = " . $_GET['idEdit'];
            echo $sql;
            if (mysqli_query($conn, $sql)) {
                echo "Deleted successfully";
                header("location: adminpanel.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        if ($_GET['roleEdit'] == "admin"){
            $sql = "UPDATE products SET productAvailable = " . '"users" ' . "WHERE usersId = " . $_GET['idEdit'];
            if (mysqli_query($conn, $sql)) {
                echo "Deleted successfully";
                header("location: adminpanel.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}

?>
</div>
<?php
include_once 'footer.php';
?>
