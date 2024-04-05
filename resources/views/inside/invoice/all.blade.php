<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success m-r-5" wire:click="callModal(0)">
                New Invoice
            </button>
        </div>
        <div class="col">
                <input type="text" class="form-control" 
                    wire:model = "customer_looking" 
                    placeholder="Fillter Invoice with Name of Customer">
        </div>
    </div>
</div>

<div class="card-body">
@if( $list)
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Date</th>
                <th scope="col">Customer Name</th>
                <th scope="col">User built</th>
                <th scope="col">ToTal Cost</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach( $list as $per)
            <tr>
                <td>{{$per->number}}</td>
                <td>{{\Carbon\Carbon::parse($per->created_at)->format('d/m/y')}}</td>
                <td>{{$per->hasCustomer?->name ?? '..'}}</td>
                <td>{{$per->hasUser?->name ?? '..'}}</td>
                <td>{{$per->total_cost}}$</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
</div>
@livewire('invoice-update-create', [], key('invoice-update-create'))
</div>