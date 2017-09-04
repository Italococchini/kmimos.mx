<?php 

	include("db.php");
	include("funciones.php");
	
	function redimencionar($base, $subpath, $img){
		if( file_exists("../".$base."miniatura/".$subpath."_".$img) ){
			return "miniatura/".$subpath."_".$img;
		}else{
			if( !file_exists("../".$base.$subpath."/".$img ) ){
				return false;
			}
		    $aSize = getImageSize( "../".$base.$subpath."/".$img );
		    if( $aSize[0] == 0 ){
		    	unlink("../".$base.$subpath."/".$img);
		    	return false;
		    }else{
			    return "miniatura/".$subpath."_".$img;
		    }

		}
	}

	extract($_POST);

	$page *= 15;

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

    $sql = "
    SELECT 
    	cuidadores.*,
        (cuidadores.hospedaje_desde*1.2) AS precio,
        post_cuidador.post_title AS titulo
    FROM 
        cuidadores 
    INNER JOIN wp_posts AS post_cuidador ON ( cuidadores.id_post = post_cuidador.ID )
    {$ubicaciones_inner}
    WHERE 
        activo = '1' {$condiciones} {$ubicaciones_filtro}
    ORDER BY {$orderby}
    LIMIT {$page}, 15";

	$resultado = $db->get_results($sql);

	$temp = array();

	if( $resultado != false ){
		foreach ($resultado as $cuidador) {

			$tama_aceptados = unserialize( $cuidador->tamanos_aceptados );
			$tamanos = array(
				'pequenos' => 'Peque&ntilde;os',
				'medianos' => 'Medianos',
				'grandes'  => 'Grandes',
				'gigantes' => 'Gigantes'
			);

			$aceptados = array();
			foreach ($tama_aceptados as $key => $value) {
				if( $value == 1){
					$aceptados[] = $tamanos[$key];
				}
			} 

			$edad_aceptada = unserialize( $cuidador->edades_aceptadas );
			$edades = array(
				'cachorros' => 'Cachorros',
				'adultos' => 'Adultos'
			);
			$edades_aceptadas = array();
			foreach ($edad_aceptada as $key => $value) {
				if( $value == 1){
					$edades_aceptadas[] = $edades[$key];
				}
			} 

			$atributos = unserialize( $cuidador->atributos );

			$anios_exp = $cuidador->experiencia;
			if( $anios_exp > 1900 ){
				$anios_exp = date("Y")-$anios_exp;
			}

			$mascota_cuidador = unserialize( $cuidador->mascotas_cuidador );
			$mascotas_cuidador = array();
			foreach ($mascota_cuidador as $key => $value) {
				if( $value == 1){
					$mascotas_cuidador[] = $tamanos[$key];
				}
			}

			$housings = array('1'=>'Casa','2'=>'Departamento');
			$patio = ( $atributos['yard'] == 1 ) ? 'Tiene patio' : 'No tiene patio';
			$areas = ( $atributos['green'] == 1 ) ? 'Tiene &aacute;reas verdes' : 'No tiene &aacute;reas verdes';

			if( count($aceptados) == 0 ){
				$tamanos_aceptados = 'Ninguno';
			}

			if( count($aceptados) > 0 && count($aceptados) < 4 ){
				$tamanos_aceptados = '('.implode(', ',$aceptados).')';
			}

			if( count($aceptados) == 4 ){
				$tamanos_aceptados = "Todos";
			}


			if( count($edades_aceptadas) == 0 ){
				$edades_aceptadas = 'Ninguno';
			}else{
				$edades_aceptadas = implode(', ',$edades_aceptadas);
			}

			$num_mascotas = "No tiene mascotas propias";
			if($cuidador->num_mascotas+0 > 0){ 
				if( count($mascotas_cuidador) > 0 ){
					$tams = '('.implode(', ',$mascotas_cuidador).')';
				}else{
					$tams = "";
				} 
				$num_mascotas = $cuidador->num_mascotas.' Perro(s) en casa';
			}

            $sql = "
				SELECT 
					servicio.ID 		AS ID, 
					tipo_servicio.slug 	AS tipo, 
					servicio.post_title AS titulo 
				FROM 
					wp_posts AS servicio
				INNER JOIN wp_term_relationships AS relacion ON ( relacion.object_id = servicio.ID )
				INNER JOIN wp_terms as tipo_servicio ON ( tipo_servicio.term_id = relacion.term_taxonomy_id )
				WHERE 
					( servicio.post_author = '{$cuidador->user_id}' AND servicio.post_type = 'product' AND servicio.post_status = 'publish' ) AND
					( relacion.term_taxonomy_id != 28 )
			";

			$servicios_post = $db->get_results( $sql );
			$servicios = array();

			$adicio = array(
				"bano" => array(
					"titulo" => "Ba&ntilde;o",
					"iconos" => "icon-bano"
				),
				"corte" => array(
					"titulo" => "Corte de Pelo y U&ntilde;as",
					"iconos" => "icon-peluqueria"
				),
				"acupuntura" => array(
					"titulo" => "Acupuntura",
					"iconos" => "icon-acupuntura"
				),
				"limpieza_dental" => array(
					"titulo" => "Limpieza Dental",
					"iconos" => "icon-limpieza"
				),
				"visita_al_veterinario" => array(
					"titulo" => "Visita al Veterinario",
					"iconos" => "icon-veterinario"
				)
			);
			$tranp = array(
				"transportacion_sencilla" => array(
					"titulo" => "Transp. Sencilla"
				),
				"transportacion_redonda" => array(
					"titulo" => "Transp. Redonda"
				)
			);
			$rutas = array(
				"corto" => "Rutas Cortas",
				"medio" => "Rutas Medias",
				"largo" => "Rutas Largas"
			);

			$adicionales_array = unserialize( utf8_decode( $cuidador->adicionales ) );

			$adicionales_result = array();

			foreach ($adicionales_array as $key => $servicio) {

				if( array_key_exists($key, $tranp) ){
					$cont = 0;
					foreach ($servicio as $key2 => $value2) { 
						$cont += $value2; 
						if( $value2 == 0 ){ 
							unset( $servicio[$key2] ); 
						}else{
							$servicio[$key2] = array(
								"titulo" => $rutas[$key2],
								"precio" => $servicio[$key2]
							);
						}
					}
					if( $cont > 0 ){
						$adicionales_result[ "transporte" ][ $key ] = array(
							"titulo" => $tranp[$key]["titulo"],
							"precio" => $servicio
						);
					}
				}

				if( array_key_exists($key, $adicio) ){
					if( $servicio+0 > 0 ){						
						$adicionales_result[ "adicionales" ][ $key ] = array(
							"titulo" => $adicio[$key]["titulo"],
							"icono"  => $adicio[$key]["iconos"],
							"precio" => $servicio
						);
					}
				}

			}

			foreach ($servicios_post as $key => $servicio) {
				$servicios[ $servicio->tipo ] = array(
					"id" => $servicio->ID,
					"name" => utf8_encode( $servicio->titulo )
				);
			}

			$ini = strtotime( date("Y-m-d")." ".$cuidador->check_in);
			$fin = strtotime( date("Y-m-d")." ".$cuidador->check_out);

			$horarios = array();
			if( $ini != $fin ){
				for ($i=$ini; $i <= $fin; $i+=1800) { 
					$horarios[] = date("H:i", $i);
				}
			}else{
				$horarios[] = date("H:i", $ini);
			}

			$hospedaje = unserialize( utf8_decode( $cuidador->hospedaje ) );

			$temp[] = array(

				"id" => utf8_encode( $cuidador->id ),

				"titulo" => utf8_encode( $cuidador->titulo ),
				"img" => app_kmimos_get_foto_cuidador($cuidador->id, $home),
				"imgs" => app_kmimos_get_fotos_galeria($cuidador->id, $home),
				"descripcion" => utf8_encode( $cuidador->descripcion ),
				
				"experiencia" => $anios_exp." A&ntilde;os",
				"tipo_propiedad" => $housings[ $atributos['propiedad'] ],
				"tamanos_aceptados" => $tamanos_aceptados,
				"edades_aceptadas" => $edades_aceptadas,

				"mascotas_en_casa" => $num_mascotas,
				"patio" => $patio,
				"areas_verdes" => $areas,
				"cantidad_mascotas" => $cuidador->mascotas_permitidas,

				"latitud" => $cuidador->latitud,
				"longitud" => $cuidador->longitud,

				"hospedaje" => $hospedaje,
				"adicionales" => $adicionales_result,

				"desde" => ($cuidador->hospedaje_desde*1.2),

				"horarios" => $horarios,

				"servicios" => $servicios
			);
		}

		$respuesta = array(
			"resultados" => $temp,
			"cantidad" => count($temp)
		);
	}else{
		$respuesta = array(
			"resultados" => false,
			"cantidad" => 0
		);
	}

	echo json_encode($respuesta);

	// echo "<pre>";
	// 	print_r( $respuesta );
	// echo "</pre>";
?>