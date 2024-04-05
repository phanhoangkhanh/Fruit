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
                <td> 
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm btn-tone" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="anticon anticon-bars"></i>
                    </button>
                    <div class="dropdown-menu">
                        <button class="btn btn-tone btn-warning dropdown-item" 
                            wire:click="callModal({{$per->id}})">Info & Modify</button>
                            <button class="btn btn-tone btn-info dropdown-item" 
                            wire:click="">Print</button>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$list->links()}}
</div>
@endif
</div>
@livewire('invoice-update-create', [], key('invoice-update-create'))
</div>