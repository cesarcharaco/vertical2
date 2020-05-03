<!-- Jquery JS-->
<script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

<!--SCRIPT DE LENTITUD-->
<!--<script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>-->

<script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}">
</script>
<!-- Main JS-->
<script src="{{ asset('js/main.js') }}"></script>
<script>
	// FUNCIÓN PARA INPUT ACEPTE SOLO NÚMERO //
	jQuery('.soloNumeros').keypress(function (tecla) {
	  if (tecla.charCode < 48 || tecla.charCode > 57) return false;
	});

	// FUNCIÓN PARA INPUT ACEPTE SOLO LETRAS//
	function soloLetras(e) {
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toLowerCase();
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	    especiales = [8, 37, 39, 46];

	    tecla_especial = false
	    for(var i in especiales) {
	        if(key == especiales[i]) {
	            tecla_especial = true;
	            break;
	        }
	    }

	    if(letras.indexOf(tecla) == -1 && !tecla_especial)
	        return false;
	}

	function limpia() {
	    var val = document.getElementById("miInput").value;
	    var tam = val.length;
	    for(i = 0; i < tam; i++) {
	        if(!isNaN(val[i]))
	            document.getElementById("miInput").value = '';
	    }
	}
	</script>


    <!-- Start datatable js -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/responsive.bootstrap.min.js') }}"></script>
    <script>
    	/*================================
	    datatable active
	    ==================================*/
	    if ($('#dataTable').length) {
	        $('#dataTable').DataTable({
	            responsive: true
	        });
	    }
	    if ($('#dataTable2').length) {
	        $('#dataTable2').DataTable({
	            responsive: true
	        });
	    }
	    if ($('#dataTable3').length) {
	        $('#dataTable3').DataTable({
	            responsive: true
	        });
	    }
	    if ($('#dataTable7').length) {
	        $('#dataTable7').DataTable({
	            responsive: true
	        });
	    }
	    if ($('#dataTable5').length) {
	        $('#dataTable5').DataTable({
	            responsive: true
	        });
	    }
	    if ($('#dataTable9').length) {
	        $('#dataTable9').DataTable({
	            responsive: true
	        });
	    }
    </script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
@yield('scripts')

