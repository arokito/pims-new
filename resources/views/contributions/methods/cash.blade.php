{{-- <h3>Pay by Cash</h3> --}}
<div class="row">
    <div class="col col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Select Parishioner</label>
            <select  name="parishioner_id" autocomplete="parishioner_id" class="form-control">
                <option value="">-- Select Parishioner --</option>
                @foreach ($parishioners as $parishioner)
                    <option value="{{ $parishioner->id }}">{{ $parishioner->first_name . " " . $parishioner->last_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="col col-md-6">
        <div class="mb-3">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" value="Mark" required>
        </div>
    </div>
    <div class="col-md-12">
        <button class="btn btn-info btn-block">Save</button>
    </div>
</div>