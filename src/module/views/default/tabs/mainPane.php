<?php
/**
 * @var \YiiMan\Setting\module\components\Options $options
 * @var                       \yii\widgets\ActiveForm $form
 * @var                       \yii\base\DynamicModel $model
 */

use YiiMan\Setting\module\widgets\ImageField;

?>
<div class="tab-pane active" id="mainPane">
    <div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
        <div class="card" style="margin-top: 20px">
            <h3><?= Yii::t('settings', 'Main Site Settings') ?></h3>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <?php ImageField::run($form, $model, 'logo', 'لوگوی سایت را اینجا وارد کنید') ?>
                </div>

            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-4">
                    <?= $form->field($model, 'language')
                        ->dropDownList(

                            [
                                'ar-AR' => 'عربی',
                                'en-US' => 'English',
                                'fa-IR' => 'فارسی'
                            ]
                        )
                        ->label(Yii::t('settings', 'select system language'))
                        ->hint(
                            Yii::t(
                                'settings'
                                ,
                                'زبان پنل ادمین را تنظیم کنید'
                            )
                        )->label(
                            Yii::t(
                                'settings',
                                'system language'
                            )
                        );
                    ?>
                </div>

                <div class="col-md-8">
                    <?php
                    $attr = 'siteTitle';
                    $model->addRule([$attr], 'required');
                    $model->addRule([$attr], 'string', ['max' => 20]);
                    echo $form->field($model, $attr)->textInput()->hint(
                        Yii::t('settings', 'Enter Site Title. This Title Will Be Show On Browser Tab')
                    );
                    ?>
                </div>

            </div>

        </div>
    </div>
</div>
