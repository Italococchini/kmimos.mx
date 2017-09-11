<?php
    // Configuracion
    include("../../../../../vlz_config.php");
//    include("../../../../../wp-load.php");
    include("../funciones/db.php");
    include("../funciones/generales.php");

    date_default_timezone_set('America/Mexico_City');
    $conn = new mysqli($host, $user, $pass, $db);
    $db = new db($conn);
    $errores = array();
    foreach ($_POST as $key => $value) {
        if($value == ''){ $_POST[$key] = 0; }
    }
    extract($_POST);
    $hoy = date("Y-m-d H:i:s");

    if ($conn->connect_error) {
        echo json_encode(['error'=>'false','msg'=>'Error de conexion']);
    }else{
        // Validar si existe el usuario
        $user = $db->get_row( "SELECT * FROM wp_users WHERE user_email = '{$email}'" );

        if( isset($user->ID) && $user->ID > 0 ){
            $user_id = $user->ID;
            $cuidador = $db->get_row( "SELECT * FROM cuidadores WHERE email = '".$email."'" );
            if( isset($cuidador->id) && $cuidador->id > 0 ){
                $cuidador_id = $cuidador->id;

                // Ubicacion
                // $coordenadas = unserialize( $wpdb->get_var("SELECT valor FROM kmimos_opciones WHERE clave = 'municipio_{$municipios}' ") );
                $sql = "INSERT INTO ubicaciones VALUES (NULL, '{$cuidador_id}', '={$estado}=', '={$municipio}=')";
                $db->query( $sql );

                // Foto de perfil
                $foto = 0;
                $img_id = 0;

                if($vlz_img_perfil != ""){
                    $foto = 1;
                    $dir = realpath( "../../../../" )."/uploads/cuidadores/avatares/".$cuidador_id."/";
                    @mkdir($dir, 0777, true);

                    $path_origen = realpath( "../../../../../" )."/imgs/Temp/".$vlz_img_perfil;
                    $path_destino = $dir.$vlz_img_perfil;
                    if( file_exists($path_origen) ){
                        if( copy($path_origen, $path_destino) ){
                            unlink($path_origen);
                        }
                        $foto = 1;
                        $sql = ("
                            INSERT INTO wp_posts VALUES (
                                NULL,
                                '".$user_id."',
                                '".$hoy."',
                                '".$hoy."',
                                '',
                                '',
                                '',
                                'inherit',
                                'closed',
                                'closed',
                                '',
                                '',
                                '',
                                '',
                                '".$hoy."',
                                '".$hoy."',
                                '',
                                '0',
                                'http://qa.kmimos.la/kmimos/wp-content/uploads/cuidadores/avatares/".$cuidador_id."/0.jpg',
                                '0',
                                'attachment',
                                'image/jpeg',
                                '0'
                            );
                        ");
                        $d = $db->query( $sql );
                        $img_id = $conn->insert_id;
                        $sql = "INSERT INTO wp_postmeta VALUES (NULL, ".$img_id.", '_wp_attached_file', 'cuidadores/avatares/".$cuidador_id."/0.jpg');";
                        $db->query( utf8_decode( $sql ) );
                    }
                }
                // Update metas de usuario
                $sql = "
                    INSERT INTO wp_usermeta VALUES
                        (NULL, ".$user_id.", 'user_address',        '".$direccion."'),
                        (NULL, ".$user_id.", 'user_photo',          '".$img_id."'),
                        (NULL, ".$user_id.", 'name_photo',          '".$vlz_img_perfil."');
                    ";
                $db->query( utf8_decode( $sql ) );

                $cuidador_update = "
                    UPDATE cuidadores 
                    SET 
                        descripcion = '{$descripcion}',
                        direccion = '{$direccion}',
                        num_mascotas = {$num_mascota},
                        latitud = '{$latitude}',
                        longitud = '{$longitude}',
                        portada = {$foto}
                    WHERE email = '{$email}'
                ";
                $r = $db->query($cuidador_update);
                $error = array(
                    "error" => "NO",
                    "msg" => '',
                    "fields" => [],
                );
            }else{
                $error = array(
                    "error" => "SI",
                    "msg" => $msg,
                    "fields" => $fields,
                );
            }
            echo "(".json_encode( $error ).")";
            exit;

        }else{
            $msg = "Se encontraron los siguientes errores:\n\n";
            while($datos = $user->fetch_assoc()){
                if( strtolower($datos['user_email']) == strtolower($email) ){
                    $msg .= "Este E-mail [{$email}] ya esta en uso\n";
                    $fields[] = 'email';
                }
                if( strtolower($datos['user_login']) == strtolower($email) ){
                    $msg .= "Este nombre de Usuario [{$email}] ya esta en uso\n";
                    $fields[] = 'email';
                }
            }

            $error = array(
                "error" => "SI",
                "msg" => $msg,
                "fields" => $fields,
            );

            echo "(".json_encode( $error ).")";
            exit;
        }        
	}
