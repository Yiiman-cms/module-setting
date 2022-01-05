<?php
/**
 * @var \system\modules\setting\components\Options $options
 * @var                       \yii\widgets\ActiveForm $form
 * @var                       \yii\base\DynamicModel $model
 */

use system\modules\setting\widgets\ImageField;

?>
<div class="tab-pane" id="code">
    <div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
        <div class="card" style="margin-top: 20px">
            <h3><?= Yii::t('settings', 'شخصی سازی استایل') ?></h3>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <?php
                    $attr = 'FrontendCustomCss';

                    $model->addRule([$attr], 'string');
                    echo $form->field($model, $attr)->widget(\YiiMan\YiiBasics\widgets\CodeMirrorSimple\CodeMirrorSimpleWidget::className()
                        ,
                        [
                            'modes' => [\YiiMan\YiiBasics\widgets\CodeMirrorSimple\CodeMirrorSimpleWidget::MODE_CSS]
                        ]
                    )->label('استایل شخصی سازی شده');
                    ?>
                    <p>
                        کدهای شخصی سازی شده ی استایل خود را اینجا وارد کنید.
                    </p>
                </div>

            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <?php
                    $attr = 'FrontendCustomJs';

                    $model->addRule([$attr], 'string');
                    echo $form->field($model, $attr)->widget(\YiiMan\YiiBasics\widgets\CodeMirrorSimple\CodeMirrorSimpleWidget::className()
                        ,
                        [
                            'modes' => [\YiiMan\YiiBasics\widgets\CodeMirrorSimple\CodeMirrorSimpleWidget::MODE_JAVASCRIPT]
                        ]
                    )->label('کدهای جاوا اسکریپت شخصی');
                    ?>
                    <p>
                        کدهای شخصی سازی شده ی جاوا اسکریپت خود را اینجا وارد کنید.
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
