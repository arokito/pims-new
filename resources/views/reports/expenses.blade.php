@extends('layouts.dashboard')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white p-2 px-4">
            <h5 class="m-0 p-0">Expenses Report</h5>
        </div>
        <div class="card-body">
            <form action="/expenses-report" method="get">
                @csrf
                <div class="row">
                <div class="col col-md-5 form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" name="startDate" id="startDate" class="form-control">
                    </div>
                    <div class="col col-md-5 form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" name="endDate" id="endDate" class="form-control">
                    </div>
                    <div class="col col-md-2 form-group">
                        <label for="endDate">_</label>
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
                @if (count($expenses) > 0)
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
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $e)
                        <tr>
                            <td>{{ $e->amount}} </td>
                            <td>{{ $e->description}} </td>
                            <td>{{ $e->created_at}} </td>
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