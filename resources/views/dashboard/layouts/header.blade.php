<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" class="navbar-toggler-icon ">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/"><span data-feather="corner-left-up"></span> Welcome
        {{ auth()->user()->name }} </a>
    <div class="d-flex col-sm-2">
        <div class="navbar navbar-expand-md">
            <div class="nav-item text-nowrap">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-dark text-white border-0 ">
                        Logout <span data-feather="log-out"></span></button>
                </form>
            </div>
        </div>
    </div>
</header>
