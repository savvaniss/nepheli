<?php require 'head.php'; ?>

<h2>Add New Transaction</h2>

<?php if ($message): ?>
    <div class="alert alert-info"><?php echo $message; ?></div>
<?php endif; ?>

<form method="POST" action="/transactions">
    <div class="mb-3">
        <label for="sender" class="form-label">Sender Address</label>
        <input type="text" id="sender" name="sender" class="form-control">
    </div>
    <div class="mb-3">
        <label for="receiver" class="form-label">Receiver Address</label>
        <input type="text" id="receiver" name="receiver" class="form-control">
    </div>
    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" step="0.01" id="amount" name="amount" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add Transaction</button>
</form>
<?php require 'tail.php'; ?>