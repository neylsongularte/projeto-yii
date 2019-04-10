<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sigla') ?>

    <?= $form->field($model, 'descricao')->label('Especialidade') ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

<?php ActiveForm::end(); ?>
