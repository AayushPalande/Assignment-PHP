<?php
session_start();
if (!isset($_SESSION['report'])) {
    echo "No report data found.";
    exit();
}

$report = $_SESSION['report'];

// Function to calculate grade based on percentage
function calculateGrade($percentage) {
    if ($percentage >= 75) {
        return "Distinction";
    } elseif ($percentage >= 60) {
        return "First Class";
    } elseif ($percentage >= 33) {
        return "Pass";
    } else {
        return "Fail";
    }
}

$grade = calculateGrade($report['percentage']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .report-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }
        .report-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-header h1 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 5px;
        }
        .report-header p {
            font-size: 18px;
            margin: 5px 0;
        }
        .student-details {
            margin-bottom: 20px;
        }
        .student-details table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }
        .student-details th,
        .student-details td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        .grade-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .grade {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .remarks {
            margin-bottom: 20px;
            text-align: center;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="report-card">
            <div class="report-header">
                <h1>Student Report Card</h1>
                <p>Academic Year: 2024-2025</p>
            </div>
            
            <div class="student-details">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Student ID</th>
                            <td><?= htmlspecialchars($report['student_id']) ?></td>
                            <th scope="row">Name</th>
                            <td><?= htmlspecialchars($report['first_name'] . ' ' . $report['last_name']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Batch</th>
                            <td><?= htmlspecialchars($report['batch']) ?></td>
                            <th scope="row">Email</th>
                            <td><?= htmlspecialchars($report['email']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="student-details">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">English</th>
                            <td><?= htmlspecialchars($report['english']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Hindi</th>
                            <td><?= htmlspecialchars($report['hindi']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Math</th>
                            <td><?= htmlspecialchars($report['math']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Science</th>
                            <td><?= htmlspecialchars($report['science']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">History</th>
                            <td><?= htmlspecialchars($report['history']) ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Geography</th>
                            <td><?= htmlspecialchars($report['geography']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="grade-container">
                <p class="grade">Grade: <?= htmlspecialchars($grade) ?></p>
            </div>
            
            <div class="remarks">
                <p>Remarks: <?= htmlspecialchars($report['remarks']) ?></p>
            </div>
            
            <div class="button-container">
                <form action="send_email.php" method="post">
                    <button type="submit" class="btn btn-primary" name="send_email">Send Report to Email</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
