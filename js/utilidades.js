$( document ).ready(function() {
	$( "#btnNuevoUsuario" ).on( "click", function() {
		var email = $("#txtEmail").val();
		var usuario = $("#txtUsuario").val();
		var password = $("#txtPassword").val();
		var rpassword = $("#txtRPassword").val();
		var mensaje = "";
		var validamensaje = 0;
		if(email == ''){
			mensaje += "Email Vacio </br>";
			validamensaje = 1;
		}
		if(usuario == ''){
			mensaje += "usuario Vacio </br>";
			validamensaje = 1;
		}
		if(password == ''){
			mensaje += "password Vacio </br>";
			validamensaje = 1;
		}
		if(rpassword == ''){
			mensaje += "rpassword Vacio </br>";
			validamensaje = 1;
		}
		if(validamensaje = 1){
			alert(mensaje);
		}				
	});
	$( "#btnAgregaTipo" ).on( "click", function() {
		var tipo = $("#txtTipo").val();
		var datos = "insertaTipo=insertaTipo&tipo="+tipo;
		var cont = 1;
		$.getJSON( "services.php", datos, function( data ) {
			var html = "";
				html += "<table border=1>";
					html += "<tr>";
						html += "<th></th>";
						html += "<th>Descripcion</th>";
					html += "</tr>";
					$.each( data, function( key, val ) {
						cont++;
						html += "<tr>";
							html += "<th>"+cont+"</th>";			 		
							html += "<td>"+val.desc+"</td>";
						html += "</tr>";
					});
			 	html += "</table>";
			 $("#divTipo").html(html);
		});
		$('#selTipo').empty();
		cargaTipoSel();
	});
	$( "#btnAgregaUnidad" ).on( "click", function() {
		var unidad = $("#txtUnidad").val();
		var datos = "insertaUnidad=insertaUnidad&unidad="+unidad;
		var cont = 1;
		$.getJSON( "services.php", datos, function( data ) {
			var html = "";
				html += "<table border=1>";
					html += "<tr>";
						html += "<th></th>";
						html += "<th>Descripcion</th>";
					html += "</tr>";
					$.each( data, function( key, val ) {
						cont++;
						html += "<tr>";
							html += "<th>"+cont+"</th>";
							html += "<td>"+val.desc+"</td>";
						html += "</tr>";
					});
			 	html += "</table>";
			 $("#divUnidad").html(html);
		});
		$('#selUnidad').empty();
		cargaUnidadSel();		
	});
	$( "#btnMedicamento" ).on( "click", function() {
		var tipo = $("#selTipo").val();
		var cantidad = $("#txtCantidad").val();
		var unidad = $("#selUnidad").val();
		var medicamento = $("#txtMedicamento").val();
		var datos = "insertaMedicamento=insertaMedicamento&tipo="+tipo+"&cantidad="+cantidad+"&unidad="+unidad+"&medicamento="+medicamento;
		var cont = 1;
		$.getJSON( "services.php", datos, function( data ) {
			var html = "";
				html += "<table border=1>";
					html += "<tr>";
						html += "<th></th>";
						html += "<th>Medicamento</th>";
						html += "<th>Tipo</th>";
						html += "<th>Cantidad</th>";						
						html += "<th>Unidad</th>";
						html += "<th>Ingredientes</th>";
					html += "</tr>";
					$.each( data, function( key, val ) {
						cont++;
						html += "<tr>";
							html += "<th>"+cont+"</th>";
							html += "<td>"+val.descM+"</td>";
							html += "<td>"+val.descU+"</td>";
							html += "<td>"+val.cantidad+"</td>";							
							html += "<td>"+val.descUM+"</td>";
							html += "<td align='center'><a class='info' idMDesc='"+val.descM+"' idM='"+val.id_medicamento+"' href='#'><span aria-hidden='true' class='glyphicon glyphicon-info-sign' data-toggle='modal' data-target='#modalGeneral'></span></a></td>";
						html += "</tr>";
					});
			 	html += "</table>";
			 $("#divMedicamento").html(html);
		});
	});

	$('body').delegate('.info','click', function() {
		var idM = $(this).attr('idM');
		var idMDesc = $(this).attr('idMDesc');
		$("#titulo").html(idMDesc);
        var cuerpo = '<h3>Agregar Ingredientes</h3>';
        	cuerpo += 	'<input type="hidden" name="txtIDMedic" id="txtIDMedic" value="'+idM+'" />';
            cuerpo += 	'<label for="selTipoI">Tipo:</label>';
			cuerpo += 		'<select name="selTipoI" id="selTipoI">';
			cuerpo += 		'</select>';
			cuerpo += 	'<label for="txtCantidadI">Cantidad:</label>'; 
			cuerpo += 		'<input type="text" size="10" name="txtCantidadI" id="txtCantidadI"></input>';
			cuerpo += 		'</select>';
			cuerpo += 	'<label for="selUnidadI">Unidad:</label>';
			cuerpo += 		'<select name="selUnidadI" id="selUnidadI">';
			cuerpo += 		'</select>';
			cuerpo += 	'<label for="txtIngrediente">Descripcion:</label>';
			cuerpo += 		'<input type="text" size="10" name="txtIngrediente" id="txtIngrediente"></input>';
			cuerpo += 	'<button class="btn btn-default" type="button" name="btnIngrediente" id="btnIngrediente">Agregar</button>';
			cuerpo += 	'<div id="divIngrediente"></div>';
			var datos1 = "insertaTipo=insertaTipo";
			$.getJSON( "services.php", datos1, function( data1 ) {
				var html1 = "";
					html1 += "<option value='0'>Selecciona</option>";
				$.each( data1, function( key1, val1 ) {
					html1 += "<option value='"+val1.id+"'>"+val1.desc+"</option>"
				});
				 $("#selTipoI").append(html1);
			});
			var datos2 = "insertaUnidad=insertaUnidad";
			$.getJSON( "services.php", datos2, function( data2 ) {
				var html2 = "";
					html2 += "<option value='0'>Selecciona</option>";
				$.each( data2, function( key2, val2 ) {
					html2 += "<option value='"+val2.id+"'>"+val2.desc+"</option>"
				});
				 $("#selUnidadI").append(html2);
			});
			var datos = "insertaIngrediente=insertaIngrediente&idMedic="+idM;
			var cont = 1;
			$.getJSON( "services.php", datos, function( data ) {
				var html = "";
					html += "<table border=1>";
						html += "<tr>";
							html += "<th></th>";
							html += "<th>Ingrediente</th>";
							html += "<th>Tipo</th>";
							html += "<th>Cantidad</th>";						
							html += "<th>Unidad</th>";
						html += "</tr>";
						$.each( data, function( key, val ) {
							cont++;
							html += "<tr>";
								html += "<th>"+cont+"</th>";
								html += "<td>"+val.descI+"</td>";
								html += "<td>"+val.descU+"</td>";
								html += "<td>"+val.cantidad+"</td>";							
								html += "<td>"+val.descUM+"</td>";
							html += "</tr>";
						});
				 	html += "</table>";
				 $("#divIngrediente").html(html);
			});				
			$("#cuerpo").html(cuerpo);
			$("#txtIDMedic").val(idM);		
	});
	$('body').delegate('#btnIngrediente','click', function() {
		var idMedic = $("#txtIDMedic").val();
		var tipo = $("#selTipoI").val();
		var cantidad = $("#txtCantidadI").val();
		var unidad = $("#selUnidadI").val();
		var ingrediente = $("#txtIngrediente").val();
		var datos = "insertaIngrediente=insertaIngrediente&idMedic="+idMedic+"&tipo="+tipo+"&cantidad="+cantidad+"&unidad="+unidad+"&ingrediente="+ingrediente;
		var cont = 1;
		$.getJSON( "services.php", datos, function( data ) {
			var html = "";
				html += "<table border=1>";
					html += "<tr>";
						html += "<th></th>";
						html += "<th>Ingrediente</th>";
						html += "<th>Tipo</th>";
						html += "<th>Cantidad</th>";						
						html += "<th>Unidad</th>";
					html += "</tr>";
					$.each( data, function( key, val ) {
						cont++;
						html += "<tr>";
							html += "<th>"+cont+"</th>";
							html += "<td>"+val.descI+"</td>";
							html += "<td>"+val.descU+"</td>";
							html += "<td>"+val.cantidad+"</td>";							
							html += "<td>"+val.descUM+"</td>";
						html += "</tr>";
					});
			 	html += "</table>";
			 $("#divIngrediente").html(html);
		});
	});
	$( "#showAdminTipo" ).on( "click", function() {
		$("#adminTipo").fadeIn(1000);
		$("#hideAdminTipo").fadeIn(1000);
	});
	$( "#hideAdminTipo" ).on( "click", function() {
		$("#adminTipo").fadeOut(1000);
		$("#hideAdminTipo").fadeOut(1000);
	});
	$( "#showAdminUnidad" ).on( "click", function() {
		$("#adminUnidad").fadeIn(1000);
		$("#hideAdminUnidad").fadeIn(1000);
	});
	$( "#hideAdminUnidad" ).on( "click", function() {
		$("#adminUnidad").fadeOut(1000);
		$("#hideAdminUnidad").fadeOut(1000);
	});
	$( "#showAdminMedicamento" ).on( "click", function() {
		$("#adminMedicamento").fadeIn(1000);
		$("#hideAdminMedicamento").fadeIn(1000);
	});
	$( "#hideAdminMedicamento" ).on( "click", function() {
		$("#adminMedicamento").fadeOut(1000);
		$("#hideAdminMedicamento").fadeOut(1000);
	});	
	///////////CARGA TIPO//////////////
	function cargaTipoSel (){
		var datos = "insertaTipo=insertaTipo";
			$.getJSON( "services.php", datos, function( data ) {
				var html = "";
					html += "<option value='0'>Selecciona</option>";
				$.each( data, function( key, val ) {
					html += "<option value='"+val.id+"'>"+val.desc+"</option>"
				});
				 $("#selTipo").append(html);
			});
	}
	function cargaUnidadSel (){
		var datos = "insertaUnidad=insertaUnidad";
			$.getJSON( "services.php", datos, function( data ) {
				var html = "";
					html += "<option value='0'>Selecciona</option>";
				$.each( data, function( key, val ) {
					html += "<option value='"+val.id+"'>"+val.desc+"</option>"
				});
				 $("#selUnidad").append(html);
			});
	}
	function cargaTablaMedicamento (){
		var datos = "insertaMedicamento=insertaMedicamento";
		var cont = 1;
		$.getJSON( "services.php", datos, function( data ) {
			var html = "";
				html += "<table border=1>";
					html += "<tr>";
						html += "<th></th>";
						html += "<th>Medicamento</th>";
						html += "<th>Tipo</th>";
						html += "<th>Cantidad</th>";						
						html += "<th>Unidad</th>";
						html += "<th>Ingredientes</th>";
					html += "</tr>";
					$.each( data, function( key, val ) {
						cont++;
						html += "<tr>";
							html += "<th>"+cont+"</th>";
							html += "<td>"+val.descM+"</td>";
							html += "<td>"+val.descU+"</td>";
							html += "<td>"+val.cantidad+"</td>";							
							html += "<td>"+val.descUM+"</td>";
							html += "<td align='center'><a class='info' idMDesc='"+val.descM+"' idM='"+val.id_medicamento+"' href='#'><span aria-hidden='true' class='glyphicon glyphicon-info-sign' data-toggle='modal' data-target='#modalGeneral'></span></a></td>";
						html += "</tr>";
					});
			 	html += "</table>";
			 $("#divMedicamento").html(html);
		});
	}	
	cargaTipoSel();
	cargaUnidadSel();
	cargaTablaMedicamento();
});