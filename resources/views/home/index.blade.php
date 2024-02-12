<head>
    <!-- ... other meta tags ... -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.css">

    <!-- Select2 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <!-- Select2 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Swal CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ... other scripts ... -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->


    <!-- Your local script -->
    <script src="{{ asset('js/global.js') }}"></script>

    <!-- ... other script tags ... -->
    <style>
        /* Custom CSS to center the card */
        #edit {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        /* Optional: Adjust the width of the card */
        .custom-card {
            max-width: 800px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            }
    </style>
</head>
<body>
    <div id="app">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #99BC85">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.home')}}" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto"> <!-- Adding ml-auto class here -->
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest

            <!-- Other Navbar Links -->
        </ul>
    </nav>
    <div class="container">
    <section>
            <div class="mt-4 p-5 text-dark rounded" style="background-color: #E1F0DA; height: 500px;">
                <div class="row">
                    <div class="col-6">
                        <h1 style="font-size: 46px;">Me-dis</h1>
                        <p style="width: 535px;font-size: 24px;" >Kami dengan senang hati menyambut Anda di situs medis kami yang menyediakan informasi terkini tentang berbagai kondisi medis, perawatan, dan gaya hidup sehat.
                    </div>
                    <div class="col-6">
                        <img src="{{asset('svg/medic.svg')}}" alt="" width="90%">
                    </div>
                </div>
                </p>
              </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/1.svg') }}" class="card-img-top img-fluid" alt="Image 1">
                    <div class="card-body">
                      <h5 class="card-title">Card 1</h5>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/2.svg') }}" class="card-img-top img-fluid" alt="Image 2">
                    <div class="card-body">
                      <h5 class="card-title">Card 2</h5>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/3.svg') }}" class="card-img-top img-fluid" alt="Image 3">
                    <div class="card-body">
                      <h5 class="card-title">Card 3</h5>
                      <p class="card-text"></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/4.svg') }}" class="card-img-top img-fluid" alt="Image 4">
                    <div class="card-body">
                      <h5 class="card-title">Card 4</h5>
                      <p class="card-text">This is some example text for Card 4.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/5.svg') }}" class="card-img-top img-fluid" alt="Image 5">
                    <div class="card-body">
                      <h5 class="card-title">Card 5</h5>
                      <p class="card-text">This is some example text for Card 5.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card mb-4">
                    <img src="{{ asset('svg/6.svg') }}" class="card-img-top img-fluid" alt="Image 6">
                    <div class="card-body">
                      <h5 class="card-title">Card 6</h5>
                      <p class="card-text">This is some example text for Card 6.</p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </section>
    <section>
        <footer class="footer">
            <div class="container">
              <span class="text-muted">© 2024 YourWebsiteName. All rights reserved.</span>
            </div>
          </footer>

    </section>
</div>



</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- jQuery -->

</body>
</html>
