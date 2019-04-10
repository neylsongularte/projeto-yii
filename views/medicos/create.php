<?php

use yii\helpers\Html;
?>



<h1>Novo Médico</h1>

<hr>

<?= $this->render('_form', compact('model', 'opcoesDeEspecialidade')) ?>
