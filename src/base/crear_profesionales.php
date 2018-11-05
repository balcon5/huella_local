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
                          <option value="2" >2</option>
                          <option value="3" >3</option>
                          <option value="4" >4</option>
                          <option value="5" >5</option>
                          <option value="6" >6</option>
                        </select>
              </div>
              <div class="form-group col-sm-3">
                        <label for="ccmonth">Pocentaje</label>
                        <select class="form-control" id="pocentajes">
                          <option value="0">Seleccione un porcentaje</option>
                          <option value="5%" >5%</option>
                          <option value="10%" >10%</option>
                          <option value="15%" >15%</option>
                          <option value="20%" >20%</option>
                          <option value="25%" >25%</option>
                        </select>
              </div>
              <div class="form-group col-sm-2">
              <label for="ccmonth"></label>
              <button class="btn btn-block btn-success" type="button" onClick="seleccionarProyecto()">Agregar</button>
              </div>
						</div>

          
            <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>Proyecto</th>
                          <th>Código</th>
                          <th>Porcentaje</th>
                        </tr>
                      </thead>
                      <tbody id="bodyTable">
                        
                      </tbody>
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
  var ant='bodyTable'
  function seleccionarProyecto(){

    var e = document.getElementById('proyectos');
    var idProy = e.options[e.selectedIndex].value;
    var f = document.getElementById('pocentajes');
    var porcent = f.options[f.selectedIndex].value;

    console.log('proyecto', idProy);

    var verf = true;
    for(var i = 0;  i < proyectosSelec.length; i++){

        if(proyectosSelec[i].id == idProy){
          verf = false;
        }

    }
    if ( verf == true && idProy != 0 && porcent !== 0 ) {
    var proyecto = new Object();
    proyecto.id = idProy;
    proyecto.nombre = 'Proyecto Topulen';
    proyecto.porcentaje = porcent; 
    proyectosSelec.push(proyecto);

    var tr = document.createElement('tr');
    tr.id = 'tr' + idProy;

    var contenedor = document.getElementById(ant); 
    contenedor.appendChild(tr);

    console.log('proyectos', proyectosSelec);

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
    trContenedor.appendChild(td1);
    trContenedor.appendChild(td2);
    trContenedor.appendChild(td3);
    }


    


  }
</script>