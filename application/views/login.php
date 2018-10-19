<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Marketing Digital</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    
    

 
</head>

<body>

<!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>Marketing Digital</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                    
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!--Intro Section-->
        <section class="view intro-2 hm-gradient">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row flex-center pt-5 mt-3">
                        <div class="col-md-12 col-lg-6 text-center text-md-left margins">
                            <div class="white-text">
                                <h1 class="h1-responsive font-bold wow fadeInLeft" data-wow-delay="0.3s">¿Que es Marketing Digital? </h1>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                                <h6 class="wow fadeInLeft" data-wow-delay="0.3s">El marketing digital es la aplicación de las estrategias de comercialización llevadas a cabo en los medios digitales. 
                                </h6>
                                <br>
                                
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6  wow fadeInRight d-flex justify-content-center" data-wow-delay="0.3s">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLRFormDemo">Iniciar Sesion  </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
            

                          

                            <!--Modal: Login / Register Form Demo-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#panel17" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#panel18" role="tab"><i class="fa fa-user-plus mr-1"></i> Registrarse</a>
                                    </li>
                                </ul>

                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 17-->
                                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                                        <!--Body-->
                                        <?php echo validation_errors(); ?>
                                        <?php echo form_open('login/iniciarsesion'); ?>
                                        <div class="modal-body mb-1">
                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="usuario" name="correo" class="form-control form-control-sm">
                                                <label for="form2">Email</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="contrasena" name="contrasenia" class="form-control form-control-sm">
                                                <label for="form3">Contraseña</label>
                                            </div>
                                            <div class="text-center mt-2">
                                                <button type="submit" class="btn btn-info" >Iniciar <i class="fa fa-sign-in ml-1"></i></button>
                                            </div>
                                        </div>
                                        </form>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <div class="options text-center text-md-right mt-1">
                                                
                                            </div>
                                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                                        </div>

                                    </div>
                                    <!--/.Panel 7-->

                                    <!--Panel 18-->
                                    <div class="tab-pane fade" id="panel18" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body">
                                            <div class="md-form form-sm">
                                                <i class="fa fa-envelope prefix"></i>
                                                <input type="text" id="form14" class=" usuario1 form-control form-control-sm" >
                                                <label for="form14">Email</label>
                                            </div>

                                            <div class="md-form form-sm">
                                                <i class="fa fa-lock prefix"></i>
                                                <input type="password" id="form5" class=" cotrasena1 form-control form-control-sm  " id="cotrasena1">
                                                <label for="form5">Contraseña</label>
                                            </div>

                                            

                                            <div class="text-center form-sm mt-2">
                                                <button class="btn btn-info" onclick="registro();">Registrarse <i class="fa fa-sign-in ml-1" ></i></button>
                                            </div>

                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <div class="options text-right">
                                                <p class="pt-1">Ya tienes cuenta ? <a href="#"  class="blue-text">Login</a></p>
                                            </div>
                                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    <!--/.Panel 8-->
                                </div>

                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Login / Register Form Demo-->
                        </div>

                        
                    </div>
                </div>
            </div>
       


    </header>
    <!--Main Navigation-->




    <!--  SCRIPTS  -->
    <!-- JQuery -->

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/mdb.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    

    


    <script>
        new WOW().init();
    </script>
</body>
</html>
