<!-- templates/mine.php -->
<?php require 'head.php'; ?>

<h2>Mine a New Block</h2>

<?php if (isset($data['message'])): ?>
    <div class="alert alert-info"><?php echo $data['message']; ?></div>
    <h3>New Block Details:</h3>
    <p><strong>Index:</strong> <?php echo $data['index']; ?></p>
    <p><strong>Timestamp:</strong> <?php echo $data['timestamp']; ?></p>
    <p><strong>Proof:</strong> <?php echo $data['proof']; ?></p>
    <p><strong>Previous Hash:</strong> <?php echo $data['previous_hash']; ?></p>
    <h5>Transactions:</h5>
    <?php if (count($data['transactions']) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['transactions'] as $tx): ?>
                    <tr>
                        <td><?php echo $tx['sender']; ?></td>
                        <td><?php echo $tx['receiver']; ?></td>
                        <td><?php echo $tx['amount']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No transactions in this block.</p>
    <?php endif; ?>
<?php else: ?>
    <p>Failed to mine a new block.</p>
<?php endif; ?>
<?php require 'tail.php'; ?>