<?php

/* @var $this yii\web\View */
/* @var $data array */
?>
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment №</th>
                <th>Payment date</th>
                <th>Payment value</th>
                <th>Percent value</th>
                <th>Credit body value</th>
                <th>Credit body remainder</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $index => $values) : ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $values['paymentDate'] ?></td>
                <td><?= $values['payment'] ?></td>
                <td><?= $values['percentValue'] ?></td>
                <td><?= $values['bodyValue'] ?></td>
                <td><?= $values['remainderBody'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
