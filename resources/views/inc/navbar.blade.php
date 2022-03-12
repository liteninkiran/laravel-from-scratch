{{-- Navbar --}}
<nav class="navbar navbar-expand-xl navbar-dark bg-dark mb-5">

    <div class="container-fluid">

        {{-- Project Title --}}
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>

        {{-- Collapse / Expand Menu (Small Screens) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu Links --}}
        <div class="collapse navbar-collapse" id="navbar">

            {{-- Navigation --}}
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">

                {{-- Home --}}
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>

                {{-- About --}}
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                {{-- Services --}}
                <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                </li>

                {{-- Posts --}}
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Posts</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

