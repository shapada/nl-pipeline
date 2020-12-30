<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <span class="c-header-toggler-icon"></span>
        </button>
        <a class="c-header-brand d-sm-none" href="#">
            <img class="c-header-brand" src="{{ url('/img/foresight-bank.svg') }}" width="97" height="46" alt="Foresight Bank">
        </a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
            <span class="c-header-toggler-icon"></span>
        </button>
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle c-header-nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-2">
                    <a class="dropdown-item" href="#">
                        Settings
                    </a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>

            </li>
        </ul>

        <div class="c-subheader px-3">
            <ol class="breadcrumb border-0 m-0 ">
                <li class="breadcrumb-item"><a href="{{ route('admin.loans.index') }}">Home</a></li>
                <?php $segments = ''; ?>
                @for ($i = 2; $i <= count(Request::segments()); $i++)
                    <?php $segments .= '/' . Request::segment($i); ?>
                    @if ($i < count(Request::segments()))
                        <li class="breadcrumb-item">{{ Str::ucfirst(Request::segment($i)) }}</li>
                    @else
                        <li class="breadcrumb-item active">{{ Str::ucfirst(Request::segment($i)) }}</li>
                    @endif
                @endfor
            </ol>
        </div>
    </header>
