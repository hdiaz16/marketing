 


<!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/mdb.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/header.js"></script>
    <!--Custom scripts-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script>
        // SideNav Initialization
        $(".button-collapse").sideNav();

        var container = document.querySelector('.custom-scrollbar');
        Ps.initialize(container, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });

        $('.datepicker').pickadate({

            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            weekdaysFull: ['Lunes', 'Martes', 'Miercoles','Jueves', 'Viernes','Sabado', 'Domingo'],
            weekdaysShort: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],
            formatSubmit: 'yyyy-mm-dd'


        });

        $(document).ready(function () {
            $('.mdb-select').material_select();
        });


    </script>
</body>

</html>