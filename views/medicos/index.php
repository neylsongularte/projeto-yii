<?php
    use Yii;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>

<h1>Médicos</h1>
<hr>

<?= Html::beginForm(['medicos/index'], 'get') ?>

<div class="row">
    <div class="col-md-5">
        <?= Html::input('text', 'busca', Yii::$app->request->get('busca', ''), ['class' => 'form-control', 'placeholder' => 'Digite o nome do médico']) ?>
    </div>
    <div class="col-md-7">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?= Html::endForm() ?>

<br>

<?= Html::a('Novo Médico', ['create'], ['class' => 'btn btn-success']) ?>

<br>
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>CRM</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Especialidade</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($medicos as $medico): ?>
            <tr>
                <td><?= Html::encode("{$medico->nome}") ?></td>
                <td><?= $medico->sexoFormatado ?></td>
                <td><?= Html::encode("{$medico->crm}") ?></td>
                <td><?= Html::encode("{$medico->cpf}") ?></td>
                <td><?= Html::encode("{$medico->email}") ?></td>
                <td><?= Html::encode($medico->especialidade ? $medico->especialidade->label : '') ?></td>
                <td>
                    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['edit', 'id' => $medico->medico_id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $medico->medico_id], ['class' => 'btn btn-danger']) ?>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php if (!$medicos): ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum registro encontrado</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?= LinkPager::widget(['pagination' => $paginacao]) ?>
