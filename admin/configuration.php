<?php
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
 <div class="wrap">
 <h2><?php _e( 'RETS Data', 'oh-listings' ) ?></h2>
    Welcome to the configuration of the RETS database installer / updater
 </div>

<?php
 ?>