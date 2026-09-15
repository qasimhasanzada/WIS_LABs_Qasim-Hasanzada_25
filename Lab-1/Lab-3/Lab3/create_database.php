<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create Database</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $databaseName = trim($_POST["database_name"]);
                            $conn = new mysqli("localhost", "root", "");
                            
                            if ($conn->connect_error) {
                                echo '<div class="alert alert-danger">Connection failed: ' . $conn->connect_error . '</div>';
                            } else {
                                if (!preg_match('/^[a-zA-Z0-9_]+$/', $databaseName)) {
                                    echo '<div class="alert alert-danger">Database name can only contain letters, numbers, and underscores.</div>';
                                } else {
                                    $sql = "CREATE DATABASE " . $databaseName;
                                    if ($conn->query($sql) === TRUE) {
                                        echo '<div class="alert alert-success">Database "' . $databaseName . '" created successfully!</div>';
                                    } else {
                                        echo '<div class="alert alert-danger">Error creating database: ' . $conn->error . '</div>';
                                    }
                                }
                                $conn->close();
                            }
                        }
                        ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="database_name" class="form-label">Database Name</label>
                                <input type="text" name="database_name" class="form-control" id="database_name" required pattern="[a-zA-Z0-9_]+" title="Only letters, numbers, and underscores allowed">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Database</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>