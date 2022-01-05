<?php
/**
 * @var \system\modules\setting\components\Options $options
 * @var                       \yii\widgets\ActiveForm $form
 * @var                       \yii\base\DynamicModel $model
 */

use YiiMan\YiiBasics\widgets\toggle\ToggleWidget;

?>
<style>
    .parameters-box {
        background: #d1d4dd40;
        border-radius: 5px;
        padding: 10px;
    }

    .parameters-box ul {
        display: inline-flex;
        list-style: none;
        flex-wrap: wrap;
    }

    .parameters-box li {
        background: #c1c4ee;
        margin: 4px;
        padding: 3px;
        border-radius: 5px;
        user-select: all;
    }
</style>
<div class="tab-pane" id="EmailSettings">
    <div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
        <?php
        //			Email
        if (class_exists('YiiMan\YiiBasics\lib\email')) {
        ?>
        <div class="card" style="margin-top: 20px">
            <h3><?= Yii::t('settings', 'Email Settings') ?></h3>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'emailProtocol';

                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->dropDownList(
                        [
                            'Swift_SmtpTransport' => 'SMTP',
                            'Swift_SendmailTransport' => 'Send Mail transport',
                            'Swift_LoadBalancedTransport' => 'Load balance',
                            'Swift_FailoverTransport' => 'Failover'
                        ]
                    )
                        ->label(Yii::t('setting', 'Email sending protocol'))
                    ->hint(\Yii::t('setting','
                    
    (Send Mail transport): Communicates with a locally installed sendmail executable (Linux/UNIX). Quick time-to-run; Provides less-accurate feedback than SMTP; Requires sendmail installation;
    (Load balance): Cycles through a collection of the other Transports to manage load-reduction. Provides graceful fallback if one Transport fails (e.g. an SMTP server is down); Keeps the load on remote services down by spreading the work;
    (Failover): Works in conjunction with a collection of the other Transports to provide high-availability. Provides graceful fallback if one Transport fails (e.g. an SMTP server is down).

                    '))
                    ;
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'emailServer';

                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email server'));
                    ?>

                </div>

                <div class="col-md-6">
                    <?php
                    $attr = 'emailPort';

                    //$model->addRule([$attr], 'required');
                    $model->addRule([$attr], 'integer');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email port'));
                    ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $attr = 'emailUsername';
                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email username'));
                    ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $attr = 'emailPassword';
                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'email password'));
                    ?>
                </div>

                 <div class="col-md-6">
                    <?php
                    $attr = 'adminMail';
                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t('settings', 'Admin Email Address'))->hint('for get System alerts');
                    ?>
                </div>



            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'loginMailAddress';

                    //$model->addRule([$attr], 'required');
                    echo $form->field($model, $attr)->textInput()->label(Yii::t(
                        'settings',
                        'login mail address'));
                    ?>

                </div>
            </div>
            <?php
            //            'adminEmail' => 'admin@example.com',
            //    'supportEmail' => 'support@example.com',
            //    'senderEmail' => 'noreply@example.com',
            //    'senderName' => 'Example.com mailer',
            //    'user.passwordResetTokenExpire' => 3600,
            //    'user.passwordMinLength' => 8,
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $attr = 'senderName';
                    //$model->addRule([$attr], 'required');
                    $model->addRule([$attr], 'string');

                    echo $form->field($model, $attr)->textInput()->label(Yii::t(
                        'settings',
                        'Sender name'));
                    ?>

                </div>
                <div class="col-md-6">
                    <?php
                    $attr = 'senderEmail';
                    //$model->addRule([$attr], 'required');
                    $model->addRule([$attr], 'email');

                    echo $form->field($model, $attr)->textInput()->label(Yii::t(
                        'settings',
                        'Sender email'));
                    ?>

                </div>

            </div>

        </div>
    </div>
    <?php
    }
    ?>
</div>

