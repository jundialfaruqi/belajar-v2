{{-- User --}}
<div>
    {{-- Page header --}}
    @include('livewire.user.page-header')
    {{-- Page body --}}
    <div class="page-body">
        <div class="container-xl">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card rounded-4">
                        <div class="card-body">
                            @include('livewire.user.form')
                            {{-- {{ $users->total() }} --}}
                            {{-- Table --}}
                            @include('livewire.user.table')
                        </div>
                        @if ($showTable)
                            <div class="card-footer rounded-bottom-4">
                                {{-- Pagination --}}
                                {{ $users->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
