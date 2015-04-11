<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientUser */
/* @var $form ActiveForm */
?>
<div class="manage_clients">

    <?php $form = ActiveForm::begin(); ?>

    Hi from my first form!

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- manage_clients -->
