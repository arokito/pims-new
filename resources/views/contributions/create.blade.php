@extends('layouts.dashboard')

<script>
    

    function tostart() {
        document.getElementById('demo-page-1').style.display = "block";
        document.getElementById('demo-page-2').style.display = "none";
        document.getElementById('demo-page-3').style.display = "none";
        document.getElementById('demo-page-4').style.display = "none";
        document.getElementById('demo-page-5').style.display = "none";
        document.getElementById('demo-page-6').style.display = "none";
    }

    function topage2() {
        document.getElementById('demo-page-2').style.display = "block";
        document.getElementById('demo-page-1').style.display = "none";
        document.getElementById('demo-page-3').style.display = "none";
        document.getElementById('demo-page-4').style.display = "none";
        document.getElementById('demo-page-5').style.display = "none";
        document.getElementById('demo-page-6').style.display = "none";
    }

    function topage3() {
        document.getElementById('demo-page-3').style.display = "block";
        document.getElementById('demo-page-1').style.display = "none";
        document.getElementById('demo-page-2').style.display = "none";
        document.getElementById('demo-page-4').style.display = "none";
        document.getElementById('demo-page-5').style.display = "none";
        document.getElementById('demo-page-6').style.display = "none";
    }

    function topage4() {
        document.getElementById('demo-page-4').style.display = "block";
        document.getElementById('demo-page-1').style.display = "none";
        document.getElementById('demo-page-3').style.display = "none";
        document.getElementById('demo-page-2').style.display = "none";
        document.getElementById('demo-page-5').style.display = "none";
        document.getElementById('demo-page-6').style.display = "none";
    }

    function topage5() {
        document.getElementById('demo-page-5').style.display = "block";
        document.getElementById('demo-page-1').style.display = "none";
        document.getElementById('demo-page-3').style.display = "none";
        document.getElementById('demo-page-4').style.display = "none";
        document.getElementById('demo-page-2').style.display = "none";
        document.getElementById('demo-page-6').style.display = "none";
    }

    function topage6() {
        document.getElementById('demo-page-6').style.display = "block";
        document.getElementById('demo-page-1').style.display = "none";
        document.getElementById('demo-page-3').style.display = "none";
        document.getElementById('demo-page-4').style.display = "none";
        document.getElementById('demo-page-5').style.display = "none";
        document.getElementById('demo-page-2').style.display = "none";
    }
</script>

@section('content')
    <div class="bg-white shadow rounded p-4 mt-4">
        <h4>New Contribution
            <button id="returnBack" class="btn btn-info float-right" onclick="refresh()">Change Catogory/Payment Method</button>
        </h4>
        <hr>
        <form action="{{ route('contributions.store') }}" method="post">
            @csrf
            <div class="row" id="initialForm">
                <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contribution Category</label>
                        <select  name="contribution_category" id="cat" onchange="selectCategory(this.value)" autocomplete="contribution_category" class="form-control">
                            <option value="">-- Select Contribution --</option>
                            @foreach ($contribution_categories as $cat)
                                <option value="{{ json_encode($cat) }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Payment Method</label>
                        <select  name="payment_method" id="method" onchange="selectPaymentMethod(this.value)" autocomplete="payment_method" class="form-control">
                            <option value="">-- Select Payment Method --</option>
                            @foreach ($payment_methods as $method)
                                <option value="{{ json_encode($method) }}">{{ $method->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div id="partialPayment">
                
            </div>
        </form>
    </div>
    
    <script>
        document.getElementById('returnBack').style.display = 'none';
        method = "";
        category = "";
        alert = `
                <div class="alert alert-warning">
                    Please select category and payment method to continue!
                </div>`;
        
        function refresh() {
            method = "";
            category = "";
            document.getElementById('initialForm').style.display = '';
        }

        function selectPaymentMethod(method) {
            this.method = method ? JSON.parse(method).name : '';
            loadPaymentMethod();
        }
    
        function selectCategory(category) {
            this.category = category ? JSON.parse(category).name : '';
            loadPaymentMethod();
        }
    
        function loadPaymentMethod() {
            document.getElementById('initialForm').style.display = '';
            document.getElementById('returnBack').style.display = 'none';
            console.log(method, category);
            // Alert
            if (method == "" || category == "") {
                document.getElementById('partialPayment').innerHTML = alert;
            } else if (method == "CASH")
                document.getElementById('partialPayment').innerHTML = `@include("contributions.methods.cash")`;
            else if (method == "CRDB BANK")
                document.getElementById('partialPayment').innerHTML = `@include("contributions.methods.bank")`;
            else if (method == "M-PESA" || method == "TIGO PESA") {
                document.getElementById('initialForm').style.display = 'none';
                document.getElementById('partialPayment').innerHTML = `@include("contributions.methods.mobile")`;
                document.getElementById('returnBack').style.display = '';
                tostart();
            } else
                document.getElementById('partialPayment').innerHTML = "";
        }
        
        document.getElementById('partialPayment').innerHTML = alert;
        
    </script>
@endsection
