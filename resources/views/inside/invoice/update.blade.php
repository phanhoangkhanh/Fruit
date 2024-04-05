
<div class="modal fade bd-example-modal-xl" id="invoice-modal" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">CREATE OR UPDATE INVOICE</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1">
                        <label for="formGroupExampleInput">Customer</label>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" wire:model = "customer">
                            <option value="">...</option>
                            @foreach( $list_customer as $per)
                                <option value="{{$per->id}}">{{$per->name}}</option>
                            @endforeach
                        </select>
                        @error('customer') 
                            <span class="form-control alert alert-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="col-md-3">
                        NUmber Invoice: <b>{{$num_invoice}}</b>
                    </div>
                    <div class="col-md-3">
                        ToTal Cost: <b style="color:red">{{$total_cost}} $</b>
                    </div>
                </div>

                <div class="form-row" style="margin-top:10px">
                    <div class="form-group col-md-5" x-data="{ open: false }">
                        <label for="inputEmail4">Fruit (type and choose)</label>
                        <input @click="open = !open" type="text" class="form-control"  
                            placeholder="Type and Choose for convinient" wire:model="fruit_name" @click="open = !open">
                        @error('fruit_choosen') 
                            <span class="form-control alert alert-danger">{{ $message }}</span> 
                        @enderror
                        <select x-show="open" class="form-control" wire:model="fruit_choosen" wire:change="choosenFruit" >
                            <option value="">...</option>
                            @foreach( $list_fruit as $per)
                                <option value="{{$per->id}}">{{$per->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Max: {{$max_volume}}</label>
                        <input type="number" class="form-control" placeholder="Quantity" wire:model="quantity">
                        @error('quantity') 
                            <span class="form-control alert alert-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Price</label>
                        <input type="number" class="form-control" wire:model="price" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Adding Invoice</label><br/>
                        <button class="btn btn-icon btn-sm btn-info btn-rounded"
                                type="button" wire:click="createInvoiceItem">
                            <i class="anticon anticon-plus-circle"></i>
                        </button>
                    </div>
                </div>
                @if( $list_invoice_item)
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fruit Item</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Cost</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_invoice_item as $per)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$per->hasFruit?->name ?? "..."}}</td>
                                <td>{{$per->quantity}}</td>
                                <td>{{$per->price_at_sell}}</td>
                                <td>{{$per->price_at_sell*$per->quantity }}</td>
                                <td>
                                    <button class="btn btn-icon btn-sm btn-danger btn-rounded"
                                        type="button" wire:click="eraseItem({{$per->id}})">
                                        <i class="anticon anticon-close-circle"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <button class="btn btn-block btn-tone btn-primary m-r-5" 
                    type="button" wire:click="confirmInvoice">
                    ConFirm
                </button>
            </div>
        </div>
    </div>
</div>