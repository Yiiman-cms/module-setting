<?php
/**
 * @var \YiiMan\Setting\module\components\Options $options
 * @var                       \yii\widgets\ActiveForm $form
 * @var                       \yii\base\DynamicModel $model
 */
?>
<div class="tab-pane" id="FTPFileSettings">
    <div style="margin: -10px -12.5px -10px -10px;padding: 10px;">
        <div class="card" style="margin-top:20px">
            <h3><?= Yii::t('settings', 'تنظیمات آدرس دهی آپلود و دانلود فایل ها') ?></h3>
            <p><?= Yii::t('settings', 'اینجا میتوانید پوشه های آپلود و دانلود فایل را تعیین کنید') ?> </p>
            <p style="color: darkred;"><?= Yii::t(
                    'settings',
                    'این تنظیمات بر روی نمایش همه ی فایل های سایت در ادمین و فرانت اند تاثیر میگذارد'
                ) ?></p>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $id = 'UploadDir';
                        $defaultUPDir = realpath($_ENV['uploadDir'] );

                        ?>
                        <label for="<?= $id ?>" class="col-sm-2 control-label"><?= Yii::t(
                                'settings',
                                'دایرکتوری آ‍پلود فایل ها'
                            ) ?></label>
                        <div class="col-md-6">
                            <input type="text" name="<?= $id ?>" id="<?= $id ?>" class="form-control"
                                   title=""
                                   value="<?= empty($options->{$id}) ? $defaultUPDir : $options->{$id} ?>">
                        </div>
                        <span>
                               <?= Yii::t('settings', 'آدرس پیش فرض سیستم:') ?>
                            <br>
                                <?= realpath($_ENV['uploadDir']) ?>
                            <p>به کوچک و بزرگ بودن حروف دقت کنید، چنانچه در هاست از کد استفاده میکنید، به کوچک و بزرگی نام درایو نیز دقت نمایید</p>
                        </span>
                    </div>
                </div>

            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $id = 'UploadUrl';
                        $defaultUPDir = realpath(YII_APP_BASE_PATH . '/../../public_html/upload');
                        ?>
                        <label for="<?= $id ?>" class="col-sm-2 control-label"><?= Yii::t(
                                'settings',
                                'لینک پوشه ی آپلود'
                            ) ?></label>
                        <div class="col-md-6">
                            <input type="text" name="<?= $id ?>" id="<?= $id ?>" class="form-control"
                                   title=""
                                   value="<?= empty($options->{$id}) ? '/upload' : $options->{$id} ?>">
                        </div>
                        <span>
	                                       <?= Yii::t('settings', ' لینک پیش فرض:') ?>
                                        <br>
											<?= '/upload' ?>
                                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $id = 'URL';
                        $defaultUPDir = 'https://' . $_SERVER["HTTP_HOST"];

                        ?>
                        <label for="<?= $id ?>" class="col-sm-2 control-label"><?= Yii::t(
                                'settings',
                                'Site Full URL'
                            ) ?></label>
                        <div class="col-md-6">
                            <input type="text" name="<?= $id ?>" id="<?= $id ?>" class="form-control"
                                   title=""
                                   value="<?= empty($options->{$id}) ? $defaultUPDir : $options->{$id} ?>">
                        </div>
                        <span>
	                                       <?= Yii::t('settings', 'Default Link:') ?>
                                        <br>
											<?= $defaultUPDir ?>
                                        </span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        $id = 'BackendUrl';
                        $defaultUPDir = Yii::$app->urlManager->createAbsoluteUrl('');

                        ?>
                        <label for="<?= $id ?>" class="col-sm-2 control-label"><?= Yii::t(
                                'settings',
                                'Backend Full URL'
                            ) ?></label>
                        <div class="col-md-6">
                            <input type="text" name="<?= $id ?>" id="<?= $id ?>" class="form-control"
                                   title=""
                                   value="<?= empty($options->{$id}) ? $defaultUPDir : $options->{$id} ?>">
                        </div>
                        <span>
	                                        <?= Yii::t('settings', 'Default Link:') ?>
                                        <br>
											<?= $defaultUPDir ?>
                                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
