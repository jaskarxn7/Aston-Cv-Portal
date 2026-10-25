<?php 
require_once 'config.php'; 
require_once 'includes/header.php'; 

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT id, name, email, keyprogramming FROM cvs";
if ($search) {
    $sql .= " WHERE name LIKE :search OR keyprogramming LIKE :search";
}
$sql .= " ORDER BY name";
$stmt = $pdo->prepare($sql);
if ($search) $stmt->execute(['search' => "%$search%"]);
else $stmt->execute();
$cvs = $stmt->fetchAll();
?>

<div class="hero text-center mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to AstonCV</h1>
        <p class="lead">Discover talented programmers from Aston University</p>
    </div>
</div>

<form method="GET" class="d-flex justify-content-center mb-5">
    <div class="input-group w-75">
        <input type="text" name="search" class="form-control form-control-lg" placeholder="Search by name or key language..." value="<?= htmlspecialchars($search) ?>">
        <button class="btn btn-primary btn-lg" type="submit">Search</button>
    </div>
</form>

<h2 class="text-center mb-4">Featured CVs (<?= count($cvs) ?>)</h2>
<div class="row">
    <?php if(empty($cvs)): ?>
        <p class="text-center">No CVs found. Register to add yours!</p>
    <?php else: foreach($cvs as $cv): ?>
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5><?= htmlspecialchars($cv['name']) ?></h5>
                <p class="text-muted"><?= htmlspecialchars($cv['email']) ?></p>
                <p><strong>Key Languages:</strong> <?= htmlspecialchars($cv['keyprogramming'] ?? 'Not specified') ?></p>
                <a href="view.php?id=<?= $cv['id'] ?>" class="btn btn-primary w-100">View Full CV</a>
            </div>
        </div>
    </div>
    <?php endforeach; endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>