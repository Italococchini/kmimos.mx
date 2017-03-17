<?php

    define('WP_USE_THEMES', false);
    require('../../../../../wp-blog-header.php');

    include('generarCodigo.php');

    extract($_POST);

    add_filter( 'wp_mail_from_name', function( $name ) {
        return 'Kmimos México';
    });
    add_filter( 'wp_mail_from', function( $email ) {
        return 'kmimos@kmimos.la';
    });

    $clave = generarClave();  
    $pass  = md5($clave);

    $wpdb->query("UPDATE wp_users SET user_pass = '$pass' WHERE user_email = '".$value->user_email."'");

    global $wpdb;

    $user = $wpdb->get_row("SELECT * FROM wp_users WHERE user_email = '{$email}'");

    if( $user->ID != "" ){
        update_user_meta( $user->ID, 'clave_temp', $clave );

        $mensaje = '
            <h1>¡Nueva Contraseña Temporal!</h1>
            <p style="text-align: justify;">Hola <strong>'.$user->display_name.'</strong>,</p>
            <p style="text-align: justify;">
                Hemos recibido tu solicitud para restablecer tu contraseña en Kmimos.
            </p>
            <p style="text-align: justify;">
                Como parte del proceso de mejoras que tenemos en Kmimos, hemos hecho un cambio en la plataforma con una serie de beneficios que fueron compartidos en un email a parte. En este correo encontraras tus credenciales temporales para acceder a la nueva plataforma de Kmimos México.
            </p>
            <p style="text-align: justify;">
                Esta contraseña la puedes conservar si lo deseas o puedes cambiarla una vez que inicies sesión desde tu perfil en Kmimos.
            </p>
            <p style="text-align: justify;">
                <table>
                    <tr> <td> <strong>E-Mail:</strong> </td><td>'.$user->user_email.'</td> </tr>
                    <tr> <td> <strong>Contraseña:</strong> </td><td>'.$clave.'</td> </tr>
                </table>
            </p>
            <p style="text-align: justify;">
                Para iniciar sesión, pícale al botón de abajo para acceder a nuestra nueva plataforma y cambiar la contraseña si así lo deseas.
            </p>
            <p style="text-align: center;">
                <a  target="_blank"
                    href="'.get_home_url().'/?r='.md5($user->ID).'" 
                    style="
                        padding: 10px;
                        background: #59c9a8;
                        color: #fff;
                        font-weight: 400;
                        font-size: 17px;
                        font-family: Roboto;
                        border-radius: 3px;
                        border: solid 1px #1f906e;
                        display: block;
                        max-width: 300px;
                        margin: 0px auto;
                        text-align: center;
                        text-decoration: none;
                    "
                >Confirmar cambio de contraseña</a>
            </p>
            <p style="text-align: justify;">
                <strong>Si no has solicitado cambiar tu contraseña, no te preocupes, solo ignora este correo y tu actual contraseña permanecerá activa.</strong>
            </p>
        ';

        $send = kmimos_get_email_html("", $mensaje, '', true, true);

        wp_mail( $user->user_email, "Kmimos México – Restablecimiento de Contraseña! Kmimos la NUEVA forma de cuidar a tu perro!", $send);

    }
?>