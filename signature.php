<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['submit1'])) {
    $name1 = $_POST['name1'];
    $signatureData1 = $_POST['signatureData1'];
    // Process the form 1 submission data as needed
    // Example: Store the data in a database, write to a file, etc.
  }

  // ... Handling form submissions for other forms ...

  // Redirect to prevent form resubmission
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}
?>
