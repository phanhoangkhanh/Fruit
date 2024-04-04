<div>
<div class="modal fade bd-example-modal-lg" id="modal-register" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Register New User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body" tabindex="-1">
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput">Your Name ? Please...</label>
                        <input type="text" class="form-control" wire:model.defer="name" >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput2">PassWord (At least 4 characters) </label>
                            <input type="password" class="form-control" wire:model.defer="pass" placeholder="At least 4 character">
                            @error('pass')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput2">Retypre Password </label>
                            <input type="password" class="form-control" wire:model.defer="rePass" >
                            @if($wrongPass)
                                <div class="alert alert-danger">{{ $wrongPass }}</div>
                            @endif
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" wire:click="registerNewUser"> Sign in</button>
            </div>
        </div>
    </div>
</div>
</div>