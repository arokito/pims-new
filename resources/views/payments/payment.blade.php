@extends('layouts.guest')


@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="jumbotron text-center">
        <h2>Payment Form </h2>


<form action="/loadPesapalIframe" method="POST"> 
	@csrf


	<div class="row mb-3">
		<label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

		<div class="col-md-6">
			<input type="text" class="form-control " name="amount"  >

		
		</div>
	</div>

	<div class="row mb-3">
		<label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

		<div class="col-md-6">
			<input  type="text" class="form-control" name="type" value="MERCHANT" readonly="readyonly">

		
		</div>
	</div>

	<input type="hidden" name="description" value="contribution to church">

	<div class="row mb-3">
		<label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Contribution Category') }}</label>

		<div class="col-md-6">
			<select  name="category_id" class="form-control" >
				<option value="">-- Select Payment Method --</option>
				@foreach (\App\Models\ContributionCategory::all() as $cat)
					<option value="{{ $cat->id}}">{{ $cat->name }}</option>
				@endforeach
			</select>
		

		
		</div>
	</div>

       
				@php
					$timeString = time();
					$randNumber =rand(100000,999999);
					$referenceNumber=$timeString.''.$randNumber;
				@endphp

<div class="row mb-3">
	<label for="reference" class="col-md-4 col-form-label text-md-end">{{ __('Reference:') }}</label>

	<div class="col-md-6">
		<input  type="text" class="form-control" name="reference" value="{{ $referenceNumber }}" >

	
	</div>
</div>
	
	
		
			@foreach ($parishioner_pay as $parishioners )


			<div class="row mb-3">
				<label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name:') }}</label>
			
				<div class="col-md-6">
					<input  type="text" class="form-control" name="first_name" value="{{ $parishioners->first_name }}" >
			
				
				</div>
			</div>
			<input type="hidden" name="parishioner_id" value="{{  $parishioners->id}}">

			<div class="row mb-3">
				<label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name:') }}</label>
			
				<div class="col-md-6">
					<input  type="text" class="form-control" name="last_name" value="{{ $parishioners->last_name }}" >
			
				
				</div>
			</div>
				
		
			<div class="row mb-3">
				<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address:') }}</label>
			
				<div class="col-md-6">
					<input  type="text" class="form-control" name="email" value="{{ $parishioners->email }}" >
			
				
				</div>
			</div>
			
			@endforeach

			<div class="row mb-3 ">

				<div class="col-md-6  ">
					<button type="submit" class="btn btn-primary ">
						{{ __('Make Payment') }}
					</button>
			
				
				</div>

			
			
		    </div>
		
		
	</form>

	   </div>

   </div>
</div>
	
@endsection
























