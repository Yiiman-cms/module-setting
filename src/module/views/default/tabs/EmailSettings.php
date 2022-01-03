<?php
/**
 * @var \YiiMan\Setting\module\components\Options     $options
 * @var                       \yii\widgets\ActiveForm $form
 * @var                       \yii\base\DynamicModel  $model
 */

use YiiMan\widgetToggle\ToggleWidget;

?>
<div class="tab-pane" id="EmailSettings">
    <div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
        <?php
        //			Email
        if (class_exists(YiiMan\LibEmail\lib\Email::className())) {
        ?>
        <div class="card" style="margin-top: 20px">
            <h3><?= Yii::t('settings', 'Email Settings') ?></h3>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'emailServer';

                    $model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email server'));
                    ?>

                </div>

                <div class="col-md-6">
                    <?php
                    $attr = 'emailPort';

                    $model->addRule([$attr], 'required');
                    $model->addRule([$attr], 'integer');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email port'));
                    ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $attr = 'emailUsername';
                    $model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email username'));
                    ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $attr = 'emailPassword';
                    $model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email password'));
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'loginMailAddress';

                    $model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t(
                        'settings',
                        'login mail address'));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

