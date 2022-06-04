<head>
    @include('partials._head')
   </head>
  
  
  
   <div class="container ">
  
    <form action="/load-page" method="POST">
      @csrf
    @foreach($check as $info)
    <input name="first_name" type="text" value="{{ $info->first_name }}" disabled>
    <input name="last_name" type="text" value="{{ $info->last_name }}" disabled>
    <input name="reference" type="text" value="2345235" disabled>
    <input name="type" type="text" value="MERCHANT" disabled>
    <input name="description" type="text" value="teljslkjf" disabled>
    <input type="text" name="amount">
    <input name="phonenumber" type="text" value="{{ $info->phone }}" disabled>
    
   @endforeach
</form>
  </div>
 