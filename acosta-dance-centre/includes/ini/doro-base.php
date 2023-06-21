<?php
require_once "DOROCreativeAgencyWordPressThemeBase.php";
class DOROCreativeAgencyWordPressTheme {
	public $plugin_file=__FILE__;
	public $responseObj;
	public $licenseMessage;
	public $showMessage=false;
	public $slug="doro";
	function __construct() {
		add_action( 'admin_print_styles', [ $this, 'SetAdminStyle' ] );
		$licenseKey=get_option("DOROCreativeAgencyWordPressTheme_lic_Key","");
		$liceEmail=get_option( "DOROCreativeAgencyWordPressTheme_lic_email","");
		$templateDir=dirname(__FILE__)."/../../";
		if(DOROCreativeAgencyWordPressThemeBase::CheckWPPlugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,$templateDir."/style.css")){
			add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
			add_action( 'admin_post_DOROCreativeAgencyWordPressTheme_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
			//$this->licenselMessage=$this->mess;
			require (DORO_THEME_PATH . '/includes/core/ab/core.php');

		}else{
			if(!empty($licenseKey) && !empty($this->licenseMessage)){
				$this->showMessage=true;
			}
			update_option("DOROCreativeAgencyWordPressTheme_lic_Key","") || add_option("DOROCreativeAgencyWordPressTheme_lic_Key","");
			add_action( 'admin_post_DOROCreativeAgencyWordPressTheme_el_activate_license', [ $this, 'action_activate_license' ] );
			add_action( 'admin_menu', [$this,'InactiveMenu']);
			remove_action( 'init', 'portfolio_post_types' );
			remove_action('init', 'doro_register_metabox_list');
			if( function_exists( 'doro_unregister_elementor' ) ) {
			add_action( 'elementor/widgets/register', 'unregister_widgets' );
			}
		}
        }
	function SetAdminStyle() {
		wp_register_style( "DOROCreativeAgencyWordPressThemeLic", get_theme_file_uri("_lic_style.css"),10);
		wp_enqueue_style( "DOROCreativeAgencyWordPressThemeLic" );
	}
	function ActiveAdminMenu(){
		 
		add_menu_page (  "DORO Creative Agency WordPress Theme", "About Doro", "activate_plugins", $this->slug, [$this,"Activated"], " dashicons-megaphone ");
		//add_submenu_page(  $this->slug, "DOROCreativeAgencyWordPressTheme License", "License Info", "activate_plugins",  $this->slug."_license", [$this,"Activated"] );

	}
	function InactiveMenu() {
		add_menu_page( "DORO Creative Agency WordPress Theme", "About Doro", 'activate_plugins', $this->slug,  [$this,"LicenseForm"], " dashicons-megaphone " );
		
	}
	function action_activate_license(){
		check_admin_referer( 'el-license' );
		$licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
		$licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
		update_option("DOROCreativeAgencyWordPressTheme_lic_Key",$licenseKey) || add_option("DOROCreativeAgencyWordPressTheme_lic_Key",$licenseKey);
		update_option("DOROCreativeAgencyWordPressTheme_lic_email",$licenseEmail) || add_option("DOROCreativeAgencyWordPressTheme_lic_email",$licenseEmail);
		update_option('_site_transient_update_themes','');
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}
	function action_deactivate_license() {
		check_admin_referer( 'el-license' );
		$message="";
		if(DOROCreativeAgencyWordPressThemeBase::RemoveLicenseKey(__FILE__,$message)){
			update_option("DOROCreativeAgencyWordPressTheme_lic_Key","") || add_option("DOROCreativeAgencyWordPressTheme_lic_Key","");
			update_option('_site_transient_update_themes','');
		}
    	wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
	function Activated(){
		?>
		<div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to DORO - Creative Agency WordPress Theme</h1>
			<div class="about-text">
			   Find out what's new on Version 4.2!	
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.2
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			<div class="page-content-theside ">
			<div class="wr-col-1">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="DOROCreativeAgencyWordPressTheme_el_deactivate_license"/>
            <div class="el-license-container">
                
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>

                        <?php if ( $this->responseObj->is_valid ) : ?>
                            <span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php _e("Invalid",$this->slug);?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
                        <?php echo $this->responseObj->license_title; ?>
                    </div>
                </li>
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
                        <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                    </div>
                </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button('Deactivate'); ?>
                </div>
				<div class="infobox">
						<div class="bluetitle">1 Purchase Code per Website</div>
						<div class="simpletext simpletext2">Before moving to the another domain, <strong>Deactive</strong> your purchase code.</div>
						<div class="simpletext">If you want to use Doro Theme on another domain, please <a href="https://themeforest.net/item/doro-creative-agency-wordpress-theme/23975046" target="_blank">purchase another license</a></div>
				</div>
            </div>
            </form>
			</div>
			<div class="wr-col-1">
			<div class="wr-right">
				<h3 class="wr-h3">Changelog</h3>				
				<div class="theside-chnagelog">
					<ul>
					   <li><em>New: </em> Pre-loader Option added.</li>
					   <li><em>Fixed: </em> Site Logo Image alignment issue has been fixed.</li>
					</ul>				
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
        
		<?php
	}
	
	function LicenseForm() {
		?>
		<div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to DORO - Creative Agency WordPress Theme</h1>
			<div class="about-text">
			   Doro Theme Licensing.
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.2
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			
			<div class="page-content-theside">
			<h3>Active License!</h3>
				<p><?php _e("Enter your item purchase code here, to activate the product, and get full feature updates and premium support.",$this->slug);?></p>
				<hr>
				<br>
				<br>
				<br>
				<div class="theside-chnagelog">
				<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="DOROCreativeAgencyWordPressTheme_el_activate_license"/>
            <div class="el-license-container">
                
				<?php
					if(!empty($this->showMessage) && !empty($this->licenseMessage)){
						?>
                        <div class="notice_webredox">
                            <p><?php echo $this->licenseMessage; ?></p>
                        </div>
						<?php
					}
				?>
                
    		    <div class="el-license-field">
    			    <label for="el_license_key"><?php _e("Purchase code",$this->slug);?></label>
    			    <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
    		    </div>
                <div class="el-license-field">
                    <label for="el_license_key"><?php _e("Email Address",$this->slug);?></label>
                    <?php
                        $purchaseEmail   = get_option( "DOROCreativeAgencyWordPressTheme_lic_email", get_bloginfo( 'admin_email' ));
                    ?>
                    <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
                    <div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>
                </div>
                <div class="el-license-active-btn">
					<?php wp_nonce_field( 'el-license' ); ?>
					<?php submit_button('Activate'); ?>
                </div>
            </div>
        </form>	
				</div>
			</div>
		</div>
	</div>
        
		<?php
	}
}

new DOROCreativeAgencyWordPressTheme();