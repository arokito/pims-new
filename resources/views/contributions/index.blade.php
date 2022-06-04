@extends('layouts.dashboard')

@section('content')

<script>
    function openModal(data, modal) {
        console.log(data, modal);

        if (modal == 'delete') {
            document.getElementById('formDelete').action = "/contributions/" + data.id
        }

     
    }
</script>

<div class="shadow bg-white rounded p-4 mt-4">
    <a href="{{ route('contributions.create') }}" class="btn btn-info float-right">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
          <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg> &nbsp;
        Add
      </a>
      <div class="clear-both"></div>

    <div class="table-responsive py-4">
        <table class="table table-striped" id="datatable">
            <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>payment method</th>
                <th>amount</th>
                <th>category</th>
                <th>actions</th>
              
            </tr>
            </thead>
            <tbody>
                @foreach ($contribution as $p)
                    
              
            <tr>

                @php
                $fetch_id = \App\Models\PaymentMethod::where('id', '=', $p->payment_method_id)->get();
                $fetch_cat_id = \App\Models\ContributionCategory::where('id', '=', $p->category_id)->get();
                $fetch_par_id = \App\Models\Parishioner::where('id', '=', $p->parishioner_id)->get();
            @endphp


                {{-- @foreach($fetch_par_id as $par_name) --}}

                @forelse ($fetch_par_id as $par_name)
                <td>{{ $par_name->first_name }}  {{ $par_name->last_name }}</td>
                @empty
                <td>SADAKA</td>
                @endforelse

                {{-- @if ($par_name == "")
                <td>SADAKA</td>
                    
                @else
                <td>{{ $par_name->first_name }}  {{ $par_name->last_name }}</td>
                    
                @endif --}}

           
               

                @foreach($fetch_id as $name)
                <td>{{ $name->name }}</td>
                @endforeach
         
                <td>{{ $p->amount }}</td>
              
              
                @foreach($fetch_cat_id as $cat_name)
                <td>{{ $cat_name->name }}</td>
                @endforeach

               
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


@endsection