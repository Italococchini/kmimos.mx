<?php
	include("../../../../../vlz_config.php");
	include("../funciones/db.php");

	$conn = new mysqli($host, $user, $pass, $db);
	$db = new db($conn);

	extract($_POST);

	$condiciones = "";

    /* Filtros por fechas */
	    // if( isset($checkin)  && $checkin  != '' && isset($checkout) && $checkout != '' ){ 
	    // 	$condiciones .= " AND ( SELECT count(*) FROM cupos WHERE cupos.cuidador = cuidadores.user_id AND cupos.fecha >= '{$checkin}' AND cupos.fecha <= '{$checkout}' AND cupos.full = 1 ) = 0"; 
	   	// }
    /* Fin Filtros por fechas */

    /* Filtros por servicios y tamaños */
	    if( isset($servicios) ){ foreach ($servicios as $key => $value) { if( $value != "hospedaje" ){ $condiciones .= " AND adicionales LIKE '%".$value."%'"; } } }
	    if( isset($tamanos) ){ foreach ($tamanos as $key => $value) { $condiciones .= " AND ( tamanos_aceptados LIKE '%\"".$value."\";i:1%' || tamanos_aceptados LIKE '%\"".$value."\";s:1:\"1\"%' ) "; } }
    /* Fin Filtros por servicios y tamaños */

    /* Filtro nombre  */
	    if( isset($nombre) ){ if( $nombre != "" ){ $condiciones .= " AND nombre LIKE '".$nombre."%' "; } }
    /* Fin Filtro nombre */

    /* Filtros por rangos */
	    if( $rangos[0] != "" ){ $condiciones .= " AND (hospedaje_desde*1.2) >= '".$rangos[0]."' "; }
	    if( $rangos[1] != "" ){ $condiciones .= " AND (hospedaje_desde*1.2) <= '".$rangos[1]."' "; }
	    if( $rangos[2] != "" ){ $anio_1 = date("Y")-$rangos[2]; $condiciones .= " AND experiencia <= '".$anio_1."' "; }
	    if( $rangos[3] != "" ){ $anio_2 = date("Y")-$rangos[3]; $condiciones .= " AND experiencia >= '".$anio_2."' "; }
	    if( $rangos[4] != "" ){ $condiciones .= " AND rating >= '".$rangos[4]."' "; }
	    if( $rangos[5] != "" ){ $condiciones .= " AND rating <= '".$rangos[5]."' "; }
    /* Fin Filtros por rangos */

    /* Ordenamientos */
	    switch ($orderby) {
	    	case 'rating_desc':
	    		$orderby = "rating DESC, valoraciones DESC";
	    	break;
	    	case 'rating_asc':
	    		$orderby = "rating ASC, valoraciones ASC";
	    	break;
	    	case 'distance_asc':
	    		$orderby = "DISTANCIA ASC";
	    	break;
	    	case 'distance_desc':
	    		$orderby = "DISTANCIA DESC";
	    	break;
	    	case 'price_asc':
	    		$orderby = "hospedaje_desde ASC";
	    	break;
	    	case 'price_desc':
	    		$orderby = "hospedaje_desde DESC";
	    	break;
	    	case 'experience_asc':
	    		$orderby = "experiencia ASC";
	    	break;
	    	case 'experience_desc':
	    		$orderby = "experiencia DESC";
	    	break;
	    }
    /* Fin Ordenamientos */

    /* Filtro de busqueda */
	    if( $tipo_busqueda == "otra-localidad" && $estados != "" && $municipios != "" ){
	        $coordenadas 		= unserialize( $db->get_var("SELECT valor FROM kmimos_opciones WHERE clave = 'municipio_{$municipios}' ") );
	        $latitud  			= $coordenadas["referencia"]->lat;
	        $longitud 			= $coordenadas["referencia"]->lng;
	        $ubicacion 			= " ubi.estado LIKE '%={$estados}=%' AND ubi.municipios LIKE '%={$municipios}=%' ";
	        $ubicaciones_inner  = "INNER JOIN ubicaciones AS ubi ON ( cuidadores.id = ubi.cuidador )";
	        $ubicaciones_filtro = "AND ( $ubicacion )";
	        //if( $orderby == "" ){ $orderby = "DISTANCIA ASC"; }
	    }else{ 
	        if( $tipo_busqueda == "otra-localidad" && $estados != "" ){
	            $ubicaciones_inner = "INNER JOIN ubicaciones AS ubi ON ( cuidadores.id = ubi.cuidador )";
	            $ubicaciones_filtro = "AND ( ubi.estado LIKE '%=".$estados."=%' )";
	        }else{
	            if( $tipo_busqueda == "mi-ubicacion" && $latitud != "" && $longitud != "" ){
	       			$calculo_distancia 	= "( 6371 * acos( cos( radians({$latitud}) ) * cos( radians(latitud) ) * cos( radians(longitud) - radians({$longitud}) ) + sin( radians({$latitud}) ) * sin( radians(latitud) ) ) )";
	                $DISTANCIA 			= ", {$calculo_distancia} as DISTANCIA";
	                $FILTRO_UBICACION = "HAVING DISTANCIA < 500";
	                if( $orderby == "" ){ $orderby = "DISTANCIA ASC"; }
	            }else{
	                $DISTANCIA = "";
	                $FILTRO_UBICACION = "";
	            }
	        }
	    }
    /* Fin Filtro de busqueda */

    /* Filtro predeterminado */
    	if( $orderby == "" ){ $orderby = "rating DESC, valoraciones DESC"; }
    /* Fin Filtro predeterminado */

    $home = $db->get_var("SELECT option_value FROM wp_options WHERE option_name = 'siteurl'", "option_value");

    $sql = "
    SELECT 
        cuidadores.id,
        cuidadores.id_post,
        cuidadores.user_id,
        cuidadores.longitud,
        cuidadores.latitud,
        cuidadores.adicionales,
        (cuidadores.hospedaje_desde*1.2) AS precio,
        cuidadores.experiencia,
        post_cuidador.post_name AS slug,
        post_cuidador.post_title AS titulo
        {$DISTANCIA}
    FROM 
        cuidadores 
    INNER JOIN wp_posts AS post_cuidador ON ( cuidadores.id_post = post_cuidador.ID )
    {$ubicaciones_inner}
    WHERE 
        activo = '1' {$condiciones} {$ubicaciones_filtro} {$FILTRO_UBICACION}
    ORDER BY {$orderby}";

    $cuidadores = $db->get_results($sql);

    $pines = array();
    if( $cuidadores != false ){
		foreach ($cuidadores as $key => $cuidador) {
			$url = "/".$cuidador->slug;
			$img = kmimos_get_foto_cuidador($cuidador->id, $home);		
			$pines[] = array(
				"ID"   => $cuidador->id,
				"user" => $cuidador->user_id,
				"lat"  => $cuidador->latitud,
				"lng"  => $cuidador->longitud,
				"nom"  => utf8_encode($cuidador->titulo),
				"url"  => $url,
				"img"  => $img
			);
		}
    }

	session_start();

	$pines_json = json_encode($pines);
    $pines_json = "<script>var pines = eval('".$pines_json."');</script>";
	$_SESSION['pines'] = $pines_json;
	$_SESSION['pines_array'] = serialize($pines);

	$temp_rangos = array_filter($_POST["rangos"]);
	if( count($temp_rangos) > 0 ){
		$_POST["rangos"] = $temp_rangos;
	}else{
		unset($_POST["rangos"]);
	}

	$_POST = array_filter($_POST);
	
	$_SESSION['busqueda'] = serialize($_POST);
    $_SESSION['resultado_busqueda'] = $cuidadores;

    // echo "<pre>";
    // 	print_r($home);
    // 	print_r($sql);
    // echo "</pre>";

    function toRadian($deg) { return $deg * pi() / 180; };

	function calcular_rango_de_busqueda($norte, $sur){
	    return ( 6371 * acos( cos( toRadian($norte->lat) ) * cos( toRadian($sur->lat) ) * cos( toRadian($sur->lng) - toRadian($norte->lng) ) + sin( toRadian($norte->lat) ) * sin( toRadian($sur->lat) ) ) );
	}

	function kmimos_get_foto_cuidador($id, $xhome){
        global $db;
        $cuidador = $db->get_row("SELECT * FROM cuidadores WHERE id = ".$id);
        $name_photo = $db->get_var("SELECT meta_value FROM wp_usermeta WHERE user_id = {$cuidador->user_id} AND meta_key = '{name_photo}'", "meta_value");

        $home = $xhome."wp-content/uploads/cuidadores/avatares/";

        if( empty($name_photo)  ){ $name_photo = "0"; }
        if( count(explode(".", $name_photo)) == 1 ){ $name_photo .= "jpg";  }
        if( file_exists("../../../../uploads/cuidadores/avatares/{$id}/{$name_photo}") ){
            $img = $home."{$id}/{$name_photo}";
        }else{
            if( file_exists("../../../../uploads/cuidadores/avatares/{$id}/0.jpg") ){
                $img = $home."{$id}/0.jpg";
            }else{
                $img = $xhome.'wp-content/themes/pointfinder/images/noimg.png';
            }
        }
        return $img;
    }

	header("location: {$home}busqueda/");
?>