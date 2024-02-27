@include('layouts.partials.agent.main')

<head>
    @include('layouts.partials.agent.title-meta', ['title' => 'Dashboard'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('admin/assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    @include('layouts.partials.agent.head-css')
    @csrf
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body">

    <!-- Begin page -->
    <div class="layout-wrapper">

        @include('layouts.partials.agent.menu')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            @include('layouts.partials.agent.topbar')

            <div class="px-3">

                @if (session('error'))
                    <script>
                        alert("{{ session('error') }}");
                    </script>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Start Content-->
                <div class="container-fluid">

                    @include('layouts.partials.agent.page-title', [
                        'subtitle' => 'Dashtrap',
                        'title' => 'Dashboard',
                    ])

                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">{{ $statusText }}</span>
                                        <h3 class="card-title mb-0">Statut</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h3 class="d-flex align-items-center mb-0">
                                                Votre Statut
                                            </h3>
                                        </div>
                                        <div class="col-4 text-end">
                                            @if ($user->status)
                                                <span
                                                    class="text-muted">{{ $user->status->updated_at->diffForHumans() }}<i
                                                        class="mdi mdi-arrow-up text-success"></i></span>
                                            @else
                                                <span class="text-muted">No status available</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar " role="progressbar" style="width: 0;">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Jour</span>
                                        <h3 class="card-title mb-0">Solde</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <p>
                                            <h2>2000</h2>
                                            </p>
                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="text-muted"><i class="mdi mdi-arrow-down "></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar " role="progressbar" style="width: 0;">
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Jour</span>
                                        <h3 class="card-title mb-0">Nombre de service</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <p>
                                            <h2>5</h2>
                                            </p>
                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="text-muted"><i class="mdi mdi-arrow-down"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0;"></div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <!-- end col-->
                    </div>
                    <div class="container text-center">
                        <div class="card p-2">
                            <p class="card-subtitle mb-4 font-size-20">
                            <h2>Point des recettes</h2>
                            </p>

                        </div>
                    </div>

                    <p>

                    </p> <br><br>
                    <p>

                        </head>

                        <body>
                            <form action="#">
                                <div class="form-group row">
                                    <label for="start_date"  class="col-sm-1 col-form-label">Date de début:</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="start_date" id="start_date"
                                            required>
                                    </div>

                                    <label for="end_date" class="col-sm-1 col-form-label">Date de fin:</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            required>
                                    </div>
                                    <button type="submit" class="col-sm-2 col-form-label btn btn-primary">Point
                                        Jounalier</button>&nbsp;&nbsp;
                                    <button type="submit" class="col-sm-1 col-form-label btn btn-primary">Rechercher</button>
                                </div>

                            </form>

                    </p>
                    <p>
                    <h1><span id="display_start_date"></span></p>
                    </h1>
                    <div class="col-lg-5">
                        <div class="card">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="card-body">

                                <div class="">
                                    <div class="container">

                                    </div>
                                </div>

                            </div>
                            <!--end card body-->
                        </div>
                        <!--end card-->
                    </div>

                    <p>


                    </p>
                    <h1>
                        <p><span id="display_end_date"></span></p>
                    </h1>

                    <div class="col-lg-5">
                        <div class="card">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="card-body">

                                <div class="">
                                    <div class="container">

                                    </div>
                                </div>

                            </div>
                            <!--end card body-->

                        </div>
                        <!--end card-->
                    </div>

                </div>
                <!--end row-->

                <div class="row">

                    <!--end col-->
                    <div class="col-lg-13">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-subtitle mb-4 font-size-13">
                                <h2 class="container text-center">Services en Cours</h2>
                                </p>
                                <div class="">
                                    <div class="container">
                                        <table class="table table-centered table-striped table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom de l'expéditeur</th>
                                                    <th>Adresse de livraison</th>
                                                    <th>Type de service</th>
                                                    <th>État du service</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Expéditeur 1</td>
                                                    <td>Adresse 1</td>
                                                    <td>Type 1</td>
                                                    <td>En cours</td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-success">Terminer</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>2</td>
                                                    <td>Expéditeur 2</td>
                                                    <td>Adresse 2</td>
                                                    <td>Type 2</td>
                                                    <td>En cours</td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-success">Terminer</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!--end card body-->

                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                </div>
                <!--end row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->

        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>

    @include('layouts.partials.agent.footer-scripts')

    <!-- Knob charts js -->
    <script src="{{ asset('admin/assets/libs/jquery-knob/jquery.knob.min.js') }}">
        < /scrip>

        <
        !--Sparkline Js-- >
        <
        script src = "{{ asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}" >
    </script>

    <script src="{{ asset('admin/assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>



    </body>

    </html>
