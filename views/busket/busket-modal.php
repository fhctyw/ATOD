<?php if(!empty($session['busket'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Картинка</th>
                    <th>Назва</th>
                    <th>Кількість</th>
                    <th>Ціна</th>
                    <th><i class="fa-solid fa-xmark" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($session ['busket'] as $id=>$item):?>
                <tr>
                    <td><?= $item['img']?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><span data-id="<?= $id?>" class="gfa-solid fa-x text-danger del-item" aria-hidden="true"></span></td>
                 </tr>
            <?php endforeach?>
            <tr>
                <td colspan="4">Всього</td>
                <td><?= $session['busket.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">На суму:</td>
                <td><?= $session['busket.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <h3>Корзина пуста</h3>
        <?php endif;?>