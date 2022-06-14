  @extends('layouts.guest')

          @section('content')
          <div class="container p-5">
            <p class="text-center">
                <a href="/" class="d-flex align-items-center justify-content-center">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                    Back to homepage
                </a>
            </p>
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="card ">
                          <div class="card-header">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <div class="avatar avatar-lg mx-auto mb-3"><img class="rounded-circle" alt="Image placeholder" src="{{ asset('assets\img\brand\yakobo mkuu.jpeg') }}"></div>
                                <h1 class="h3">PIMS</h1>
                                <p class="text-gray">Mt. Yakobo Mkuu Mtume, Utuombee...</p>
                            </div>
                            </div>
              
                 <div class="card-body">
                    <!-- Form -->
                    
                 <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                    
                      <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      </div>
                    
   

                        
                      <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                     </div>

                       

                          

                    <!-- End of Form -->
                    
                   
                  </form>
                
               
               
             </div>
           
        </div>
    </div>
</div>
</div>

<div class="d-flex justify-content-center align-items-center mt-4">
    <span class="fw-normal">
        Already have an account? 
        <a href="{{ route('login') }}" class="fw-bold">Login here</a>
    </span>
</div>
    
@endsection



