<ul class="navbar-nav ml-auto">
  @guest
    <li class="nav-item">
      <a
        class="nav-link"
        href="{{ route('login') }}"
      >
        {{ __('Login') }}
      </a>
    </li>

    @if (Route::has('register'))
      <li class="nav-item">
        <a
          class="nav-link"
          href="{{ route('register') }}"
        >
          {{ __('Register') }}
        </a>
      </li>
    @endif
  @else
    <li class="nav-item dropdown">
      <a
        class="nav-link dropdown-toggle"
        href="#"
        id="navbarDropdown"
        role="button"
        aria-haspopup="true"
        aria-expanded="false"
        data-toggle="dropdown"
        v-pre
      >
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div
        class="dropdown-menu dropdown-menu-right"
        aria-labelledby="navbarDropdown"
      >
        <a
          class="dropdown-item"
          href="{{ route('logout') }}"
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
        >
          {{ __('Logout') }}
        </a>

        <form
          action="{{ route('logout') }}"
          id="logout-form"
          method="POST"
          style="display: none;"
        >
          @csrf
        </form>
      </div>
    </li>
  @endguest
</ul>
