<?php

	use YiiMan\Setting\module\trigger\Triggers;
	use YiiMan\widgetMapInput\GMapInputWidget;
	use YiiMan\widgetToggle\ToggleWidget;
	use yii\base\Event;
	use YiiMan\Setting\module\Module;
	use yii\widgets\ActiveForm;

	/**
	 * @var yii\web\View                                $this
	 * @var yii\data\ActiveDataProvider                 $dataProvider
	 * @var \YiiMan\Setting\module\components\Options  $options
	 */
	
	$this->title                   = Module::t( 'settings' , 'Settings' );
	$this->params['breadcrumbs'][] = $this->title;
	$js                            = <<<JS

JS;
	
	
	$form = ActiveForm::begin( [ 'options' => [ 'enctype' => 'multipart/form-data' ] ] );
?>
<style>
	
	#nav_tab {
		background: #ffffff61;
		border-radius: 5px 5px 0 0;
		padding: 11px;
	}
	
	ul .active.show,ul .nav-pills > li > a:hover,ul .nav-pills > li > a:focus {
		background-color: #402b2bba !important;
		box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(64, 50, 29, 0.4);
		margin-left: 10px;
		border-radius: 5px !important;
		color: white;
	}
	.nav-pills > li > a.active.show:hover {
		background-color: rgba(64, 32, 32, 0.7);
	}
	.nav > li > a:hover, .nav > li > a:focus {
		text-decoration: none;
		background-color: #fff0;
	}
	.togglebutton label {
		cursor: pointer;
		color: hsla(0, 5.9%, 3.3%, 0.67) !important;
		width: 65px !important;
		/* margin: 0; */
		/* padding: 0; */
		margin-top: 6px !important;
		height: 27px;
		border: solid 1px hsla(0, 0%, 0%, 0.06);
		padding: 7px 0 !important;
		border-radius: 5px;
		/* padding-right: 0px; */
		float: none;
	}
</style>
<div class="setting-index">
	<!--	<form action="" method="post" enctype="multipart/form-data">-->
	
	<input type="hidden" name="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
	<div class="card-content ">
		<ul id="nav_tab" class="nav nav-pills nav-pills-warning">
			<li>
				<a class="active show" href="#mainPane" data-toggle="tab"><?= Yii::t( 'settings' , 'Site Settings') ?></a>
			</li>
			<li>
				<a href="#EmailSettings" data-toggle="tab"><?= Yii::t( 'settings' , 'Mail settings') ?></a>
			</li>
			<li>
				<a href="#sms" data-toggle="tab"><?= Yii::t( 'settings' , 'sms settings') ?></a>
			</li>
<!--			<li>-->
<!--				<a href="#Personalize" data-toggle="tab">--><?//= Yii::t( 'settings' , 'Site Personalise') ?><!--</a>-->
<!--			</li>-->
<!--			<li>-->
<!--				<a href="#FTPFileSettings" data-toggle="tab">--><?//= Yii::t( 'settings' , 'Media Settings') ?><!--</a>-->
<!--			</li>-->
			<li>
				<a href="#style" data-toggle="tab"><?= Yii::t( 'settings' , 'Style') ?></a>
			</li>
			
			<?php

            Event::trigger( Triggers::className() , Triggers::AFTER_SETTINGS_TAB ) ?>
		</ul>
		<div class="tab-content">
			<?= $this->render( 'tabs/mainPane' , [ 'options' => $options , 'form' => $form , 'model' => $model ] ) ?>
			<?= $this->render(
				'tabs/EmailSettings' ,
				[ 'options' => $options , 'form' => $form , 'model' => $model ]
			) ?>
			<?= $this->render(
				'tabs/telegram' ,
				[ 'options' => $options , 'form' => $form , 'model' => $model ]
			) ?>
			
			<?php
//            $this->render(
//				'tabs/FTPFileSettings' ,
//				[ 'options' => $options , 'form' => $form , 'model' => $model ]
//			)
            ?>
			<?= $this->render(
				'tabs/sms' ,
				[ 'options' => $options , 'form' => $form , 'model' => $model ]
			) ?>

			<?= $this->render(
				'tabs/style' ,
				[ 'options' => $options , 'form' => $form , 'model' => $model ]
			) ?>
			
			<?php

            Event::trigger( Triggers::className() , Triggers::AFTER_SETTINGS_TAB_CONTENT ) ?>
		</div>
	</div>
	<button type="submit" style="
position: fixed;
top: 91px;
left: 40px;
border-radius: 100px;
z-index: 99;
" class="btn btn-success"><?= Yii::t( 'settings' , 'Save settings') ?>
	</button>

</div>
<?php

	ActiveForm::end();
?>
