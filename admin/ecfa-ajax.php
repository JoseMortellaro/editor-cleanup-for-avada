<?php
defined( 'ABSPATH' ) || exit;

foreach( array( 'outer','inner','loading' ) as $page ){
	add_action( 'wp_ajax_eos_dp_save_avada_'.$page.'_settings','eos_dp_save_avada_'.$page.'_settings' );
}
//Saves activation/deactivation settings for avada outer editor
function eos_dp_save_avada_outer_settings(){
	eos_dp_save_avada_settings( 'outer' );
}
//Saves activation/deactivation settings for avada inner editor
function eos_dp_save_avada_inner_settings(){
	eos_dp_save_avada_settings( 'inner' );
}
//Saves activation/deactivation settings for avada loading editor
function eos_dp_save_avada_loading_settings(){
	eos_dp_save_avada_settings( 'loading' );
}
//Callback for saving avada editor settings
function eos_dp_save_avada_settings( $page ){
	eos_dp_check_intentions_and_rights( 'eos_dp_avada_'.$page.'_setts' );
	if( isset( $_POST['eos_dp_avada_data'] ) && !empty( $_POST['eos_dp_avada_data'] ) && isset( $_POST['page'] ) && !empty( $_POST['page'] ) ){
		$opts = eos_dp_get_option( 'fdp_avada' );
		$opts[sanitize_key( $_POST['page'] )] = array_filter( explode( ',',sanitize_text_field( $_POST['eos_dp_avada_data'] ) ) );
		eos_dp_update_option( 'fdp_avada',$opts,false );
		echo 1;
		die();
	}
	echo 0;
	die();
}
