<?php
include_once XOOPS_ROOT_PATH.'/class/xoopsform/themeform.php';
class SmartProfileForm extends XoopsThemeForm{


	function renderValidationJS( $withtags = true ) {
		$js = "";
		if ( $withtags ) {
			$js .= "\n<!-- Start Form Validation JavaScript //-->\n<script type='text/javascript'>\n<!--//\n";
		}
		$myts =& MyTextSanitizer::getInstance();
		$formname = $this->getName();
		$js .= "function xoopsFormValidate_{$formname}(myform) {";
		// First, output code to check required elements
		$elements = $this->getRequired();
		foreach ( $elements as $elt ) {
			$eltname    = $elt->getName();
			$eltcaption = trim( $elt->getCaption() );
			$eltmsg = empty($eltcaption) ? sprintf( _FORM_ENTER, $eltname ) : sprintf( _FORM_ENTER, $eltcaption );
			$eltmsg = str_replace('"', '\"', stripslashes( $eltmsg ) );
			$js .= "if ( myform.{$eltname}.value == \"\" ) "
				. "{ window.alert(\"{$eltmsg}\"); myform.{$eltname}.focus(); return false; }\n";
		}
		// Now, handle custom validation code
		$elements = $this->getElements( true );
		foreach ( $elements as $elt ) {
			if ( method_exists( $elt, 'renderValidationJS' ) ) {
				if ( $eltjs = $elt->renderValidationJS() ) {
					$js .= $eltjs . "\n";
				}
			}
		}
		$js .= "return true;\n}\n";
		if ( $withtags ) {
			$js .= "//--></script>\n<!-- End Form Vaidation JavaScript //-->\n";
		}
		return $js;
	}


}
?>