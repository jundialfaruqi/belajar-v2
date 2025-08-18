<aside class="navbar navbar-vertical navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Logo --}}
        @include('components.layouts.logo')

        {{-- Top Namvbar Mobile --}}
        @include('components.layouts.top-navbar-mobile')

        {{-- Sidebar Navigation Menu --}}
        @include('components.layouts.sidebar-menu')

    </div>
</aside>
