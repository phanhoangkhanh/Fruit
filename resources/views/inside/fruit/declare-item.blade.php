<div class=card>
    <div class="form-row">
        <div class="col-md-12">
            <button type = "button" class="btn btn-success m-r-5" wire:click="callDeclareModal">
                Declare Category
            </button>
            Declare New Category before declare below New Item !!!
        </div>
    </div>
    <div class="form-row" style="margin-top: 10px;">
        <div class="row">
            <div class="col">
                <select class="form-control" wire:model.lazy="origin">
                    <option value="OT-Other">--Origin--</option>
                    <option value="CH-China">China</option>
                    <option value="TH-Thailand">ThaiLand</option>
                    <option value="VI-Vietnam">VietNam</option>
                    <option value="OT-Other">Other..</option>
                </select>
                @error('origin') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <select class="form-control" wire:model.lazy="size">
                    <option value="">--Size--</option>
                    <option value="B-Big">Big</option>
                    <option value="M-Medium">Medium</option>
                    <option value="S-Small">Small</option>
                </select>
                @error('size') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <select class="form-control" wire:model.lazy="fruit_cate">
                    <option value="">--Fruit--</option>
                    @foreach( $list_cate as $per)
                        <option value="{{$per->id}}-{{$per->name}}">{{$per->name}}</option>
                    @endforeach
                </select>
                @error('fruit_cate') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <input type="text" class="form-control" wire:model.lazy="unit" placeholder="unit">
                @error('unit') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <input type="number" class="form-control" wire:model.lazy="price" placeholder="PRICE:..$..">
                @error('price') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <button type="button" class="btn btn-warning btn-rounded m-r-5"
                 wire:click="declareItem" style="height: 40px;">
                <i class="anticon anticon-forward"></i>
            </button>
        </div>
        <div class="row" style="margin-top: 10px;">
            @if($wrong)
            <div class="col">
                <span class="form-control alert alert-danger">
                    This Fruit Item has been declared previous. Just modify quality in below
                </span>
            </div>
            @endif
        </div>
    </div>






<div class="modal fade bd-example-modal-sm" id="declare-category" wire:ignore.self>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title h3">Category (unique)</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="formGroupExampleInput">New Category</label>
                        <input type="text" class="form-control" wire:model.defer="name_cate">
                        @error('name_cate') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button type='button' class="btn btn-success btn-block btn-tone m-r-5"  
                    wire:click="declareComfirmCate">
                    Submit</button>
            </div>
        </div>
    </div>
</div>
</div>