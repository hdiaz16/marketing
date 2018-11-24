<main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Dashboard Community Manager </strong></h3>

        </section >

        <br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tareas Atrasadas</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estado de Tareas</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">

		  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		  	 
		  	 <ul class="list-group list-group-flush">
			  <li class="list-group-item">Cras justo odio <button type="btn" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modalLRFormDemo">Ver</button></li>
			  <li class="list-group-item">Dapibus ac facilisis in</li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>

		  </div>

		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

		  	 <canvas id="myChart" ></canvas>
		  
		  </div>

		  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		  	
		  </div>
		</div>



		<!--Modal: Login / Register Form Demo-->
    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-2 red " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-times mr-1"></i> Tareas Atrasadas</a>
                        </li>
                        
                    </ul>

                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 17-->
                        <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                            <!--Body-->
                            <div class="modal-body mb-1">
                                <!-- Default form grid -->
                                <form>

                                   
                                    <!-- Grid row -->
                                    <div class="row">

                                         <!--Grid column-->
                                        <div class="md-form col-6">
                                            <input  type="text"  class="form-control " id="asig" name="asig">
                                            <label for="form3" >Asignado a la Tarea</label>

                                        </div>
                                        <!--Grid column-->

                                         <!--Grid column-->
                                        <div class="md-form col-6">

                                            <input  type="text"  class="form-control " id="desc" name="desc">
                                            <label for="form3" >Descripcion de la tarea</label>

                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="md-form col-6">

                                            <input  type="text"  class="form-control " id="desc" name="desc">
                                            <label for="form3" >Fecha Registrada</label>

                                        </div>
                                        <!--Grid column-->
                                        
                                    </div>
                                    <!-- Grid row -->
                                </form>

                            </div>

                            <div class="modal-footer">
   
                            </div>

                        </div>
                        <!--/.Panel 7-->

                    </div>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login / Register Form Demo-->


       



    </main>



<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["En proceso", "Aceptadas", "Cancelada", "Atrasada"],
        datasets: [{
            label: 'Estados de las Tareas ',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>