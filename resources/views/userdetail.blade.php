@extends('layouts.master')

@section('title')
<title>GARMIN</title>

    
@endsection

@section('content')
	


	
	<title>Detail</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">

	<body class=" detail page ">

	


	<!--main area-->
	<main id="main" class="main-site">
        <div class="container">
            <h1>User Details</h1>
            <div>Account Id: <input name="account_id" value="{{ $user->account_id }}" readonly /></div>
            <div>Email: <input name="email" value="{{ $user->email }}" readonly /></div>
            <div>Fullname: <input name="fullname" value="{{ $user->fullname }}" readonly /></div>
            <div>Role: <select name="role">
                    <option value="0">Please choose one</option>
                    <option value="1" @if ($user->role == 1) selected @endif>Admin</option>
                    <option value="2" @if ($user->role == 2) selected @endif>User</option>
                </select>
            </div>
            <div>Active: <select name="active">
                    <option value="0">Please choose one</option>
                    <option value="1" @if ($user->active == 1) selected @endif>Active</option>
                    <option value="2" @if ($user->active == 2) selected @endif>Disable</option>
                </select>
            </div>
            <h4><a href="{{ url('home') }}">Return Back</a></h4>
        </div>

	</main>
	<!--main area-->


	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<!--footer area-->
	<script>
		$(document).ready(function(){
			$('.add-to-cart').click(function(e) {
			e.preventDefault();
			let pid = $(this).data("id");
			let quantity = $('input[name="product-quatity"]').val();
			$.ajx({
				type: 'post',
				url: {{ route('addCart') }},
				date: {
					id: pid,
					quantity: quantity,
					_token : '{{ csrf_token() }}'
				}, success: function(data) {
					alert('add product to cart successful,');
				}
			})
	
			});
		});
		
	</script>

@endsection
