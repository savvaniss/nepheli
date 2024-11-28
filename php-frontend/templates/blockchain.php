<?php require 'head.php'; ?>

<h2>Blockchain</h2>

<?php if (isset($data['chain'])): ?>
    <p>Total Blocks: <?php echo $data['length']; ?></p>

    <?php foreach ($data['chain'] as $block): ?>
        <div class="card mb-3">
            <div class="card-header">
                Block #<?php echo $block['index']; ?>
            </div>
            <div class="card-body">
                <p><strong>Timestamp:</strong> <?php echo $block['timestamp']; ?></p>
                <p><strong>Proof:</strong> <?php echo $block['proof']; ?></p>
                <p><strong>Previous Hash:</strong> <?php echo $block['previous_hash']; ?></p>
                <h5>Transactions:</h5>
                <?php if (count($block['transactions']) > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($block['transactions'] as $tx): ?>
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
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Failed to fetch blockchain data.</p>
<?php endif; ?>
<?php require 'tail.php'; ?>