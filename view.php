<?php 
require_once 'config.php'; 
require_once 'includes/header.php'; 

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = ?");
$stmt->execute([$id]);
$cv = $stmt->fetch();

if(!$cv) {
    echo "<div class='alert alert-danger'>CV not found!</div>";
    require 'includes/footer.php'; 
    exit;
}
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2><?= htmlspecialchars($cv['name']) ?></h2>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> <?= htmlspecialchars($cv['email']) ?></p>
                <p><strong>Key Programming Languages:</strong> <?= htmlspecialchars($cv['keyprogramming'] ?? 'Not specified') ?></p>
                <h5 class="mt-4">Profile</h5>
                <p><?= nl2br(htmlspecialchars($cv['profile'] ?? 'No profile added yet')) ?></p>
                <h5>Education</h5>
                <p><?= nl2br(htmlspecialchars($cv['education'] ?? 'Not provided')) ?></p>
                <h5>Links</h5>
                <p><?= nl2br(htmlspecialchars($cv['URLlinks'] ?? 'No links provided')) ?></p>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">← Back to All CVs</a>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>