<div class='card'>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name Fruit</th>
                    <th scope="col-2">Price/unit</th>
                    <th scope="col">Stock</th>
                    <th scope="col-1"></th>
                </tr>
            </thead>
            @if($list)
            <tbody>
                @foreach($list as $per)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <td>{{$per->code}}</td>
                    <td>{{$per->name}}</td>
                    <td>
                        <input type="'number" placeholder="..........{{$per->price}}$" 
                            wire:model.defer="info_price_array.{{$per->id}}"/>
                        /{{$per->unit}}</td>
                    <td>
                        <input type="'number" 
                            placeholder="..{{$per->stock}}.."
                            wire:model.defer="info_stock_array.{{$per->id}}" />
                    </td>
                    <td>
                        <button class="btn btn-xs btn-secondary btn-tone m-r-5"
                            wire:click="updateItem({{$per->id}})"
                            >Change
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>