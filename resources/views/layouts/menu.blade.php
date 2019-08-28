<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Magazyn
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('pitaya.create') }}">
            {{ __('menu.order') }}
        </a>
        <a class="dropdown-item" href="{{ route('pitaya.customercreate') }}">
            {{ __('menu.client') }}
        </a>
    </div>
</li>