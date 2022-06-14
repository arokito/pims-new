@extends('layouts.dashboard')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white p-2 px-4">
            <h5 class="m-0 p-0">Profit and Loss Report</h5>
        </div>
        <div class="card-body">
            <form action="/profit-and-loss" method="get">
                @csrf
                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label for="reportType">Report Type</label>
                        <select type="date" name="reportType" id="reportType" class="form-control">
                            <option value="month">Month Report</option>
                            <option value="annual">Annual Report</option>
                        </select>
                    </div>
                    <div class="col col-md-4 form-group">
                        <label for="month">Month</label>
                        <select type="date" name="month" id="month" class="form-control">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col col-md-2 form-group">
                        <label for="year">Year</label>
                        <select type="date" name="year" id="year" class="form-control">
                            @foreach ($years as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
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
                @if (count($categoriesArr) > 0)
                    <h5>CONTRIBUTIONS</h5>
                    <table class="table table-striped" id="printTable">
                        <thead class="thead-light">
                        <tr>
                            <th>Category</th>
                            <th style="width: 200px; text-align: right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriesArr as $category)
                                <tr>
                                    <td>{{ $category["name"]}} </td>
                                    <td style="text-align: right">{{ $category["totalAmount"] ? number_format($category["totalAmount"]->amount, 0, 2) : 0 }} </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>TOTAL</th>
                                <th style="text-align: right">{{ number_format($totalContributions, 0, 2) }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <h5>EXPENSES</h5>
                    <table class="table table-striped" id="printTable">
                        <tbody class="thead-light">
                        <tr>
                            <th>TOTAL EXPENSES</th>
                            <th style="width: 200px; text-align: right">{{ number_format($expenses, 0, 2) }} </td>
                        </tr>
                        </thead>
                    </table>

                    <br>
                    <h5>PROFIT / LOSS</h5>
                    <table class="table table-striped" id="printTable">
                        <tbody class="thead-light">
                        <tr>
                            <th> {{ $profit < 0 ? "LOSS" : "PROFIT" }} </th>
                            <th style="width: 200px; text-align: right" class="text-right">{{ number_format($profit, 0, 2) }} </td>
                        </tr>
                        </thead>
                    </table>
                @else
                    <div class="alert alert-warning text-center m-0">
                        No result found, please filter using the form above.
                    </div>
                @endif
            </div>
        </div>
@endsection 