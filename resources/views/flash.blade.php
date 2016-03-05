@if(session()->has('flash_message'))
	<script type="text/javascript">
		swal({
			title: "Success",
			text: "{{session('flash_message')}}",
			type: "info",
			timer: 2000,
			showConfirmButton: false
		});

	</script>
@endif