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
    <div class="notice updated">
      <p><?php echo sprintf( __( 'Cool ;-) All premium plugins are available for installation / update', 'arter-plugin' ) );?></p>
    </div>

    <h2><?php echo esc_html__( 'Plugins Status', 'arter-plugin' ); ?></h2>

    <div class="arter-dashboard-list">
      <ul>
        <li>
           <strong><span class="dashicons dashicons-yes"></span></strong>
           <?php echo esc_html__( 'Advanced Custom Fields Pro', 'arter-plugin' ); ?>
        </li>
      </ul>
      <div class="buttons">
        <?php echo sprintf( __( '<a href="%s" class="button button-primary">Install / Update</a>', 'arter-plugin' ), admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>
      </div>
    </div>
  </div>
</div>
