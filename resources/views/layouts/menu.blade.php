<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ __('menu.retail') }}
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('order.create') }}">
            {{ __('menu.order') }}
        </a>
        <a class="dropdown-item" href="{{ route('customercreate') }}">
            {{ __('menu.client') }}
        </a>
    </div>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ __('menu.wholesale') }}
    </a>

    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('order.create') }}">
            {{ __('menu.order') }}
        </a>
        <a class="dropdown-item" href="{{ route('customercreate') }}">
            {{ __('menu.client') }}
        </a>
    </div>
</li>
