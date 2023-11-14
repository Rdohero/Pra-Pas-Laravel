<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Tier List Characters</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{( $active === "home") ? 'active' : ''}}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{( $active === "tier") ? 'active' : ''}}" href="/tier">Tier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{( $active === "origin") ? 'active' : ''}}" href="/origin">Origin</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add New
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/tier/create"><i class="bi bi-layout-text-sidebar-reverse"></i>Add Tier</a></li>
                            <li><a class="dropdown-item" href="/origin/create"><i class="bi bi-layout-text-sidebar-reverse"></i>Add Origin</a></li>
                            <li><a class="dropdown-item" href="/home/create"><i class="bi bi-layout-text-sidebar-reverse"></i>Add Characters</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>
