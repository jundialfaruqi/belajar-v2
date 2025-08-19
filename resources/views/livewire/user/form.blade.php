@if ($showForm)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> {{ $isEdit ? 'Edit Data User' : 'Buat Akun User Baru' }}</h3>
            <div class="card-options"></div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" class="form-control" wire:model="email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password {{ $isEdit ? '(biarkan kosong jika tidak diubah)' : '' }}</label>
                    <input type="password" class="form-control" wire:model="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ $isEdit ? 'Update' : 'Simpan' }}
                </button>
                <button type="button" class="btn btn-secondary" wire:click="cancelOrResetInput">Cancel</button>
            </form>
        </div>
    </div>
@endif
