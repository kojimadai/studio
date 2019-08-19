<?php
$timestamp = time();
if(date("d",$timestamp) == 01) {
	$license_cache = get_site_transient($license_state);
	if($license_cache) {
		if($license_cache == 'error') {
			echo "テーマのライセンス契約が失効しております。ライセンスの更新をお願いいたします。";
		}
	} else {
		$api_params = array(
			'slm_action' => 'slm_check',
			'secret_key' => '5ac73cb63c7b40.94527986',
			'license_key' => get_option('sample_license_key'),
		);
		$response = wp_remote_get(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));
		$license_data = json_decode(wp_remote_retrieve_body($response));
		global $active, $message;
		if($license_data->result == 'error'){
		echo "テーマのライセンス契約が失効しております。ライセンスの更新をお願いいたします。";
		update_option('sample_license_key', "");
		}
		set_site_transient($license_state,$license_data->result,1 * WEEK_IN_SECONDS);
	}
} else {
	delete_site_transient($license_state);
}
if(!get_option('sample_license_key')) {
	echo "テーマのライセンス契約が失効しております。ライセンスの更新をお願いいたします。";
}
?>