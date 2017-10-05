// DEVOLUCION A INDEX DE MODAL DE RESPUESTA
$('body').delegate('#modal','click',function(event){
	// var o = event.target.id
	// if(o==='modal'){
		location.href="index.php";
	// }
});


// CONTROL DE CAMPOS TIPO CHECK
$('body form .bloque').delegate('.radio','click',function(){
	$(this).parent().find('.mark').removeClass('active');
	$(this).parent().find('.radiobtn').prop("checked", false);
	$(this).find('.mark').addClass('active');
	$(this).find('.radiobtn').prop("checked", true);

});
$('body form .bloque').delegate('.check','click',function(){
	if($(this).hasClass('active')!=true){
		$(this).addClass('active');
		$(this).find('.mark').addClass('active');
		$(this).find('.checkbtn').prop("checked", true);
	}else{
		$(this).removeClass('active');
		$(this).find('.mark').removeClass('active');
		$(this).find('.checkbtn').prop("checked", false);
	}
});


// VERIFICACION DE TELEFONOS / CORREOS ON BLUR
$('body form .bloque').delegate('#telefono2','blur',function(){
	var t1 = document.getElementById('telefono1').value;
	var v = $(this).val();
	if(v!='')
	{
		if(t1==''){
			alert('Ambos números de teléfono deben coincidir.');
		}
		else{
			if(t1!=v){
				alert('Ambos números de teléfono deben coincidir.');
				$(this).val('').focus();
			}
		}
	}
});
$('body form .bloque').delegate('#correo2','blur',function(){
	var t1 = document.getElementById('correo1').value;
	var v = $(this).val();
	if(v!='')
	{
		if(t1==''){
			alert('Ambos correos electrónicos deben coincidir.');
		}
		else{
			if(t1!=v){
				alert('Ambos correos electrónicos deben coincidir.');
				$(this).val('').selected();
			}
		}
	}
});

// SELECCION DE ESTADO / MUNICIPIO
$('body').delegate('#estado','change',function(){
	var selected = $(this).find('option:selected');
    var estado = selected.data('edo');
    $('#mimunicipio').html('<div class="cargando r">Cargando municipios...</div>');
    $.ajax("includes/estados.php",{
    cache:false,
    async: true,
    type: 'POST',
    data: 'estado='+estado,
    url: 'includes/estados.php',
    dataType: 'html',
    success: function(data) 
    {
        $('#mimunicipio').html(data);
    }
    });
});
$('body').delegate('#municipio','change',function(){
	var m = $(this).val();
	if(m==''){
		alert('Por favor seleccione un Estado');
		$(this).prop("selectedIndex", 0);
		return false;
	}
});


// VALIDACION DE CAMPOS
function validacion(formulario, campos, nombres_campos, event){
    // Array contenedor de Faltantes
    var faltan = new Array();
    var checkboxes = new Array();
    var enfermedades=0;
    // Bucle recolector de datos faltantes
    function faltante(formulario,campo,msj,enfermedades){

    	var tipo = $('body').find(formulario+' *[name="'+campo+'"]').prop('type');
    	// alert(tipo+' > '+campo+ '='+($('body').find(formulario+' *[name="'+campo+'"]').val()));
    	if((tipo=='text') || (tipo=='email') || (tipo=='select-one')){
	        if(($('body').find(formulario+' *[name="'+campo+'"]').val()=='') || ($('body').find(formulario+' *[name="'+campo+'"]').val()==0)){
	        	faltan.push(msj);
	        }
    	}else{
    		// var v =$('input[name="'+campo+'"]:checked').val();
    		// alert(v)
    		if($('input[name="'+campo+'"]:checked').val()==undefined){
    			faltan.push(msj);
    		}
    	}
    }
    // Leyendo Campos traidos
    var k = campos.length;
    for(var z = 0; z < k; z++){
    	faltante(formulario,campos[z],nombres_campos[z],enfermedades);
    }

    // Verificando elementos en Array 
    var l = faltan.length;
    
    /********************* ENFERMEDADES */
    if(($('body').find(formulario+' *[name="norecuerdo"]').prop('checked')!=false) || ($('body').find(formulario+' *[name="ninguna"]').prop('checked')!=false)){
    	enfermedades=1; // Ninguna o No Recuerdo Marcado: Pasa (Podría tambien marcar alguna enfermedad)
    }else{ // No marcó ni "Ninguna" ni "No recuerdo"
    	if(
    		($('body').find(formulario+' *[name="brucelosis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="ehrlichiosis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="hemobartonelosis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="leishmaniasis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="babesiosis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="filariasis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="toxoplasmosis"]').prop('checked')==false) && 
    		($('body').find(formulario+' *[name="anaplasma"]').prop('checked')==false)
    	)
    	{
    		enfermedades=2; // No marco ninguna Enfermedad: No pasa
    		faltan.push('¿Tu perrito ha padecido alguna enfermedad?');
    	}else{
    		enfermedades=3; // Marcó una enfermedad: Pasa.
    	}
    }
    /*********************/

    // Se da el alerta
    if(l!=0){
        var faltantes = faltan.join(', ');
        alert('Por favor complete los siguientes campos: '+faltantes);
        event.preventDefault();
        event.stopImmediatePropagation();
        return false;
    }else{
    	return true;
        event.preventDefault();
         event.stopImmediatePropagation();
        return false;
    }
};

$('body').find('#formularioMain').submit(function(event){
	var campos =new Array('nombre', 'apellido', 'correo', 'telefono', 'estado', 'municipio','desarrollo', 'raza', 'tamano', 'peso', 'desparasitado','nombremascota');
	var nombres_campos =new Array('Nombre', 'Apellido', 'Correo', 'Teléfono', 'Estado', 'Municipio','¿Cachorro o Adulto?', 'Raza', 'Tamaño', 'Peso', '¿Está desparasitado?', 'Nombre de la mascota');
	validacion('#formularioMain', campos, nombres_campos,event);
});
