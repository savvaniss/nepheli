<?php require 'head.php'; ?>

<h2>Check Blockchain Validity</h2>

<?php if (isset($data['message'])): ?>
    <div class="alert alert-info"><?php echo $data['message']; ?></div>
<?php else: ?>
    <p>Failed to check blockchain validity.</p>
<?php endif; ?>

<?php require 'tail.php'; ?>