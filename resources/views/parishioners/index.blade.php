@extends('layouts.dashboard')

@section('content')

<script>
    function openModal(data, modal) {
        console.log(data, modal);

        if (modal == 'delete') {
            document.getElementById('formDelete').action = "/parishioners/" + data.id
        }

        if (modal == 'edit') {
            // Fillable data
            document.getElementById('first_name').value = data?.first_name;
            document.getElementById('last_name').value = data?.last_name;
            document.getElementById('phone').value = data?.phone;
            document.getElementById('email').value = data?.email;
            document.getElementById('ubatizo_place').value = data?.ubatizo_place;
            document.getElementById('ubatizo_date').value = data?.ubatizo_date;
            document.getElementById('ndoa').value = data?.ndoa;
            document.getElementById('gender').value = data?.gender;
            document.getElementById('family_id').value= data?.family_id;
            // Action
            document.getElementById('formUpdate').action = "/parishioners/" + data.id
        }
    }
</script>

<div class="shadow bg-white rounded p-4 mt-4">
    @include('parishioners.create')
    <div class="table-responsive py-4">
        <table class="table table-striped" id="datatable">
            <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
              
            </tr>
            </thead>
            <tbody>
                @foreach ($parishioners as $p)
                    
              
            <tr>
                <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                <td>{{ $p->phone }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <div class="d-flex flex-row">

                    <button type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalEdit" 
                        class="btn btn-link text-info m-0 p-0 mx-2"
                        onclick="openModal({{ json_encode($p) }}, 'edit')"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>  
                    
                    <button type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalDelete" 
                        class="btn btn-link text-danger m-0 p-0 mx-2"
                        onclick="openModal({{ json_encode($p) }}, 'delete')"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>  
    
                </div>
         
                  </td>
                
            </tr>
            @endforeach
       
            </tbody>
        </table>
        </div>
</div>


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger border-0">
                <h5 class="text-white">Delete</h5>
                <button type="button" class="btn-close bg-white rounded shadow" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-md-5">
                Are you sure you want to delete this paritioner?
            </div>   
            <div class="modal-footer">
                <form method="POST" action="" id="formDelete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-md-5">
                <h2 class="h4 text-center">Parishioner </h2>
              
           
                    <!-- Form -->
                    
                    <form action="" id="formUpdate" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                          <div class="col">
                            <label for="first_name" >First name</label>
                            <input type="text" class="form-control" placeholder="First name" name="first_name" id="first_name">
                          </div>
                          <div class="col">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" placeholder="Last name" name="last_name" id="last_name">
                          </div>
                        </div>

                    <br>   
                    
                    <div class="row">
                        <label for="email">Your Email</label>
                        <div class="input-group">
                            <span class="input-group-text border-gray-300" id="basic-addon3">
                                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </span>
                            <input type="email" class="form-control border-gray-300" name="email" id="email" placeholder="example@company.com" autofocus required>
                        </div>  
                    </div> 
                    <br>

                        <div class="row">
                            <div class="col">
                                <label for="ubatizo_date" >Ubatizo date</label>

                              <input type="date" name="ubatizo_date" id="ubatizo_date" class="form-control" placeholder="City">
                            </div>
                            <div class="col">
                                <label for="gender" >Gender</label>
                                    <select  name="gender" id="gender" autocomplete="gender" class="form-control">
                                      <option value="">..Select..</option>
                                      <option value="Male" @selected(old('gender') =="Male")>Male</option>
                                      <option value="Female" @selected(old('gender') =="Female")>Female</option>
                                      <option value="Unspecified" @selected(old('gender') =="Unspecified")>Unspecified</option>
                                    </select>
                            </div>
                            <div class="col">
                                <label for="ndoa" >Ndoa</label>
                                <select  name="ndoa" id="ndoa" autocomplete="ndoa" class="form-control" >
                                    <option value="">..Select..</option>
                                    <option value="1">ndio</option>
                                    <option value="0">hapana</option>

                                  </select>
                            </div>
                          </div>
 
                          <br>
                          <div class="row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Sehemu ya ubatizo" name="ubatizo_place" id="ubatizo_place">
                            </div>
                            
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label for="Phone" >Phone</label>
                              <input type="phone" class="form-control" placeholder="eg. 0xxxxxxxxx" name="phone" id="phone">
                            </div>

                            <div class="col">
                                <label for="Family" >Family</label>
                                <select id="family_id" name="family_id" autocomplete="family_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm select2">
                                    <option value="">--Select--</option>
                                    @foreach (App\Models\Family::all() as $family)
                                        <option value="{{ $family->id }} " @selected(old('family_id') == $family )>{{ $family->name }}</option>
                                    @endforeach

                                 </select>
                              </div>
                  
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">save</button>
                            <button type="button" class="btn btn-link text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                        </div>

                       

                          

                    <!-- End of Form -->
                    
                   
                </form>
                
               
               
            </div>
           
        </div>
    </div>
</div>

@endsection