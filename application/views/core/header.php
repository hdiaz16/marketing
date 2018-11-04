<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Marketing</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mdb.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>

    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>

<body class="fixed-sn mdb-skin" >

     <!--Main Navigation-->
    <header>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav  fixed"  >
            <ul class="custom-scrollbar">
            <!-- Logo -->
            <li class="logo-sn waves-effect">
                <div class="text-center">
                    <a href="<?php echo base_url();?>index.php/Inicio/index" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" class=""></a>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">

                    
                    <li //<?php echo $this->session->userdata['perfil-actual']['rol_id'] == 1 ? "hidden" : ""; ?> ><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> Administrador<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/AgregarCM/index" class="waves-effect">Agregar Usuarios a Campañas</a>
                                    </li>

                                </ul>
                            </div>
                    </li>

                   


                    
                    <li <?php echo $this->session->userdata['perfil-actual']['rol_id'] == 2 ? "" : "hidden" ?> ><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> Community Manager<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Campanas/index">
                                            <i class="fa fa-th"></i>
                                            Agregar Campañas
                                        </a>  
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url();?>index.php/AgregarUsuarios/index" class="waves-effect">
                                            <i class="fa fa-users"></i>
                                            Agregar Usuarios
                                        </a>
                                    </li>

                                    <li><a href="<?php echo base_url();?>index.php/RedSemantica/index"  class="waves-effect">Vista de Red Semantica</a>
                                    </li>

                                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Agenda/index"><i class="fa fa-book"></i> Agenda</a>
                                    </li>

                                    <li>
                                        <a href="../dashboards/v-2.html" class="waves-effect">
                                            <i class="fa fa-share" aria-hidden="true"></i>
                                            Publicaciones
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url();?>index.php/AgregarTareas/index" class="waves-effect">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            Tareas
                                        </a>
                                    </li>


                                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Dashboard/index"><i class="fa fa-tachometer"></i> Dashboard</a>
                                    </li>

                                    <li>
                                        <a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Chat/index">
                                            <i class="fa fa-comments" aria-hidden="true"></i> 
                                            Chat
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                    </li>
                

                   

                    <li <?php echo $this->session->userdata['perfil-actual']['rol_id'] == 3 ? "hidden" : "" ?> ><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> Generador de Contenido<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/Contenido/index" class="waves-effect">Crear Contenido</a>
                                    </li>
                                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Agenda/index"><i class="fa fa-book"></i> Agenda</a>
                                    </li>
                                   

                                    
                                    
                                </ul>
                            </div>
                    </li>
                

                  
                    
                  
                    <li <?php echo $this->session->userdata['perfil-actual']['rol_id'] == 4 ? "hidden" : "" ?>><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i>Diseñador Grafico<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php/Diseo/index" class="waves-effect">Crear Diseños</a>
                                    </li>
                                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url();?>index.php/Agenda/index"><i class="fa fa-book"></i> Agenda</a>
                                    </li>
                                    

                                    
                                    
                                </ul>
                            </div>
                    </li>
                

                     
                    
                    <li <?php echo $this->session->userdata['perfil-actual']['rol_id'] == 5  ? "hidden" : "" ?> ><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i>Cliente<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="../dashboards/v-1.html" class="waves-effect">Dashboard</a>
                                    </li>
                                    

                                    
                                    
                                </ul>
                            </div>
                    </li>
                        
                </ul>
            </li>
            <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Marketing</p>
            </div>

            <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="d-none d-md-inline-block">Perfiles</span>
                    </a>
                    

                    <?php foreach ($this->session->userdata['perfiles'] as $row) {?>
                       
                    
                        <div class="dropdown-menu dropdown-menu-right  " aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span ><?php echo $row['nombre'];?></span>
                                <input type="hidden" id="rolID" value="<?php echo $row['rol_id'];?>" >
                                <span class="float-right"></span>
                            </a>
                        </div>

                    <?php  } ?>

                </li>


                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="badge red">3</span> <i class="fa fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notificaciones</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-money mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-money mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-line-chart mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>
               
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="modal" data-target="#modalLoginAvatarDemo">
                        <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
                    </a>
                    
                   
                </li>

            </ul>
            <!--/Navbar links-->
        </nav>
        <!-- /.Navbar -->

    </header>
    <!--Main Navigation-->





    <!--Modal Form Login with Avatar Demo-->
                <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Header-->
                            <div class="modal-header">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle img-fluid">
                            </div>
                            <!--Body-->
                            <div class="modal-body text-center mb-1">

                                <h6 class="mt-1 mb-2 text-left">
                                   <strong>Nombre: </strong> 
                                   <?php echo $this->session->userdata['usuario']['nombres']?> 
                                    <?php echo $this->session->userdata['usuario']['apellidos']?> 
                                </h6>

                                <h6 class="mt-1 mb-2 text-left">
                                     <strong>Correo: </strong> <?php echo $this->session->userdata['usuario']['correo']?> 
                                </h6>

                                <h6 class="mt-1 mb-2 text-left">
                                    <strong>Perfil: </strong> 
                                    <?php echo $this->session->userdata['perfil-actual']['nombre'] ?>     
                                </h6>
                               

                                

                               
                            </div>

                            <div class="modal-footer">
                                                
                                                 <a type="button" onclick="cerrarSesion();" class="btn-floating btn-lm red"><i class="fa fa fa-sign-out ml-1"></i></a>
                                        </div>

                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal Form Login with Avatar Demo-->