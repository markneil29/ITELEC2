<?php
require_once 'authentication/admin-class.php';

$admin = new Admin();    
if (!$admin->isUserLoggedIn()) {
    $admin->redirect('../../');
}

$stmt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmt->execute(array(":id" => $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="page_css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($user_data['email']); ?></h1>
        </header>
        <main>
            <button class="signout-btn">
                <a href="authentication/admin-class.php?admin_signout">Sign Out</a>
            </button>
        </main>
    </div>
</body>
</html>
