<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Registered Students</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Mobile No.</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database credentials
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "assigmenttwo";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select all students
            $sql = "SELECT student_id, fname, lname, mobile, email, gender, address FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop through each row of the result set
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["fname"] . " " . $row["lname"] . "</td>";
                    echo "<td>" . $row["mobile"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    // Note: Department and Course are not in the main 'students' table in database.sql.
                    // This is a placeholder. A more complex query or schema is needed for this.
                    echo "<td>Computer</td>"; // Placeholder for Department
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row["student_id"] . "'>Edit</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No registered students found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <p>
        <a href="register.php">Register a New Student</a>
    </p>
</body>
</html>