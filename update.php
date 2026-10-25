<?php 
require_once 'config.php'; 
require_once 'includes/header.php'; 

if(!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit; 
}

$user_id = $_SESSION['user_id'];

// Load current CV data
$stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profile     = trim($_POST['profile']);
    $education   = trim($_POST['education']);
    $links       = trim($_POST['url_links']);
    $keyprog     = trim($_POST['keyprogramming']);

    // Update the CV
    $stmt = $pdo->prepare("UPDATE cvs SET profile=?, education=?, URLlinks=?, keyprogramming=? WHERE id=?");
    $stmt->execute([$profile, $education, $links, $keyprog, $user_id]);

    $success = "Your CV has been updated successfully!";

    // Reload the updated data
    $stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
}
?>
<h2>Update Your CV</h2>

<?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

<form method="POST">
    <div class="mb-3">
        <label>Key Programming Languages</label>
        <input type="text" name="keyprogramming" class="form-control" value="<?= htmlspecialchars($user['keyprogramming'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label>Profile / About You</label>
        <textarea name="profile" class="form-control" rows="5"><?= htmlspecialchars($user['profile'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label>Education</label>
        <textarea name="education" class="form-control" rows="4"><?= htmlspecialchars($user['education'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label>Links (GitHub, LinkedIn, etc.)</label>
        <textarea name="url_links" class="form-control" rows="3"><?= htmlspecialchars($user['URLlinks'] ?? '') ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<?php require_once 'includes/footer.php'; ?>