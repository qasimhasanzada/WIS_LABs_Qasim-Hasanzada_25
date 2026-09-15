<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Students Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Create Students Table</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $conn = new mysqli("localhost", "root", "", "wis_lab");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $sql = "CREATE TABLE students (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            full_name VARCHAR(100) NOT NULL,
                            email VARCHAR(120) NOT NULL,
                            department VARCHAR(80) NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )";
                        
                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success">Table "students" created successfully!</div>';
                        } else {
                            echo '<div class="alert alert-danger">Error creating table: ' . $conn->error . '</div>';
                        }
                        
                        $conn->close();
                        ?>
                        <div class="mt-3">
                            <a href="insert_student.php" class="btn btn-primary">Go to Insert Student Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>