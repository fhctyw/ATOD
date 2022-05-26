<?php foreach($build->parts as $part): ?>
    <p><?= $part->getPart()->product_name ?></p>
<?php endforeach; ?>