{{-- @extends('layouts.dashboard') --}}

{{-- @section('content') --}}
<!-- Button Modal -->
<button type="button" class="btn btn-block btn-info float-right" data-bs-toggle="modal" data-bs-target="#modalSignIn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
      <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
    </svg> &nbsp;
    Add
  </button>
  <!-- Modal Content -->
  <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header border-0">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body px-md-5">
                  <h2 class="h4 text-center">Parishioner </h2>
                
             
                      <!-- Form -->
                      
                      <form action="/self-reg" method="POST">
                          @csrf
                          <div class="row">
                            <div class="col">
                              <label for="first_name" >First name</label>
                              <input type="text" class="form-control" placeholder="First name" name="first_name">
                            </div>
                            <div class="col">
                              <label for="last_name">Last name</label>
                              <input type="text" class="form-control" placeholder="Last name" name="last_name">
                            </div>
                          </div>
  
                      <br>   
                      
                      <div class="row">
                          <label for="email">Your Email</label>
                          <div class="input-group">
                              <span class="input-group-text border-gray-300" id="basic-addon3">
                                  <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                              </span>
                              <input type="email" class="form-control border-gray-300" name="email" placeholder="example@company.com" autofocus required>
                          </div>  
                      </div> 
                      <br>
  
                          <div class="row">
                              <div class="col">
                                  <label for="ubatizo_date" >Ubatizo date</label>
  
                                <input type="date" name="ubatizo_date" class="form-control" placeholder="City">
                              </div>
                              <div class="col">
                                  <label for="gender" >Gender</label>
                                      <select  name="gender" autocomplete="gender" class="form-control">
                                        
  
                                        <option value="">..Select..</option>
                                        <option value="Male" @selected(old('gender') =="Male")>Male</option>
                                        <option value="Female" @selected(old('gender') =="Female")>Female</option>
                                        <option value="Unspecified" @selected(old('gender') =="Unspecified")>Unspecified</option>
                                 
                          
  
                                      </select>
                             
                              </div>
                              <div class="col">
                                  <label for="ndoa" >Ndoa</label>
                                  <select  name="ndoa" autocomplete="ndoa" class="form-control" >
                                      <option value="">..Select..</option>
                                      <option value="1">ndio</option>
                                      <option value="0">hapana</option>
  
                                    </select>
                              </div>
                            </div>
   
                            <br>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" placeholder="Sehemu ya ubatizo">
                              </div>
                              
                            </div>
                            <br>
                            <div class="row">
                              <div class="col">
                                <label for="Phone" >Phone</label>
                                <input type="phone" class="form-control" placeholder="eg. 0xxxxxxxxx" name="phone">
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
  
  <div class="clear-both"></div>
  
  <!-- End of Modal Content -->
      
  {{-- @endsection --}}