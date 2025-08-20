@if ($showForm)
    <h3 class="card-title d-flex align-items-center gap-2">
        {{ $isEdit ? 'Edit Data User' : 'Buat Akun User Baru' }}
    </h3>
    <div class="card">
        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            <div class="card-body">
                <div class="mb-3">
                    <label class="mb-1">Nama</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="mb-1">Email</label>
                    <input type="email" class="form-control" wire:model="email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="mb-1">Password {{ $isEdit ? '(biarkan kosong jika tidak diubah)' : '' }}</label>
                    <input type="password" class="form-control" wire:model="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary me-2">
                    {{ $isEdit ? 'Update' : 'Simpan' }}
                </button>
                <button type="button" class="btn btn-secondary" wire:click="cancelOrResetInput">Cancel</button>
            </div>
        </form>
    </div>
@endif
