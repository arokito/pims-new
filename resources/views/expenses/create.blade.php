<button type="button" class="btn btn-block btn-info float-right" data-bs-toggle="modal" data-bs-target="#modalexpense">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
      <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
    </svg> &nbsp;
    Add
  </button>

  <!-- Modal Content -->
<div class="modal fade" id="modalexpense" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-md-5">
                <h2 class="h4 text-center">Expense</h2>
              
           
                    <!-- Form -->
                    
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col">
                            <label for="amount" >amount</label>
                            <input type="number" class="form-control" placeholder="amount" name="amount">
                          </div>
                         
                        </div>

                    <br> 
                    
                    
                      <div class="row ">
                          <div class="col">
                            <label for="description" >description</label>
                            <input type="textarea" class="form-control" placeholder="description" name="description">

                           

                          </div>
              
                      </div>
                      <br>

                    
   

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