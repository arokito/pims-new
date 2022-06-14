@extends('layouts.dashboard')

@section('content')
<div class="card mt-4">
    <div class="card-header bg-primary text-white p-2 px-4">
        <h5 class="m-0 p-0">Parishioners Report</h5>
    </div>
    <div class="card-body">
        <form action="/parishioners-report" method="get">
            @csrf
            <div class="row">
            
                
                <div class="col col-md-3 form-group">
                    <label for="category">Family</label>
                    <select class="form-control" name="family" id="family">
                        <option value="">-- {{ __('custom.select') }} {{ __('custom.family') }} --</option>
                        @foreach ($families as $family)
                            <option @if(old("family") == $family->id) selected @endif value="{{ $family->id }}">{{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-md-3 form-group">
                    <label for="jumuiya">Jumuiya</label>
                    <select class="form-control" name="community" id="community">
                        <option value="">-- {{ __('custom.select') }} {{ __('custom.community') }} --</option>
                        @foreach ($communities as $com)
                            <option @if(old("community") == $com->id) selected @endif value="{{ $com->id }}">{{ $com->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-md-3 form-group">
                    <label for="zone">Kanda</label>
                    <select class="form-control" name="zone" id="zone">
                        <option value="">-- {{ __('custom.select') }} {{ __('custom.zone') }} --</option>
                        @foreach ($zones as $zone)
                            <option @if(old("zone") == $zone->id) selected @endif value="{{ $zone->id }}">{{ $zone->name }}</option>
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
            @if (count($parishioners) > 0)
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
                        <th>Family</th>
                        <th>Community</th>
                        <th>Zone</th>
                      
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($parishioners as $p)
                    <tr>
                        <td>{{ $p->first_name }}{{ $p->last_name }} </td>
                        <td>{{ $p->family->name ?? "N/A"}} </td>
                        <td>{{ $p->family->community->name ?? "N/A"}} </td>
                        <th>{{ $p->family->community->zone->name ??"N/A" }}</th>
                        
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