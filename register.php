<?php 
require_once 'config.php'; 
require_once 'includes/header.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $keyprog = trim($_POST['keyprogramming']);

    if(strlen($pass) < 6) {
        $error = "Password must be at least 6 characters";
    } else {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO cvs (name, email, password, keyprogramming) VALUES (?, ?, ?, ?)");
        try {
            $stmt->execute([$name, $email, $hash, $keyprog]);
            $success = "Registration successful! <a href='login.php'>Login now</a>";
        } catch(Exception $e) {
            $error = "Email already exists";
        }
    }
}
?>
<h2 class="mb-4">Register for AstonCV</h2>
<?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
<form method="POST">
    <div class="mb-3"><label>Full Name</label><input type="text" name="name" class="form-control" required></div>
    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
    <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
    <div class="mb-3"><label>Key Programming Languages</label><input type="text" name="keyprogramming" class="form-control" placeholder="Python, JavaScript, PHP..." required></div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
<?php require_once 'includes/footer.php'; ?>