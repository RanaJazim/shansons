@extends('/admin.dashboard.header')


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
	    <small>Subheading</small>
	</h1>

	<div class="alert alert-info">
		<p>Dashboard > Store > Main Store > Fuel</p>
	</div>
	

	<div class="row someTopMargin">

		<div class="column">
		  <a href="{{ route('petrole.create') }}">
		  	<div class="card sales">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Petrole</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="{{ route('diesel.create') }}">
		  	<div class="card purchase">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Diesel</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="{{ route('cuttingoil.create') }}">
		  	<div class="card supplier">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Cutting Oil</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="#">
		  	<div class="card item">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Hydraulic Oil</h3>
		  	</div>
		  </a>
		</div>
		

	</div>

	<div class="row someTopMargin">
		
		<div class="column">
		  <a href="#">
		  	<div class="card employee">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Rendo Oil</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="#">
		  	<div class="card item">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Mobol Oil</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="#">
		  	<div class="card attendence">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Mustard Oil</h3>
		  	</div>
		  </a>
		</div>

		<div class="column">
		  <a href="#">
		  	<div class="card purchase">
		  	  <p><i class="fa fa-filter section-fa"></i></p>
		  	  <h3>Koroshine Oil</h3>
		  	</div>
		  </a>
		</div>

	</div>

	<div style="margin-top: 50px;"></div>



@endsection
