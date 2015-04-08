<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PackageService */

$this->title = Yii::t('app', 'Create Package Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Package Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="package-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
