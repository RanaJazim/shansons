@extends('panel.dashboard.header')


@section('title')

	Sections

@endsection


@section('styling')

	<style type="text/css">

		.* {
		  box-sizing: border-box;
		}

		/* Float four columns side by side */
		.column {
		  float: left;
		  width: 25%;
		  padding: 0 5px;
		}

		.row {margin: 0 -5px;}

		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		/* Responsive columns */
		@media screen and (max-width: 600px) {
		  .column {
		    width: 100%;
		    display: block;
		    margin-bottom: 10px;
		  }
		}

		/* Style the counter cards */
		.card {
		  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		  padding: 16px;
		  text-align: center;
		  background-color: #97A083;
		  color: white;
		}

		.section-fa {font-size:50px;}

		.someTopMargin {
			margin-top: 30px;
		}

		/* adding some Background colors */
		.sales {
			background: #31b0d5;
		}

		.purchase {
			background: #449d44;
		}

		.supplier {
			background: #ec971f;
		}

		.item {
			background: #286090;
		}

		.employee {
			background: #c9302c;
		}

		.reports {
			background: #e6e6e6;
		}

		.attendence {
			background: #000099;
		}

		.column a {
			text-decoration: none;
		}


	</style>

@endsection


@section('dashboard-content')

	<h1 class="page-header">
	    Dashboard
	</h1>

	<div class="alert alert-info">
		<p>Dashboard </p>
	</div>

	<div class="alert alert-success">
		<p class="text-center">You are logged in as admin</p>
	</div>


	<div class="row someTopMargin">

		{{-- @inject('restriction', 'App\Custom\RestrictRole') --}}


		<div class="column">
			<a href="">
				<div class="card sales">
				<p><i class="fa fa-home section-fa"></i></p>
				<h3>Gate</h3>
				</div>
			</a>
		</div>

		<div class="column">
			<a href="">
				<div class="card purchase">
					<p><i class="fa fa-shopping-cart section-fa"></i></p>
					<h3>Store</h3>
				</div>
			</a>
		</div>

		<div class="column">
			<a href="">
				<div class="card employee">
				<p><i class="fa fa-briefcase section-fa"></i></p>
				<h3>HR</h3>
				</div>
			</a>
		</div>

		<div class="column">
			<a href="">
				<div class="card attendence">
					<p><i class="fa fa-usd section-fa"></i></p>
					<h3>Accounts</h3>
				</div>
			</a>
		</div>


	</div>

	<div style="margin-top: 50px;"></div>



@endsection
