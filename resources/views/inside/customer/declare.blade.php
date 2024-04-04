<div class="card">
<div class="card-body">
    <form>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="formGroupExampleInput">Name Customer (unique)*</label>
                <input type="text" class="form-control" wire:model.lazy = "name">
                @error('name') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="formGroupExampleInput2">Mobile*</label>
                <input type="number" class="form-control" wire:model.lazy = "mobile">
                @error('mobile') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="formGroupExampleInput2">Address*</label>
                <input type="text" class="form-control" wire:model.lazy = "address">
                @error('address') <span class="form-control alert alert-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-md-1">
                <label for="formGroupExampleInput2">Declare</label><br/>
                <button class="btn btn-warning btn-tone m-r-5" type="button" wire:click ="declareCus">
                    <i class="anticon anticon-down-circle"></i>
                </button>
            </div>
        </div>
    </form>
</div>
</div>