
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
            </div>
        </div>
    </div>
</div>