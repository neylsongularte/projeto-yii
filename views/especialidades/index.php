<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>

<h1>Especialidades</h1>
<hr>

<?= Html::a('Nova Especialidade', ['create'], ['class' => 'btn btn-success']) ?>

<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sigla</th>
            <th>Especialidade</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($especialidades as $especialidade): ?>
            <tr>
                <td><?= Html::encode("{$especialidade->sigla}") ?></td>
                <td><?= Html::encode("{$especialidade->descricao}") ?></td>
                <td>
                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['edit', 'id' => $especialidade->especialidade_id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $especialidade->especialidade_id], ['class' => 'btn btn-danger']) ?>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php if (!$especialidades): ?>
            <tr>
                <td colspan="3" class="text-center">Nenhum registro encontrado</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?= LinkPager::widget(['pagination' => $paginacao]) ?>
