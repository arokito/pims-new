

  <!-- Modal Content -->
@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="jumbotron text-center">
      <h2>Role  </h2>
  

        
        
        <form action="{{ route('users.roles', $user->id) }}" method="POST">
            @csrf
 
        <div class="row mb-3">
          <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('role') }}</label>
      
          <div class="col-md-6">
            <select id="role" name="role" class="form-control" >
              <option value="">-- Select role --</option>
              @foreach ($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
              @endforeach
            </select>
          
      
          
          </div>
        </div>

           

              

        <div class="row mb-3 ">

          <div class="col-md-6  ">
            <button type="submit" class="btn btn-primary ">
              {{ __('Asign Role') }}
            </button>
        
          
          </div>
  
        
        
          </div>
      
        
       
    </form>


          </div>
       </div>
       </div>
    

    
@endsection
