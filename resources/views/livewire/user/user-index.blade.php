{{-- User --}}
<div>
    {{-- Page header --}}
    @include('livewire.user.page-header')
    {{-- Page body --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card rounded-4">
                        <div class="card-body">
                            {{-- {{ $users->total() }} --}}
                            {{-- Table --}}
                            @include('livewire.user.table')
                        </div>
                        <div class="card-footer rounded-bottom-4">
                            {{-- Pagination --}}
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
