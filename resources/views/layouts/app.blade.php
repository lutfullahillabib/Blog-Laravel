<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    <!-- <title>{{ config('app.name', 'Blog') }}</title> -->

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">


    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">


              @if (Auth::check())
              <div class="col-md-4">
                <ul class="list-group">
                  <li class="list-group-item">
                      <a href="{{ route('home') }}">Home</a>
                  </li>

                  <li class="list-group-item">
                      <a href="{{ route('user.profile') }}">My Profile</a>
                  </li>
                  @if(Auth::user()->admin)
                    <li class="list-group-item">
                        <a href="{{ route('users') }}">Users</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.create') }}">Crete User</a>
                    </li>
                  @endif
                  <li class="list-group-item">
                      <a href="{{ route('tags') }}">Tags</a>
                  </li>
                  <li class="list-group-item">
                      <a href="{{ route('tag.create') }}">Create Tag</a>
                  </li>


                  <li class="list-group-item">
                      <a href="{{ route('categories') }}">Categories</a>
                  </li>
                  <li class="list-group-item">
                      <a href="{{ route('category.create') }}">Create Category</a>
                  </li>
                  <li class="list-group-item">
                      <a href="{{ route('posts') }}">Posts</a>
                  </li>
                  <li class="list-group-item">
                      <a href="{{ route('posts.trashed') }}">Posts Trashed</a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ route('post.create') }}">Create Post</a>
                  </li>
                  @if(Auth::user()->admin)
                  <li class="list-group-item">
                    <a href="{{ route('settings') }}">Settigs</a>
                  </li>
                  @endif

                </ul>

              </div>
              @endif
                <div class="col-md-8">
                  @yield('content')
                </div>
            </div>
          </div>

        </main>
    </div>

    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      @if(Session::has('success'))

        toastr.success('{{ Session::get("success") }}')
      @endif
      @if(Session::has('info'))
        toastr.info('{{ Session::get("info") }}')
      @endif
    </script>

      @yield('script')
</body>


</html>
