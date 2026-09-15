<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Insert Student Record</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $fullName = trim($_POST["full_name"]);
                            $email = trim($_POST["email"]);
                            $department = trim($_POST["department"]);
                            
                            $conn = new mysqli("localhost", "root", "", "wis_lab");
                            
                            if ($conn->connect_error) {
                                echo '<div class="alert alert-danger">Connection failed: ' . $conn->connect_error . '</div>';
                            } else {
                                if (empty($fullName) || empty($email) || empty($department)) {
                                    echo '<div class="alert alert-danger">All fields are required!</div>';
                                } else {
                                    $stmt = $conn->prepare("INSERT INTO students (full_name, email, department) VALUES (?, ?, ?)");
                                    $stmt->bind_param("sss", $fullName, $email, $department);
                                    
                                    if ($stmt->execute()) {
                                        echo '<div class="alert alert-success">Student added successfully!</div>';
                                    } else {
                                        echo '<div class="alert alert-danger">Error inserting record: ' . $stmt->error . '</div>';
                                    }
                                    $stmt->close();
                                }
                                $conn->close();
                            }
                        }
                        ?>
                        <form method="POST" id="studentForm">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" id="department" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Student</button>
                            <button type="reset" class="btn btn-secondary">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>