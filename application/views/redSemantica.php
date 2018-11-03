
<style type="text/css">
        #mynetwork {
            width: 700px;
            height: 400px;
            border: 1px solid lightgray;
        }
    </style>

<main>
	

	<section class="mt-2">
            <h3 class="text-center"><strong>Red Semantica</strong></h3>

            <section class="text-right">

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red" onclick="">
                <i class="fa fa-minus"></i>
            </button>
                
            </section>

             

        </section >


</main>

<section class="col-6 offset-2">
	
	<div id="mynetwork"></div>

</section>

<div hidden>

	<ul id="info" class="list-unstyled" >
 	 <li>
 	 	
 	 </li>
 	

 	</ul>
	
</div>




<!--Modal: Login / Register Form-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Agregar Nodo</a>
                                    </li>
                                  
                                </ul>

                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 7-->
                                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body mb-1">
                                            <div class="row">
                                                    <!-- Grid column -->
                                                     <div class="col-6 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control nom">
                                                        <label for="form3" >Nombre del Nodo</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        
                                                        <label for="textareaBasic">Seleccionar Tipo de Nodo </label>
                                                        <select class="custom-select" id="inputGroupSelect01">
														    <option selected>Choose...</option>
														    <option value="1">One</option>
														    <option value="2">Two</option>
														    <option value="3">Three</option>
														</select>
                                                    </div>
                                                    <!-- Grid column -->
                                                    
                                                </div>
                                                <!-- Grid row -->
                                            
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <button class="btn-floating btn-lg success-color" onclick="addUsuarios();">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                        </div>

                                    </div>
                                    <!--/.Panel 7-->

                                </div>

                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Login / Register Form-->
 


<script type="text/javascript">

	var info = document.getElementById('info');
    // create an array with nodes
    var nodes = [
        {id: 1, label: 'Padre 1',color: '#f10000',title: info,  shape: 'circle' },

        {id: 2, label: 'Hijo 1',color: '#00c90f', title: info,shape: 'circle'},

        {id: 3, label: 'Nieto 1',color: '#ffff0f', title: info,shape: 'circle'},

        {id: 4, label: 'Nieto 2',color: '#ffff0f',title: info,shape: 'circle'},



        

        
    ];

    var nodes1 = {
             id: '1', nombre: 'PADRE',title: info, hijos: [{ 

                 id: '2', nombre: 'HIJO',title: info, hijos: [{ 

                 	id: '3', nombre: 'NIETO', title: info
                 }]

             }] 
             
        };

    // create an array with edges
    var edges = [
        {from: 1, to: 2},
        {from: 2, to: 3},
        {from: 2, to: 4}
    ];

    // create a network
    var container = document.getElementById('mynetwork');

    var data = {
        nodes: nodes,
        edges: edges
    };

    

    var network = new vis.Network(container, data, {});
</script>








