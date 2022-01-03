<?php
	
	namespace YiiMan\Setting\widgets;
	
	use Yii;
	use yii\base\Component;
	use yii\helpers\Html;
    use YiiMan\Setting\module\components\Options;


    class FieldRender extends Component {
		const TYPE_TEXT_AREA = 'TEXT_AREA';
		const TYPE_TEXT_INPUT = 'TEXT';
		const TYPE_RADIO_BUTTON_IMAGE = 'RADIO_IMAGE';
		
		public static function FieldsRender( $items ) {
			
			$html = '';
			$html.=self::js();
			$html.=self::css();
			$options = new Options();
			
			foreach ( $items as $item ) {
				if ( empty( $item['type'] ) ) {
					$item['type'] = self::TYPE_TEXT_INPUT;
				}
				$id    = $item['name'];
				$label = $item['label'];
				if ( empty( $item['hint'] ) ) {
					$hint = '';
				} else {
					$hint = $item['hint'];
				}
				if ( ! empty( $item['required'] ) ) {
					$req = 'required="required"';
				} else {
					$req = '';
				}
				$html .= '
<div class="form-group">
				<label for="' . $id . '" class="col-sm-3 control-label">' . $label . '</label>
				<div class="col-md-6">
';
				
				switch ( $item['type'] ) {
					case self::TYPE_TEXT_AREA:
						$html .= '<textarea type="text" name="' . $id . '" id="' . $id . '" class="form-control" ' . $req . '>' . $options->{$id} . '</textarea>';
						break;
					case self::TYPE_TEXT_INPUT :
						$html .= '<input type="text" name="' . $id . '" id="' . $id . '" class="form-control"
					       value="' . $options->{$id} . '"
					       title="" ' . $req . '>';
						break;
					
					case self::TYPE_RADIO_BUTTON_IMAGE:
						
						
						$html.= self::radioButtonImage( $item['items'] , $item['name'] );
						
						
						break;
					
				}
				$html .= '
					</div>
				<label for="' . $id . '" class="col-sm-3 control-label">' . $hint . '</label>
			</div>
				';
			}
			
			
			return $html;
		}
		
		
		public static function radioButtonImage( $item , $name ) {
			if (!defined( self::TYPE_RADIO_BUTTON_IMAGE)){
				define( self::TYPE_RADIO_BUTTON_IMAGE , true);
			}
			$html = '';
			
			foreach ( $item as $radio ) {
				$html .= '<div class="col-md-6 box"><label class="btn btn-primary"><img src="' . $radio['img'] . '" alt="..." class="img-thumbnail img-check"><input type="radio" name="' . $name . '" id="item4" value="' . $radio['value'] . '" class="hidden" autocomplete="off"></label></div>
				';
			}
			
			return $html;
		}
		
		
		public static function js(){
			$js='<script>';
			if (!defined( self::TYPE_RADIO_BUTTON_IMAGE)){
				$js.=<<<JS
$(document).ready(function(e){
   
			$('.img-check').click(function(e) {
        $('.img-check').not(this).removeClass('check')
    		.siblings('input').prop('checked',false);
    	$(this).addClass('check')
            .siblings('input').prop('checked',true);
    });
			
	});
JS;
			}
			
			
			
			
			$js.='</script>';
			return $js;
		}
		
		
		public static function css(){
			$css='<style>';
			if (!defined( self::TYPE_RADIO_BUTTON_IMAGE)){
				$css.=<<<CSS
				.check{
					    opacity:0.5;
						color:#996;
					}
				.box{
				    margin-bottom:5px;
				}
CSS;

			}
			
			
			$css.='</style>';
			return $css;
		}
	}
