<?php
/**
* Template for theme dashboard plugins page
*/
?>
<div class="arter-dashboard-plugins">
  <div class="image-container">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_amiibtte.json"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop  autoplay></lottie-player>
  </div>
  <div class="content-container">
    <div class="notice notice-error">
      <p><?php echo sprintf( __( 'The following premium plugins are available for installation / update only with <strong>activated theme</strong>!', 'arter-plugin' ) );?></p>
    </div>
    <h2><?php echo esc_html__( 'Plugins Status', 'arter-plugin' ); ?></h2>
    <div class="arter-dashboard-list">
      <ul>
        <li>
           <strong><span class="dashicons dashicons-no" title="<?php echo esc_attr__( 'Disabled! Need activate theme.', 'arter-plugin' ); ?>"></span></strong>
           <?php echo esc_html__( 'Advanced Custom Fields Pro', 'arter-plugin' ); ?>
        </li>
      </ul>
    </div>
    <div class="buttons">
      <p>
        <a href="" class="button button-primary button-primary-disabled"><?php echo esc_html__( 'Install / Update', 'arter-plugin' ); ?></a>
        <?php echo sprintf( __( '<a href="%s" class="button button-primary">Activate Theme</a>', 'arter-plugin' ), admin_url( 'admin.php?page=arter-theme-activation' ) ); ?>
      </p>
    </div>
  </div>
</div>
