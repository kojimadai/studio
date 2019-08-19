<?php
/*********************
ライセンス認証
*********************/
define('YOUR_SPECIAL_SECRET_KEY', '5ac73cb63c7b40.94527986');
define('YOUR_LICENSE_SERVER_URL', 'https://appartement.in');
define('YOUR_ITEM_REFERENCE', 'My First Plugin');
add_action('admin_menu', 'slm_sample_license_menu');
function slm_sample_license_menu() {
	add_menu_page('Sample License Activation Menu', 'ライセンス認証', 'manage_options', __FILE__, 'sample_license_management_page');
}
function sample_license_management_page() {
	echo '<div class="wrap">';
	echo '<h2>ライセンス認証</h2>';
    if (isset($_REQUEST['activate_license'])) {
        $license_key = $_REQUEST['sample_license_key'];
        $api_params = array(
            'slm_action' => 'slm_activate',
            'secret_key' => YOUR_SPECIAL_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
        );
        $query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL));
        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
        if (is_wp_error($response)){
            echo "一時的なエラーが発生しました。しばらくたっても回復しない場合にはお問い合わせください。";
        }
        $license_data = json_decode(wp_remote_retrieve_body($response));
        if($license_data->result == 'success'){//Success was returned for the license activation
            echo 'ライセンス認証に成功しました。';
            update_option('sample_license_key', $license_key); 
        }
        else{
            echo 'ライセンス認証に失敗しました。お問い合わせください。';
        }
        delete_site_transient($license_state);
    }
    if (isset($_REQUEST['deactivate_license'])) {
        $license_key = $_REQUEST['sample_license_key'];
        $api_params = array(
            'slm_action' => 'slm_deactivate',
            'secret_key' => YOUR_SPECIAL_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
        );
        $query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL));
        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
        if (is_wp_error($response)){
            echo "一時的なエラーが発生しました。しばらくたっても回復しない場合にはお問い合わせください。";
        }
        $license_data = json_decode(wp_remote_retrieve_body($response));
        if($license_data->result == 'success'){            
            echo 'ライセンス認証解除が完了しました。';
            update_option('sample_license_key', '');
        }
        else{
            echo 'ライセンス認証に失敗しました。お問い合わせください。';
        }
    }
    ?>
    <p>ライセンスキーを入力し認証ボタンをおしてアクティベートしてください。</p>
    <form action="" method="post">
        <table class="form-table">
            <tr>
                <th style="width:100px;"><label for="sample_license_key">ライセンスキー</label></th>
                <td><input class="regular-text" type="text" id="sample_license_key" name="sample_license_key"  value="<?php echo get_option('sample_license_key'); ?>" ></td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="activate_license" value="認証" class="button-primary" />
            <input type="submit" name="deactivate_license" value="認証解除" class="button" />
        </p>
    </form>
    <?php    
    echo '</div>';
}
?>