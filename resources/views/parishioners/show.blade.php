   
   
   @extends('layouts.dashboard')
   
   
@section('content')
<div class="container flex-grow-1 container-p-y">

    @foreach ($parishioners as $p)
       <!-- Header -->
       <div class="container-m-nx container-m-ny theme-bg-white mb-4">
        <div class="media col-md-10 col-lg-8 col-xl-7 py-5 mx-auto">
          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-100 rounded-circle">
          <div class="media-body ml-5">
            <h4 class="font-weight-bold mb-4">{{ $p->first_name }} {{ $p->last_name }}</h4>
  
            <div class="text-muted mb-4">
              {{ $p->middle_name }}
            </div>
  
            <a href="javascript:void(0)" class="d-inline-block text-body">
              <strong>234</strong>
              <span class="text-muted">followers</span>
            </a>
            <a href="javascript:void(0)" class="d-inline-block text-body ml-3">
              <strong>111</strong>
              <span class="text-muted">following</span>
            </a>
          </div>
        </div>
        <hr class="m-0">
      </div>
      <!-- Header -->
  
      <div class="row">
        <div class="col">
  
          <!-- Info -->
          <div class="card mb-4">
            <div class="card-body">
  
              <div class="row mb-2">
                <div class="col-md-3 text-muted">Tarehe ya  Ubatizo:</div>
                <div class="col-md-9">
                  {{ $p->ubatizo_date }}
                </div>
              </div>
  
              <div class="row mb-2">
                <div class="col-md-3 text-muted">Sehemu ya ubatizo:</div>
                <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-body">{{ $p->ubatizo_place }}</a>
                </div>
              </div>
  
              <div class="row mb-2">
                <div class="col-md-3 text-muted">Languages:</div>
                <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-body">English</a>
                </div>
              </div>
  
              <h6 class="my-3">Contacts</h6>
  
              <div class="row mb-2">
                <div class="col-md-3 text-muted">Phone:</div>
                <div class="col-md-9">
                 {{ $p->phone }}
                </div>
              </div>
  
              <h6 class="my-3">Interests</h6>
  
              <div class="row mb-2">
                <div class="col-md-3 text-muted">Favorite music:</div>
                <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-body">Rock</a>,
                  <a href="javascript:void(0)" class="text-body">Alternative</a>,
                  <a href="javascript:void(0)" class="text-body">Electro</a>,
                  <a href="javascript:void(0)" class="text-body">Drum &amp; Bass</a>,
                  <a href="javascript:void(0)" class="text-body">Dance</a>
                </div>
              </div>
  
              <div class="row">
                <div class="col-md-3 text-muted">Favorite movies:</div>
                <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-body">The Green Mile</a>,
                  <a href="javascript:void(0)" class="text-body">Pulp Fiction</a>,
                  <a href="javascript:void(0)" class="text-body">Back to the Future</a>,
                  <a href="javascript:void(0)" class="text-body">WALL·E</a>,
                  <a href="javascript:void(0)" class="text-body">Django Unchained</a>,
                  <a href="javascript:void(0)" class="text-body">The Truman Show</a>,
                  <a href="javascript:void(0)" class="text-body">Home Alone</a>,
                  <a href="javascript:void(0)" class="text-body">Seven Pounds</a>
                </div>
              </div>
  
            </div>
            <div class="card-footer text-center p-0">
              <div class="row no-gutters row-bordered row-border-light">
                <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                  <div class="font-weight-bold">{{ $parishioner->family->community->name ?? "N/A" }}</div>
                  <div class="text-muted small">Community</div>
                </a>
                <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                  <div class="font-weight-bold">51</div>
                  <div class="text-muted small">videos</div>
                </a>
                <a href="javascript:void(0)" class="d-flex col flex-column text-body py-3">
                  <div class="font-weight-bold">215</div>
                  <div class="text-muted small">photos</div>
                </a>
              </div>
            </div>
          </div>
          <!-- / Info -->
  
          <!-- Posts -->
  
          
  
          
          <!-- / Posts -->
  
        </div>
        <div class="col-xl-4">
  
          <!-- Side info -->
          <div class="card mb-4">
            <div class="card-body">
              <a href="javascript:void(0)" class="btn btn-primary rounded-pill">+&nbsp; Follow</a>
              &nbsp;
              <a href="javascript:void(0)" class="btn icon-btn btn-default md-btn-flat rounded-pill">
                <span class="ion ion-md-mail"></span>
              </a>
            </div>
            <hr class="border-light m-0">
            <div class="card-body">
              <p class="mb-2">
                <i class="ion ion-md-desktop ui-w-30 text-center text-lighter"></i> UI/UX Designer</p>
              <p class="mb-2">
                <i class="ion ion-ios-navigate ui-w-30 text-center text-lighter"></i> London, United Kingdom</p>
              <p class="mb-0">
                <i class="ion ion-md-globe ui-w-30 text-center text-lighter"></i>
                <a href="javascript:void(0)" class="text-body">website.com</a>
              </p>
            </div>
            <hr class="border-light m-0">
            <div class="card-body">
              <a href="javascript:void(0)" class="d-block text-body mb-2">
                <i class="ion ion-logo-twitter ui-w-30 text-center text-twitter"></i> @nmaxwell
              </a>
              <a href="javascript:void(0)" class="d-block text-body mb-2">
                <i class="ion ion-logo-facebook ui-w-30 text-center text-facebook"></i> nmaxwell
              </a>
              <a href="javascript:void(0)" class="d-block text-body mb-0">
                <i class="ion ion-logo-instagram ui-w-30 text-center text-instagram"></i> nmaxwell
              </a>
            </div>
          </div>
          <!-- / Side info -->
  
          <!-- Skills -->
          
          <!-- / Skills -->
  
          <!-- Friends -->
         
          <!-- / Friends -->
  
          <!-- Photos -->
         
          <!-- / Photos -->
  
        </div>
      </div>
        
    @endforeach

 

  
    
@endsection
    <!-- Content -->
    
    <!-- / Content -->

    <!-- Layout footer -->
  

 