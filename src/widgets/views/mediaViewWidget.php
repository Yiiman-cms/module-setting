<?php
	
	/**
	 * @var $this          \yii\web\View
	 * @var $id            string
	 * @var $label         string
	 * @var $name          string
	 * @var $value         string
	 * @var $attribute     string
	 * @var $model         \yii\db\ActiveRecord
	 */
	

	use YiiMan\Setting\assets\LightBoxAssets;
	use yii\bootstrap\Modal;
	use yii\helpers\BaseHtml;
	use yii\web\View;
	$id=uniqid();
	$modal     = $id . 'Modal';
	$idWidget  = $id . 'Widget';
	$UploadUrl = Yii::$app->Options->UploadUrl;
	$inputId   = BaseHtml::getInputId( $model , $attribute );
	LightBoxAssets::register( $this );
	$this->registerJs( 'var selectMediaArray=\'\';' , View::POS_HEAD );
	
	$js = <<<JS
	$(document).ready(function() {
	      lightGallery(document.getElementById('lightgallery$id'));
	});
JS;
	$this->registerJs( $js , View::POS_END );
?>


<?php
	if ( ! function_exists( 'galEcho' ) ) {
		function galEcho( $url ) {
			?>
			<li class="col-xs-6 col-sm-4 col-md-3" data-src="<?= $url ?>" data-sub-html="" data-pinterest-text=""
			    data-tweet-text="">
				<a href="">
					<img class="img-responsive" src="<?= $url ?>">
				</a>
			</li>
			<?php
		}
	}
	if ( ! empty( Yii::$app->Options->{$attribute} ) ) {
		?>
		<div class="demo-gallery">
			<ul id="lightgallery<?= $id ?>" class="list-unstyled row">
				<?php
					galEcho( Yii::$app->Options->{$attribute});
				?>
			</ul>
		</div>
		<?php
	}
?>



