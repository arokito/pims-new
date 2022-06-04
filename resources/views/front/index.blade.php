 <head>
  @include('partials._head')
 </head>



 {{-- <div class="container ">

  <form action="/make-payment" method="POST">
    @csrf
 <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
    <input  name="pay_number" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="mb-3">
  
    <button type="submit" class="btn btn-secondary">SUbmit</button>
  </div>
</div>
</form> --}}

<div class="container">
  <!-- Instructions -->
  <div class="row">
    <div class="alert alert-success col-md-12" role="alert" id="notes">
      <h4>NOTES</h4>
      <ul>
        <li>You will recieve a verification code on your mail after you registered. Enter that code below.</li>
        <li>If somehow, you did not recieve the verification email then <a href="#">resend the verification email</a></li>
      </ul>
    </div>
  </div>
  <!-- Verification Entry Jumbotron -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron text-center">
        <h2>Enter the paycode </h2>
        <form method="post" action="/make-payment" role="form">
          @csrf
          <div class="col-md-9 col-sm-12">
            <div class="form-group form-group-lg">
                      @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                      @endif
              <input type="text" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="pay_number" required>
              <input class="btn btn-primary btn-lg col-md-2 col-sm-2" type="submit" value="Verify">
            </div>
           
          </div>
        </form>
        <div class="d-flex justify-content-center align-items-center mt-4"><span class="fw-normal">
           don't You have an account?  </span></div>
      </div>
    </div>
  </div>
</div>