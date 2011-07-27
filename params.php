<?php
/**
@version 1.0: mod_s5_image_and_content_fader
Author: Shape 5 - Professional Template Community
Available for download at www.shape5.com
*/

global $ICF_Values;
$ICF_Values = $instance;

function s5_ICF_get_option($opt_name,$demo=false, $shortname=null){
	global $ICF_Values;
	$opt_name = str_replace('xml_',THEME_NAME,$opt_name);
	if($shortname == null){$shortname = $opt_name;}
	if(!defined('_JEXEC')){$$opt_name = $ICF_Values["$opt_name"];$enable=get_option('demo_mode');}

	if($enable == '1' && $demo != false){
		if(isset($_GET[$shortname])||($_GET['reset']==1)){
			if($_GET[$shortname] != 'default'){
			$_SESSION[$shortname] = $_GET[$shortname];}
			if(($_GET[$shortname] == 'default')||($_GET['reset']==1)){
			unset($_SESSION[$shortname],$_GET[$shortname]);}
			}
		if(isset($_SESSION[$shortname])){
			$$opt_name = $_SESSION[$shortname];}
	}
	if($$opt_name==" " || strtolower($$opt_name)=="none"){$$opt_name=null;}
	return $$opt_name;

}



$jslibrary = s5_ICF_get_option( 'jslibrary' );
$s5_dropdowntext = s5_ICF_get_option( 's5_dropdowntext' );
$s5_hidecar = s5_ICF_get_option( 's5_hidecar' );
$s5_hidebut = s5_ICF_get_option( 's5_hidebut' );
$s5_hidetext = s5_ICF_get_option( 's5_hidetext' );
$s5_delay = s5_ICF_get_option( 's5_delay' );
if ($s5_hidecar == "falsee") {$s5_hidecar = "false";}
if ($s5_hidecar == "truee") {$s5_hidecar = "true";}
if ($s5_hidebut == "falsee") {$s5_hidebut = "false";}
if ($s5_hidebut == "truee") {$s5_hidebut = "true";}
if ($s5_hidetext == "falsee") {$s5_hidetext = "false";}
if ($s5_hidetext == "truee") {$s5_hidetext = "true";}
$jseffect = s5_ICF_get_option( 'jseffect',1,'ICF_Effect' );
$background_s5_iacf		= s5_ICF_get_option( 'background' );
$pretext_s5_iacf		= s5_ICF_get_option( 'pretext' );
$tween_time_s5_iacf	    = "0.5";
$height_s5_iacf		    = s5_ICF_get_option( 'height' );
$width_s5_iacf   		= s5_ICF_get_option( 'width' );
$picture1_s5_iacf		= s5_ICF_get_option( 'picture1' );
$picture1link_s5_iacf		= s5_ICF_get_option( 'picture1link' );
$picture1target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture2_s5_iacf		= s5_ICF_get_option( 'picture2' );
$picture2link_s5_iacf		= s5_ICF_get_option( 'picture2link' );
$picture2target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture3_s5_iacf		= s5_ICF_get_option( 'picture3' );
$picture3link_s5_iacf		= s5_ICF_get_option( 'picture3link' );
$picture3target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture4_s5_iacf		= s5_ICF_get_option( 'picture4' );
$picture4link_s5_iacf		= s5_ICF_get_option( 'picture4link' );
$picture4target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture5_s5_iacf		= s5_ICF_get_option( 'picture5' );
$picture5link_s5_iacf		= s5_ICF_get_option( 'picture5link' );
$picture5target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture6_s5_iacf		= s5_ICF_get_option( 'picture6' );
$picture6link_s5_iacf		= s5_ICF_get_option( 'picture6link' );
$picture6target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture7_s5_iacf		= s5_ICF_get_option( 'picture7' );
$picture7link_s5_iacf		= s5_ICF_get_option( 'picture7link' );
$picture7target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture8_s5_iacf		= s5_ICF_get_option( 'picture8' );
$picture8link_s5_iacf		= s5_ICF_get_option( 'picture8link' );
$picture8target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture9_s5_iacf		= s5_ICF_get_option( 'picture9' );
$picture9link_s5_iacf		= s5_ICF_get_option( 'picture9link' );
$picture9target_s5_iacf		= s5_ICF_get_option( 'picturetarget' );
$picture10_s5_iacf		= s5_ICF_get_option( 'picture10' );
$picture10link_s5_iacf		= s5_ICF_get_option( 'picture10link' );
$picture10target_s5_iacf	= s5_ICF_get_option( 'picturetarget' );
$display_time_s5_iacf   	= "10";

$title1	= s5_ICF_get_option( 'title1' );
$title2	= s5_ICF_get_option( 'title2' );
$title3	= s5_ICF_get_option( 'title3' );
$title4	= s5_ICF_get_option( 'title4' );
$title5	= s5_ICF_get_option( 'title5' );
$title6	= s5_ICF_get_option( 'title6' );
$title7	= s5_ICF_get_option( 'title7' );
$title8	= s5_ICF_get_option( 'title8' );
$title9	= s5_ICF_get_option( 'title9' );
$title10 = s5_ICF_get_option( 'title10' );




$picture1text_s5_iacf   	= s5_ICF_get_option( 'picture1text' );
$picture1spacing_s5_iacf   	= "12px";
$picture1textsize_s5_iacf   	= s5_ICF_get_option( 'picture1textsize' );
$picture1textcolor_s5_iacf   	= "ffffff";
$picture1textbg_s5_iacf   	= "333333";
$picture2text_s5_iacf   	= s5_ICF_get_option( 'picture2text' );
$picture2spacing_s5_iacf   	= "12px";
$picture2textsize_s5_iacf   	= s5_ICF_get_option( 'picture2textsize' );
$picture2textcolor_s5_iacf   	= "ffffff";
$picture2textbg_s5_iacf   	= "333333";
$picture3text_s5_iacf   	= s5_ICF_get_option( 'picture3text' );
$picture3spacing_s5_iacf   	= "12px";
$picture3textsize_s5_iacf   	= s5_ICF_get_option( 'picture3textsize' );
$picture3textcolor_s5_iacf   	= "ffffff";
$picture3textbg_s5_iacf   	= "333333";
$picture4text_s5_iacf   	= s5_ICF_get_option( 'picture4text' );
$picture4spacing_s5_iacf   	= "12px";
$picture4textsize_s5_iacf   	= s5_ICF_get_option( 'picture4textsize' );
$picture4textcolor_s5_iacf   	= "ffffff";
$picture4textbg_s5_iacf   	= "333333";
$picture5text_s5_iacf   	= s5_ICF_get_option( 'picture5text' );
$picture5spacing_s5_iacf   	= "12px";
$picture5textsize_s5_iacf   	= s5_ICF_get_option( 'picture5textsize' );
$picture5textcolor_s5_iacf   	= "ffffff";
$picture5textbg_s5_iacf   	= "333333";
$picture6text_s5_iacf   	= s5_ICF_get_option( 'picture6text' );
$picture6spacing_s5_iacf   	= "12px";
$picture6textsize_s5_iacf   	= s5_ICF_get_option( 'picture6textsize' );
$picture6textcolor_s5_iacf   	= "ffffff";
$picture6textbg_s5_iacf   	= "333333";
$picture7text_s5_iacf   	= s5_ICF_get_option( 'picture7text' );
$picture7spacing_s5_iacf   	= "12px";
$picture7textsize_s5_iacf   	= s5_ICF_get_option( 'picture7textsize' );
$picture7textcolor_s5_iacf   	= "ffffff";
$picture7textbg_s5_iacf   	= "333333";
$picture8text_s5_iacf   	= s5_ICF_get_option( 'picture8text' );
$picture8spacing_s5_iacf   	= "12px";
$picture8textsize_s5_iacf   	= s5_ICF_get_option( 'picture8textsize' );
$picture8textcolor_s5_iacf   	= "ffffff";
$picture8textbg_s5_iacf   	= "333333";
$picture9text_s5_iacf   	= s5_ICF_get_option( 'picture9text' );
$picture9spacing_s5_iacf   	= "12px";
$picture9textsize_s5_iacf   	= s5_ICF_get_option( 'picture9textsize' );
$picture9textcolor_s5_iacf   	= "ffffff";
$picture9textbg_s5_iacf   	= "333333";
$picture10text_s5_iacf   	= s5_ICF_get_option( 'picture10text' );
$picture10spacing_s5_iacf   	= "12px";
$picture10textsize_s5_iacf   	= s5_ICF_get_option( 'picture10textsize' );
$picture10textcolor_s5_iacf   	= "ffffff";
$picture10textbg_s5_iacf   	= "333333";

$picture1textweight_s5_iacf   	= "normal";
$picture2textweight_s5_iacf   	= "normal";
$picture3textweight_s5_iacf   	= "normal";
$picture4textweight_s5_iacf   	= "normal";
$picture5textweight_s5_iacf   	= "normal";
$picture6textweight_s5_iacf   	= "normal";
$picture7textweight_s5_iacf   	= "normal";
$picture8textweight_s5_iacf   	= "normal";
$picture9textweight_s5_iacf   	= "normal";
$picture10textweight_s5_iacf   	= "normal";

$picture1textopac_s5_iacf   	= "25";
$picture2textopac_s5_iacf   	= "25";
$picture3textopac_s5_iacf   	= "25";
$picture4textopac_s5_iacf   	= "25";
$picture5textopac_s5_iacf   	= "25";
$picture6textopac_s5_iacf   	= "25";
$picture7textopac_s5_iacf   	= "25";
$picture8textopac_s5_iacf   	= "25";
$picture9textopac_s5_iacf   	= "25";
$picture10textopac_s5_iacf   	= "25";

$non_ie_picture1textopac_s5_iacf = 55/ 100;
$non_ie_picture2textopac_s5_iacf = 55 / 100;
$non_ie_picture3textopac_s5_iacf = 55 / 100;
$non_ie_picture4textopac_s5_iacf = 55 / 100;
$non_ie_picture5textopac_s5_iacf = 55 / 100;
$non_ie_picture6textopac_s5_iacf = 55 / 100;
$non_ie_picture7textopac_s5_iacf = 55 / 100;
$non_ie_picture8textopac_s5_iacf = 55 / 100;
$non_ie_picture9textopac_s5_iacf = 55 / 100;
$non_ie_picture10textopac_s5_iacf = 55 / 100;


$tween_time_s5_iacf = $tween_time_s5_iacf*1000;
$display_time_s5_iacf = $display_time_s5_iacf*1000;

$text_display_effect = $tween_time_s5_iacf * 0.75;
$text_display_time_s5_iacf = $display_time_s5_iacf - $text_display_effect;


if ($picture1target_s5_iacf == "1") {
$picture1target_s5_iacf = "_blank"; }
if ($picture1target_s5_iacf == "0") {
$picture1target_s5_iacf = "_top"; }
if ($picture2target_s5_iacf == "1") {
$picture2target_s5_iacf = "_blank"; }
if ($picture2target_s5_iacf == "0") {
$picture2target_s5_iacf = "_top"; }
if ($picture3target_s5_iacf == "1") {
$picture3target_s5_iacf = "_blank"; }
if ($picture3target_s5_iacf == "0") {
$picture3target_s5_iacf = "_top"; }
if ($picture4target_s5_iacf == "1") {
$picture4target_s5_iacf = "_blank"; }
if ($picture4target_s5_iacf == "0") {
$picture4target_s5_iacf = "_top"; }
if ($picture5target_s5_iacf == "1") {
$picture5target_s5_iacf = "_blank"; }
if ($picture5target_s5_iacf == "0") {
$picture5target_s5_iacf = "_top"; }
if ($picture6target_s5_iacf == "1") {
$picture6target_s5_iacf = "_blank"; }
if ($picture6target_s5_iacf == "0") {
$picture6target_s5_iacf = "_top"; }
if ($picture7target_s5_iacf == "1") {
$picture7target_s5_iacf = "_blank"; }
if ($picture7target_s5_iacf == "0") {
$picture7target_s5_iacf = "_top"; }
if ($picture8target_s5_iacf == "1") {
$picture8target_s5_iacf = "_blank"; }
if ($picture8target_s5_iacf == "0") {
$picture8target_s5_iacf = "_top"; }
if ($picture9target_s5_iacf == "1") {
$picture9target_s5_iacf = "_blank"; }
if ($picture9target_s5_iacf == "0") {
$picture9target_s5_iacf = "_top"; }
if ($picture10target_s5_iacf == "1") {
$picture10target_s5_iacf = "_blank"; }
if ($picture10target_s5_iacf == "0") {
$picture10target_s5_iacf = "_top"; }
?>