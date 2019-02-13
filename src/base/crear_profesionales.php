<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysqli_error());
mysqli_select_db($link,'huella_local') or die('No se pudo seleccionar la base de datos');

$query = 'SELECT * FROM proyectos';
$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error());

?>
<div class="animated fadeIn">
	<div class="row">

		<div class="col-sm-4 col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 style="display:inline-block;">Crear Profesional</h4>
					<div class="card-header-actions">
						<a class="card-header-action btn-setting" href="#">
							<i class="icon-settings"></i>
						</a>
						<a class="card-header-action btn-minimize" href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true">
							<i class="icon-arrow-up"></i>
						</a>
						<a class="card-header-action btn-close" href="#">
							<i class="icon-close"></i>
						</a>
					</div>
				</div>
				<div class="collapse show" id="collapseExample">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<h6>Datos personales</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Nombre</label>
									<input class="form-control" id="nombre" type="text" placeholder="Introduzca nombres">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Apellidos</label>
									<input class="form-control" id="apellidos" type="text" placeholder="Introduzca apellidos">
								</div>
							</div>
            </div>
            <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                  <label for="name">Fecha de nacimiento</label>
                  <div class="input-group">
									<input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
                  </div>
								</div>
              </div>
              <div class="col-sm-6">
								<div class="form-group">
                  <div class="form-group">
									<label for="name">Fecha ingreso</label>
									<input class="form-control" id="date2" name="date" placeholder="DD/MM/YYY" type="text"/>
								</div>
								</div>
							</div>
            </div>
          
            <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="name">Profesión</label>
									<input class="form-control" id="profesion" type="text" placeholder="Introduzca profesión" >
								</div>
              </div>
              <div class="col-sm-6">
								<div class="form-group">
									<label for="name">Área</label>
									<input class="form-control" id="area" type="text" placeholder="introduzca área" >
								</div>
							</div>
						</div>

			
                

            <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="name">Sueldo liquido</label>
									<input class="form-control" id="sueldo" type="text" placeholder="Introduzca sueldo liquido" onkeyup="haberes()">
								</div>
              </div>
              <div class="col-sm-6">
								<div class="form-group">
									<label for="name">Total haberes</label>
									<input class="form-control" id="sueldoHaberes" type="text" placeholder="Total haberes" disabled>
								</div>
							</div>
						</div>

					</div>

					<div class="row-separador">

					</div>

					<div class="card-body">

						<div class="row">
							<div class="col-sm-12">
								<h6>Agregar proyectos a profesional</h2>
              </div>
              <div class="form-group col-sm-7">
                        <label for="ccmonth">Proyectos</label>
                        <select class="form-control" id="proyectos">
                          <option value="0">Seleccione un proyecto</option>
                          <?php
                          while($proyecto = mysqli_fetch_assoc ( $result )){
                            
                          ?>
                          <option value="<?=$proyecto['codigo']?>" ><?=$proyecto['codigo']?> <?=$proyecto['nombre']?></option>
                          <?php
                          }
                          ?>

                          
                        </select>
              </div>
              <div class="form-group col-sm-3">
                        <label for="ccmonth">Pocentaje</label>
                        <select class="form-control" id="pocentajes">
                          <option value="0">Seleccione horas diarias</option>
                          <option value="1" >1 hora</option>
                          <option value="2" >2 horas</option>
                          <option value="3" >3 horas</option>
                          <option value="4" >4 horas</option>
                          <option value="5" >5 horas</option>
                          <option value="6" >6 horas</option>
                          <option value="7" >7 horas</option>
                          <option value="8" >8 horas</option>
                          
                        </select>
              </div>
              <div class="form-group col-sm-2">
              <label for="ccmonth">,</label>
              <button class="btn btn-block btn-success" type="button" onClick="seleccionarProyecto()">Agregar</button>
              </div>
						</div>

          
            <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Proyecto</th>
                          <th>Horas por dia</th>
                          <th>Porcentaje sueldo</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="bodyTable">
                        
                      </tbody>
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th style="text-align:right;">Total</th>
                          <th id="sueldoTotal">0</th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
            

					</div>
				</div>
			</div>
		</div>
		<!-- /.col-->
  </div>

  <div class="col-sm-12" style="margin-bottom:30px;">
      <button class="btn btn-success btn-block" onClick="crearProfesional()">Crear profesional</button>
  </div>
	<!-- /.row-->
	<div class="modal fade" id="carga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-success" role="document" id="modalContenedor">
			      <div class="modal-content" id="progress">
			      <div class="progress" >
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
									
								</div>
								
            </div> 
        <div class="modal-content" id="exito" style="display:none;">
				<div class="modal-header" >
                  <h4 class="modal-title">Exito</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p id="respuesta"></p>
                </div>	
</div>

              <!-- /.modal-content-->
            </div>
            <!-- /.modal-dialog-->
          </div>
</div>
<script>
  var proyectosSelec = [];
  var sueldoTotal = 0 ;
  var suelAnt = 0;
  var numProy = 0;
  var ant='bodyTable'
  function seleccionarProyecto(){

    var e = document.getElementById('proyectos');
    var idProy = e.options[e.selectedIndex].value;
    var proy = e.options[e.selectedIndex].text;
    var f = document.getElementById('pocentajes');
    var sueldo = document.getElementById('sueldo').value;
    var tdSueldoTotal= document.getElementById('sueldoTotal');
    var porcent = f.options[f.selectedIndex].value;
    var lenProy = idProy.split('-');
    var numVerf = lenProy[2];

    var verf = true;
    for(var i = 0;  i < proyectosSelec.length; i++){

        if(proyectosSelec[i].id == idProy){
          verf = false;
        }

    }
    
    var proyecto = new Object();
    proyecto.id = idProy;
    proyecto.nombre = proy;
    proyecto.porcentaje = porcent;
    proyecto.sueldo = parseInt(((porcent * 4)* sueldo / 160)*5);
    sueldoTotal = sueldoTotal + proyecto.sueldo;
    suelAnt =  parseInt(((porcent * 4)* sueldo / 160)*5);

    if(sueldo != '' || sueldo != 0){
      if(idProy != 0){
        if(porcent != 0){
          if(numVerf != 0){
            if ( verf == true  && sueldo >= sueldoTotal ) {  
                    proyectosSelec.push(proyecto);
                    
                    $('#sueldo').prop('disabled', true);

                    var tr = document.createElement('tr');
                    tr.id = 'tr' + idProy;

                    var contenedor = document.getElementById(ant); 
                    contenedor.appendChild(tr);

                    console.log('proyectos', proyectosSelec);

                    var td6 = document.createElement('td');

                    // var button = document.createElement('button');
                    // button.id = 'botonx' + numProy;
                    // $('#botonx' + numProy).on('click', function(){
                    //   console.log('hola');
                    // });
                    // button.onClick = function(){
                    //   console.log('hola');
                    // }
                    trIdProy = "'tr"+ idProy + "'";
                    td6.innerHTML='<button onClick="borrarProyecto(' + numProy + ',' + trIdProy+ ',' + proyecto.sueldo +' )" type="button" class="btn btn-danger">eliminar</button>';

                    var td4 = document.createElement('td');
                    var contenido4 = document.createTextNode(proyecto.sueldo);
                    td4.appendChild(contenido4);

                    var td3 = document.createElement('td');
                    var contenido3 = document.createTextNode(proyecto.porcentaje);
                    td3.appendChild(contenido3);
                    
                    var td2 = document.createElement('td');
                    var contenido2 = document.createTextNode(proyecto.nombre);
                    td2.appendChild(contenido2);

                    var td1 = document.createElement('td');
                    var contenido1 = document.createTextNode(proyecto.id);
                    td1.appendChild(contenido1);
                    

                    var trContenedor = document.getElementById('tr'+ idProy);
                    var contenido5 = document.createTextNode(sueldoTotal);
                    trContenedor.appendChild(td1);
                    trContenedor.appendChild(td2);
                    trContenedor.appendChild(td3);
                    trContenedor.appendChild(td4);
                    trContenedor.appendChild(td6);
                    tdSueldoTotal.innerHTML = sueldoTotal;
                    numProy++
                }else{
                  sueldoTotal = sueldoTotal - suelAnt;
                }

          }else{
              $("#carga").modal({backdrop: 'static', keyboard: false});
              $('.modal-title').html('Error');
              $('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
              $('#exito').css('display', 'block');
              $('#progress').css('display', 'none');
              $('#respuesta').html('debe seleccionar un codigo de proyecto valido, ejemplo: 100-00-1');
          }
        }else{
              $("#carga").modal({backdrop: 'static', keyboard: false});
              $('.modal-title').html('Error');
              $('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
              $('#exito').css('display', 'block');
              $('#progress').css('display', 'none');
              $('#respuesta').html('debe seleccionar un porcentaje');
        }

      }else{
              $("#carga").modal({backdrop: 'static', keyboard: false});
              $('.modal-title').html('Error');
              $('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
              $('#exito').css('display', 'block');
              $('#progress').css('display', 'none');
              $('#respuesta').html('debe seleccionar un proyecto');
      }

    }else{
              $("#carga").modal({backdrop: 'static', keyboard: false});
              $('.modal-title').html('Error');
              $('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
              $('#exito').css('display', 'block');
              $('#progress').css('display', 'none');
              $('#respuesta').html('debe ingresar el sueldo');
    }
  }

  function borrarProyecto(ind, idProy, sueldo){

    proyectosSelec.splice(ind,1);
    sueldoTotal = sueldoTotal - sueldo * 1;
    console.log('sueldoTotal', sueldoTotal);
    $('#' + idProy).remove();
    $('#sueldoTotal').text(parseInt(sueldoTotal));
    if(sueldoTotal === 0){
      $('#sueldo').prop('disabled', false);
    }
    numProy--;

  }

  function haberes(af){
    var sueldo = $('#sueldo').val();
    var isapre = sueldo * 7 /100;
    if(!af){
      af=0;
    }
    var afp = (sueldo * 10 /100) + af;
    var sCesantia = sueldo * 0.6 / 100;
    console.log('sueldo', sueldo);
    var total = (sueldo)*1 + (isapre)*1 + (afp)*1 + (sCesantia)*1;
    var haberes = $('#sueldoHaberes').val(parseInt(total)); 
  }
  $(document).ready(function(){
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({
		format: 'dd/mm/yyyy',
		container: container,
		todayHighlight: true,
		autoclose: true,
  });
  $("#sueldo").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

function crearProfesional(){
  $("#carga").modal({backdrop: 'static', keyboard: false});
  var name = document.getElementById('nombre').value;
  var apellidos = document.getElementById('apellidos').value;
  var fechaN = document.getElementById('date').value;
	var fechaI = document.getElementById('date2').value;
	var sueldoB = document.getElementById('sueldoHaberes').value;
	var sueldoL = document.getElementById('sueldo').value;
	var profesion = document.getElementById('profesion').value;
  var area = document.getElementById('area').value;
  
if(name !=='' && apellidos !== '' && fechaN !== '' && fechaI !== '' && sueldoL !== '' && profesion !== '' && area !== ''){
  var parametros = {nombres:name, apellidos:apellidos, fecha1: fechaN, fecha2: fechaI, haberes: sueldoB, sueldo: sueldoL, profesion: profesion, area: area, proyectos: proyectosSelec};
  $.ajax({
			data: parametros,
			url: 'base/creador_profesionales.php',
			type:'post',
			success:function(response){
				console.log('respose::', response);
				if(response == 1){
				console.log('entro', response);
				$('.modal-title').html('Error');
				$('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
				$('#exito').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuesta').html('Ocurrio un error al crear el proyecto, intentelo nuevamente');
        }
        if(response == 2){
				console.log('entro', response);
				$('.modal-title').html('Error');
				$('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
				$('#exito').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuesta').html('Ocurrio un error al crear el proyecto2, intentelo nuevamente');
				}
				if(response == 0){
				console.log('entro', response);
				$('.modal-title').html('Exito');
				$('#modalContenedor').removeClass('modal-danger').addClass('modal-success');
				$('#exito').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuesta').html('Proyecto creado exitosamente');
				}
							
			},
			error:function(response,errorThrown){
				$('#modalContenedor').removeClass('modal-success').addClass('modal-error');
				$('#exito').css('display', 'none');
				$('#error').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuestaError').html(response);
			}
	});
}else{
              $("#carga").modal({backdrop: 'static', keyboard: false});
              $('.modal-title').html('Error');
              $('#modalContenedor').removeClass('modal-success').addClass('modal-danger');
              $('#exito').css('display', 'block');
              $('#progress').css('display', 'none');
              $('#respuesta').html('debe llenar todos los campos');
}
  
  
		
}
</script>