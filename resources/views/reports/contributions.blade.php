@extends('layouts.dashboard')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white p-2 px-4">
            <h5 class="m-0 p-0">Contribution Report</h5>
        </div>
        <div class="card-body">
            <form action="/contributions-report" method="get">
                @csrf
                <div class="row">
                <div class="col col-md-2 form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" @if(old("startDate")) value="{{ old('startDate') }}" @endif name="startDate" id="startDate" class="form-control">
                    </div>
                    <div class="col col-md-2 form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" @if(old("endDate")) value="{{ old('endDate') }}" @endif name="endDate" id="endDate" class="form-control">
                    </div>
                    <div class="col col-md-3 form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            @foreach ($categories as $category)
                                <option @if(old("category") == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-3 form-group">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod">
                            @foreach ($payment_methods as $payment_method)
                                <option @if(old("paymentMethod") == $payment_method->id) selected @endif  value="{{ $payment_method->id }}">{{ $payment_method->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-2 form-group">
                        <label for="">_</label>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
                @if (count($contributions) > 0)
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="pull-right float-right">
                            <button type="button" onclick="printJS({ printable: 'printTable', type: 'html', css: [`https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css`]})" class="btn btn-warning w-100">Print Report    </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="printTable">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($contributions as $contribution)
                        <tr>
                            <td>{{ $contribution->parishioner ? ($contribution->parishioner->first_name . " " . $contribution->parishioner->last_name) : "N/A" }} </td>
                            <td>{{ $contribution->contribution_category->name ?? "N/A"}} </td>
                            <td>{{ $contribution->payment_method->name ?? "N/A"}} </td>
                            <td>{{ $contribution->amount}} </td>
                            <td>{{ $contribution->created_at}} </td>
                        </tr>
                        @endforeach
                
                        </tbody>
                    </table>
                    </div>
                    @else
                        <div class="alert alert-warning text-center m-0">
                            No result found, please filter using the form above.
                        </div>
                    @endif
            </div>
        </div>
@endsection 