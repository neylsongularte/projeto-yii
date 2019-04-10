<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'sexo')->radioList(['M' => 'Masculino', 'F' => 'Feminino']) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'crm') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'cpf') ?>
        </div>
    </div>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'especialidade_id')->label('Especialidade que atua')->dropdownList($opcoesDeEspecialidade, ['prompt' => 'Selecione uma Especialidade'])
 ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

<?php ActiveForm::end(); ?>
