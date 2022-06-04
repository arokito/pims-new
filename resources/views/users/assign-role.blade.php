

  <!-- Modal Content -->
@extends('layouts.dashboard')

@section('content')

<div class="modal-body px-md-5">
    <h2 class="h4 text-center"> assign role</h2>
  

        <!-- Form -->
        
        <form action="{{ route('users.roles', $user->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <label for="first_name" >Role Name</label>
                <select id="role" name="role" autocomplete="role-name">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
              </div>
             
            </div>

        <br>   
        


              <div class="modal-footer">
                <button type="submit" class="btn btn-secondary">save</button>
             
            </div>

           

              

        <!-- End of Form -->
        
       
    </form>
    
   
   
</div>


<div class="clear-both"></div>
    
@endsection
