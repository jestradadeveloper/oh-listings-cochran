<?php
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
?>
 <div class="wrap">
 <h2><?php _e( 'RETS Data', 'oh-listings' ) ?></h2>
    Welcome to the configuration of the RETS database installer / updater
 </div>


 <form method='post'>
        <input type='hidden' name='action' value='salvaropciones'>
        <table>
            <tr>
                <td>
                    <label for='telefono'>Telefono</label>
                </td>
                <td>
                    <input type='text' name='telefono' id='telefono' >
                </td>
            </tr>
            <tr>
                <td>
                    <label for='direccion'>Dirección</label>
                </td>
                <td>
                    <input type='text' name='direccion' id='direccion' >
                </td>
            </tr>
            <tr>
                <td>
                    <label for='email'>Email</label>
                </td>
                <td>
                    <input type='text' name='email' id='email' >
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Enviar'>
                </td>
            </tr>
        </table>
    </form>
<?php
 ?>