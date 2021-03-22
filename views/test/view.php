<div class="col-md-12">
    <h1>Работа с моделями!</h1>
    <!-- все имена столбцов таблицы -  -->
    <?php //debug($model->getAttributes()); ?>
        <table class="table table-light">
            <?php foreach ($countries as $country) : ?>
            <tr>
                <td><?= $country['code']; ?></td>
                <td><?= $country['name']; ?></td>
                <td><?= $country['population']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php  ?>
</div>