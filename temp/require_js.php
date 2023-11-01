<script type="text/javascript">

var WEBSITE_ADMIN_URL	=	"<?php echo WEBSITE_ADMIN_URL; ?>";

</script>

<!-- jQuery -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>



<!-- Bootstrap Core JavaScript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- DataTables JavaScript -->

<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>




<script src="<?php echo JS ?>jquery.validate.min.js" type="text/javascript" language="Javascript"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script type="text/javascript">



function preloader(num){

	if(num > 0){

		$("#infopreloader").fadeIn();

	}else{

		$("#infopreloader").fadeOut();

	}

}



$(document).keydown(function(e) {

    if (e.keyCode == 27){ 

		alert("Escape Button disabled");

		return false

	

	};

});



$(document).ready(function() {

	$('#btnCancel').click(function () {

		

		location.href = '<?php $hyperlink = $hyperlink ?? ''; echo INDEX_PAGE.$hyperlink; ?>';

	});

	

	$('#dataTables-example').DataTable({

			responsive: true

	});

	$('#dataTables-top-offers').DataTable({
		responsive: true,
		order: [[4, 'desc']]
	});

	preloader(0);


});

</script>