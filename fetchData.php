<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "contact_form"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM form_data";
    $result = $conn->query($sql);

    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Data Display Page</title>
</head>
<body>

<div class="container mt-5">
    <h2>Data Display Page</h2>

    
    <form method="post">
        <button type="submit" class="btn btn-primary mb-3" name="loadDataBtn">Load Data</button>
    </form>

    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Serial</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "</tr>";
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
