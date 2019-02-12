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
									<input class="form-control" id="nombre" type="text" placeholder="introduce nombres">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Apellidos</label>
									<input class="form-control" id="apellidos" type="text" placeholder="Introduce apellidos">
								</div>
							</div>
						</div>

            <div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Sueldo</label>
									<input class="form-control" id="sueldo" type="text" placeholder="Introduce sueldo">
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
                          <option value="0">Seleccione un porcentaje</option>
                          <option value="5" >5%</option>
                          <option value="10" >10%</option>
                          <option value="15" >15%</option>
                          <option value="20" >20%</option>
                          <option value="25" >25%</option>
                          <option value="30" >30%</option>
                          <option value="35" >35%</option>
                          <option value="40" >40%</option>
                          <option value="45" >45%</option>
                          <option value="50" >50%</option>
                          <option value="55" >55%</option>
                          <option value="60" >60%</option>
                          <option value="65" >65%</option>
                          <option value="70" >70%</option>
                          <option value="75" >75%</option>
                          <option value="80" >80%</option>
                          <option value="85" >85%</option>
                          <option value="90" >90%</option>
                          <option value="95" >95%</option>
                          <option value="100" >100%</option>
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
                          <th>Porcentaje</th>
                          <th>Porcentaje sueldo</th>
                        </tr>
                      </thead>
                      <tbody id="bodyTable">
                        
                      </tbody>
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th style="text-align:right;">Total</th>
                          <th id="sueldoTotal"></th>
                        </tr>
                      </thead>
                    </table>
            

					</div>
				</div>
			</div>
		</div>
		<!-- /.col-->
	</div>
	<!-- /.row-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Modal title</h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>One fine body…</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="button">Save changes</button>
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
    proyecto.sueldo = sueldo * porcent / 100;
    sueldoTotal = sueldoTotal + proyecto.sueldo;
    suelAnt =  sueldo * porcent / 100;

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
                    var contenido3 = document.createTextNode(proyecto.porcentaje + '%');
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
            console.log('debe seleccionar un codigo de proyecto valido, ejemplo: 100-00-1');
          }
        }else{
          console.log('debe seleccionar un porcentaje');
        }

      }else{
        console.log('debe seleccionar un proyecto');
      }

    }else{
      console.log('debe ingresar el sueldo');
    }
  }

  function borrarProyecto(ind, idProy, sueldo){

    proyectosSelec.splice(ind,1);
    console.log('proyectosSelec', proyectosSelec);
    sueldoTotal = sueldoTotal - sueldo * 1;
    $('#' + idProy).remove();
    $('#SueldoTotal').text(sueldoTotal);
    numProy--;

  }
</script>