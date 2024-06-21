<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and validate form data
    $student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $batch = filter_input(INPUT_POST, 'batch', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $english = filter_input(INPUT_POST, 'english', FILTER_VALIDATE_FLOAT);
    $hindi = filter_input(INPUT_POST, 'hindi', FILTER_VALIDATE_FLOAT);
    $math = filter_input(INPUT_POST, 'math', FILTER_VALIDATE_FLOAT);
    $science = filter_input(INPUT_POST, 'science', FILTER_VALIDATE_FLOAT);
    $history = filter_input(INPUT_POST, 'history', FILTER_VALIDATE_FLOAT);
    $geography = filter_input(INPUT_POST, 'geography', FILTER_VALIDATE_FLOAT);
    $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_STRING);

    if ($student_id === false || $first_name === false || $last_name === false || 
        $english === false || $hindi === false || $math === false || 
        $science === false || $history === false || $geography === false) {
        echo 'Error: All fields are required.';
        exit();
    }

    // Calculate total and percentage
    $total = $english + $hindi + $math + $science + $history + $geography;
    $percentage = ($total / 600) * 100;

    // Determine grade
    if ($percentage >= 75) {
        $grade = "Distinction";
    } elseif ($percentage >= 60) {
        $grade = "First Class";
    } elseif ($percentage >= 33) {
        $grade = "Pass";
    } else {
        $grade = "Fail";
    }

    // Create report array
    $report = [
        'student_id' => $student_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'batch' => $batch,
        'email' => $email,
        'english' => $english,
        'hindi' => $hindi,
        'math' => $math,
        'science' => $science,
        'history' => $history,
        'geography' => $geography,
        'total' => $total,
        'percentage' => $percentage,
        'grade' => $grade,
        'remarks' => $remarks
    ];

    // Redirect to display_report.php with report data
    session_start();
    $_SESSION['report'] = $report;
    header('Location: display_report.php');
    exit();
} else {
    http_response_code(405);
    echo 'Method Not Allowed: Only POST requests are allowed.';
}
?>
