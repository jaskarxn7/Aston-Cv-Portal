<?php 
require_once 'config.php'; 
require_once 'includes/header.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM cvs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>
<h2 class="mb-4 text-center">Login to AstonCV</h2>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>