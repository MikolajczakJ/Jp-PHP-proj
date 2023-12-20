<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamów samochód</title>
</head>
<body>

<?php
if (isset($_GET['car_id'])) {
    $carId = $_GET['car_id'];
require_once "../scripts/connect.php";
// JESZCZE TRZEBA BĘDZIE TU WYŚWIETLIĆ DANE SAMOCHODU
    echo "<h1>Order Car #$carId</h1>";
}
    ?>
    <form action="process_order.php" method="post">
        <input type="hidden" name="car_id" value="<?php echo $carId; ?>">

        <!-- Date input for start of rental period -->
        <label for="start_date">Od:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>

        <!-- Date input for finish of rental period -->
        <label for="finish_date">Do:</label>
        <input type="date" id="finish_date" name="finish_date" required>
        <br>

        <!-- Additional form fields can be added for user details, payment, etc. -->
        <input type="submit" value="Place Order">
    </form>

