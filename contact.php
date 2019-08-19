<?php
/*
Template Name: お問い合わせフォーム
*/
?>


<?php
//https://gray-code.com/php/make-the-form-vol5/
//htmlspecialchars($_POST['お名前'])」

if(isset($_POST['submitted'])) {


	$clean = array();
	// サニタイズ
	if( !empty($_POST) ) {	foreach( $_POST as $key => $value ) {		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);	}}

	mb_language("japanese");
	mb_internal_encoding("UTF-8");
	$header = null;
	if(get_theme_mod('contact_form_admin_email')) {$admin_email_to = get_theme_mod('contact_form_admin_email');} else {$admin_email_to = get_option('admin_email');}
	$title = get_bloginfo('name');
	// ヘッダー情報を設定
	$header = "MIME-Version: 1.0\n";
	$header .= "From:".$title."<".$admin_email_to.">\n";
	$header .= "Reply-To:".$title."<".$admin_email_to.">\n";
	//管理者宛
	$admin_reply_subject = 'お問い合わせを受け付けました';
	$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
	if(get_theme_mod('contact_form_name_state',true)){$admin_reply_text .= "お名前：" . $_POST['contact_name'] . "\n";}
	if(get_theme_mod('contact_form_name_kana_state')){$admin_reply_text .= "お名前（フリガナ）：" . $_POST['contact_name_kana'] . "\n";}
	if(get_theme_mod('contact_form_email_state',true)){$admin_reply_text .= "メールアドレス：" . $_POST['contact_email'] . "\n";}
	if(get_theme_mod('contact_form_tel_state')){$admin_reply_text .= "電話番号：" . $_POST['contact_tel'] . "\n";}
	if(get_theme_mod('contact_form_fax_state')){$admin_reply_text .= "FAX番号：" . $_POST['contact_fax'] . "\n";}
	if(get_theme_mod('contact_form_url_state')){$admin_reply_text .= "URL：" . $_POST['contact_url'] . "\n";}
	if(get_theme_mod('contact_form_textarea_state',true)){$admin_reply_text .= "お問い合わせ内容：" . $_POST['contact_textarea'] . "\n";}
	$admin_reply_text .= $title;
	$title = get_bloginfo('name');
	mb_send_mail($admin_email_to, $admin_reply_subject, $admin_reply_text, $header);
	//自動返信用
	$auto_reply_subject = 'お問い合わせありがとうございます';
	$auto_reply_text = "この度は、お問い合わせいただき誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
	if(get_theme_mod('contact_form_name_state',true)){$auto_reply_text .= "お名前：" . $_POST['contact_name'] . "\n";}
	if(get_theme_mod('contact_form_name_kana_state')){$auto_reply_text .= "お名前（フリガナ）：" . $_POST['contact_name_kana'] . "\n";}
	if(get_theme_mod('contact_form_email_state',true)){$auto_reply_text .= "メールアドレス：" . $_POST['contact_email'] . "\n";}
	if(get_theme_mod('contact_form_tel_state')){$auto_reply_text .= "電話番号：" . $_POST['contact_tel'] . "\n";}
	if(get_theme_mod('contact_form_fax_state')){$auto_reply_text .= "FAX番号：" . $_POST['contact_fax'] . "\n";}
	if(get_theme_mod('contact_form_url_state')){$auto_reply_text .= "URL：" . $_POST['contact_url'] . "\n";}
	if(get_theme_mod('contact_form_textarea_state',true)){$auto_reply_text .= "お問い合わせ内容：" . $_POST['contact_textarea'] . "\n";}
	$auto_reply_text .= $title;
	mb_send_mail($_POST['email'], $auto_reply_subject, $auto_reply_text, $header);
	$emailSent = true;
}
?>


<?php get_header(); ?>
<script>
  $(function(){
    jQuery("#contact").validationEngine({
	    scrollOffset: 300,
	    promptPosition: "inline",
    }
	    
    );
  });
</script>
	<div id="l3" class="privacy">
		<main>
			<article>
			<?php if(isset($emailSent) && $emailSent == true): ?>
				<header class="article">
					<h1 class="article" itemprop="headline" rel="bookmark">お問い合わせありがとうございます。</h1>
				</header>
				<section class="article">
					<p>お問い合わせいただきありがとうございます。</p>
				</section>
			<?php else: ?>
				<header class="article">
					<h1 class="article" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
				</header>
				<section class="article">
					<p><?php echo get_theme_mod('contact_form_desc','お問い合わせ内容によっては、お返事を差し上げるまでにお時間をいただく場合や、お返事させていただくことが適当でない場合には、お返事を差し上げられない場合もございます。あらかじめご了承ください。'); ?></p>
					<form action="<?php the_permalink(); ?>" id="contact" method="post">
						<ul>

							<?php if(get_theme_mod('contact_form_name_state',true)): ?>
							<li>
								<label for="contact_name">お名前</label>
								<input type="text" name="contact_name" id="contact_name" value="" class="<?php if(get_theme_mod('contact_form_name_required',true)): ?>validate[required]<?php endif; ?>">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_name_kana_state')): ?>
							<li>
								<label for="contact_name_kana">お名前（フリガナ）</label>
								<input type="text" name="contact_name_kana" id="contact_name_kana" value="" class="<?php if(get_theme_mod('contact_form_name_kana_required')): ?>validate[required]<?php endif; ?>">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_email_state',true)): ?>
							<li>
								<label for="contact_email">メールアドレス</label>
								<input type="text" name="contact_email" id="contact_email" value="" class="validate[<?php if(get_theme_mod('contact_form_email_required',true)): ?>required,<?php endif; ?>custom[email]]">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_tel_state')): ?>
							<li>
								<label for="contact_tel">電話番号</label>
								<input type="text" name="contact_tel" id="contact_tel" value="" class="validate[<?php if(get_theme_mod('contact_form_tel_required')): ?>required,<?php endif; ?>custom[phone]]">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_fax_state')): ?>
							<li>
								<label for="contact_fax">FAX番号</label>
								<input type="text" name="contact_fax" id="contact_fax" value="" class="validate[<?php if(get_theme_mod('contact_form_fax_required')): ?>required,<?php endif; ?>custom[phone]]">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_url_state')): ?>
							<li>
								<label for="contact_url">URL</label>
								<input type="text" name="contact_url" id="contact_url" value="" class="validate[<?php if(get_theme_mod('contact_form_url_required')): ?>required,<?php endif; ?>custom[url]]">
							</li>
							<?php endif; ?>

							<?php if(get_theme_mod('contact_form_textarea_state',true)): ?>
							<li class="textarea">
								<label for="contact_textarea">お問い合わせ内容</label>
								<textarea name="contact_textarea" id="contact_textarea" rows="20" cols="30" class="<?php if(get_theme_mod('contact_form_textarea_required',true)): ?>validate[required]<?php endif; ?>"></textarea>
							</li>
							<?php endif; ?>

							<li class="buttons">
								<input type="hidden" name="submitted" id="submitted" value="true" />
								<button type="submit">送信する</button>
							</li>

						</ul>
					</form>
				</section>
			<?php endif; ?>
			</article>
		</main>
	</div>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validationEngine.js'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validationEngine-ja.js'></script>
<?php get_footer(); ?>
