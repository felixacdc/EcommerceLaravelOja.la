<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
	@if (Session::has('error'))
		alert("{{Session::get('error')}}");
	@endif

	@if (Session::has('mensaje'))
		alert("{{Session::get('mensaje')}}");
	@endif
</script>