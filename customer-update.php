<?php
include 'header.php';
include 'mysql_connect.php';

$requestNic = $_GET['customerNic'];

$query = "SELECT * FROM customer WHERE nic='$requestNic'";
$selectedCustomer = mysqli_query($con, $query);
$raw = mysqli_fetch_assoc($selectedCustomer);
$selectedNic = $raw['nic'];
$selectedName = $raw['name'];
$selectedAddress = $raw['address'];
$selectedSalary = $raw['salary'];

if (isset($_POST['submit'])) {

    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    echo $nic;
    $sql = "UPDATE customer SET name='$name', address='$address', salary=$salary WHERE nic='$nic'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location:customer-list.php");
    }


}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Customers</title>
</head>
<body>
<form method="post" action="customer-update.php">
    <div class="container">
        <br>
        <h4>Customer Form</h4>
        <hr>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="nic">Nic</label>
                    <input type="text" name="nic" id="nic" class="form-control" required
                    value=<?php echo $selectedNic;?>>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required
                           value=<?php echo $selectedName;?>>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required
                           value=<?php echo $selectedAddress;?>>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" required
                           value=<?php echo $selectedSalary;?>>
                </div>
            </div>
            <div class="col-12">
                <br>
                <input type="submit" name="submit" class="btn btn-primary col-12" value="Update Customer"/>
            </div>
        </div>
    </div>
</form>
</body>
</html>