
<div class="animated fadeIn">
	<div class="row">

		<div class="col-sm-4 col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 style="display:inline-block;">Crear Proyecto</h4>
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
								<h6>Datos proyecto</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Nombre del proyecto*</label>
									<input class="form-control" id="nombre" type="text" placeholder="introduce nombres">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group" >
									<label for="name" class="col-sm-12">codigo de proyecto*</label>
									<input class="formPeq col-sm-2" id="cod1" type="text" placeholder="100" maxlength="4">
                  					<span class="col-sm-1">-</span>
                  					<input class="formPeq col-sm-1" id="cod2" type="text" placeholder="00" maxlength="2">
                  					<span class="col-sm-1">-</span>
                  					<input class="formPeq col-sm-1" id="cod3" type="text" placeholder="0" maxlength="1">
								</div>
							</div>
						</div>
          </div>


          <div class="row-separador">

					</div>
          <div class="card-body">

            <div class="row">
							<div class="col-sm-12">
								<h6>Periodo de proyecto</h2>
							</div>
						</div>


            <div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="name">Fecha inicio*</label>
									<div class="input-group">
									<input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
                                </div>
									
								</div>
							</div>
              <div class="col-sm-3">
								<div class="form-group">
									<label for="name">Fecha fin*</label>
									<input class="form-control" id="date2" name="date" placeholder="DD/MM/YYY" type="text"/>
								</div>
							</div>
						</div>

            <div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="name">Descripción</label>
									<textarea class="form-control" id="descripcion" name="textarea-input" rows="9" placeholder="Content.." style="height: 225px;"></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
								<button class="btn btn-block btn-success" type="button" onClick="creaProyecto()">Crear proyecto</button>
								</div>
							</div>
						</div>

					</div>

		<!-- /.col-->
	</div>
	<!-- /.row-->
	<div class="modal fade" id="dangerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Error</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Debe llenar todos los campos requeridos</p>
                </div>
                
              </div>
              <!-- /.modal-content-->
            </div>
            <!-- /.modal-dialog-->
          </div>
		<!-- /.modal-dialog-->

		<div class="modal fade" id="carga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-success" role="document">
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
</div>
<script>
 
  function creaProyecto(){
    
	var name = document.getElementById('nombre').value;
	var cod1 = document.getElementById('cod1').value;
	var cod2 = document.getElementById('cod2').value;
	var cod3 = document.getElementById('cod3').value;
	var fechaI = document.getElementById('date').value;
	var fechaF = document.getElementById('date2').value;
	var descrip = document.getElementById('descripcion').value;
    
	if(nombre != '' && cod1 != '' && cod2 != '' && cod3 != '' && fechaI != '' && fechaF != ''){
		console.log('datos llenos');
		$("#carga").modal({backdrop: 'static', keyboard: false});
		var parametros = {codigo:cod1+'-'+cod2+'-'+cod3, nombre:name, fecha1: fechaI, fecha2: fechaF, descripcion: descrip};
		$.ajax({
			data: parametros,
			url: 'base/creador.php',
			type:'post',
			success:function(response){
				$('#exito').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuesta').html(response);
			},
			error:function(response,errorThrown){
				$('#exito').css('display', 'block');
				$('#progress').css('display', 'none');
				$('#respuesta').html(response);
			}
	});
		
	}else{
		console.log('debe llenar todos los campos');
		$("#dangerModal").modal();
	}


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
	$("#cod1, #cod2, #cod3").keydown(function (e) {
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
        
</script>