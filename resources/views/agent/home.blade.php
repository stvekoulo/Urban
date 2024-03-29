@include('layouts.partials.agent.main')

<head>
    @include('layouts.partials.agent.title-meta', ['title' => 'Dashboard'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('admin/assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    @include('layouts.partials.agent.head-css')
    @csrf
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @include('layouts.partials.agent.page-title', [
                        'subtitle' => 'Dashtrap',
                        'title' => 'Dashboard',
                    ])

                    {{-- Récapitulatif --}}
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
                                                {{ $statusText }}
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
                                            <h3 class="d-flex align-items-center mb-0">
                                                {{ $servicesPayes }}
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
                                        <span
                                            class="badge badge-soft-primary float-end">{{ now()->format('d/m/Y') }}</span>
                                        <h3 class="card-title mb-0">Nombre de service</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h3 class="d-flex align-items-center mb-0">
                                                {{ $services->count() }}
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
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0;"></div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->
                        <!-- end col-->
                    </div>

                    {{-- Point des recettes --}}
                    <div class="col-lg-13">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-subtitle mb-4 font-size-13">
                                <h2 class="container text-center">Point des recettes</h2>
                                </p>
                                <br>
                                <p>
                                <form method="GET" action="{{ route('agent.interval') }}" class="form-horizontal"
                                    role="form">
                                    <div class="mb-2 row">
                                        <div class="mb-2 row col-md-4">
                                            <label class="col-md-2 col-form-label" for="date_debut">Du</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" name="date_debut"
                                                    id="date_debut">
                                            </div>
                                        </div>
                                        <div class="mb-2 row col-md-4">
                                            <label class="col-md-2 col-form-label" for="date_fin">Au</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" name="date_fin"
                                                    id="date_fin">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
                                        </div>
                                    </div>
                                </form>

                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Services effectués</h4>
                                                <p class="card-subtitle mb-4 font-size-13">Intervalle de transaction du
                                                    {{ $date_debut }} au {{ $date_fin }}</p>
                                                <div class="table-responsive">
                                                    <div class="table-responsive service-table">
                                                        <table
                                                            class="table table-centered table-striped table-nowrap mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Type de service</th>
                                                                    <th>Prix</th>
                                                                    <th>État de service</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($serviceintervalle as $service)
                                                                    <tr>
                                                                        <td>{{ $service->notification->service_type }}
                                                                        </td>
                                                                        <td>{{ $service->prix }}</td>
                                                                        <td>
                                                                            @if ($service->payer == 1)
                                                                                <span class="dot blink red"></span> Fin
                                                                                du service
                                                                            @else
                                                                                <span class="dot blink green"></span>
                                                                                En cours
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="text-center mt-3">
                                                            <button
                                                                class="btn btn-primary previous-btn">Précédent</button>
                                                            <button class="btn btn-primary next-btn">Suivant</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Stock</h4>
                                                <p class="card-subtitle mb-4">Recent Stock</p>

                                                <div class="text-center">
                                                    <input data-plugin="knob" data-width="165" data-height="165"
                                                        data-linecap=round data-fgColor="#7a08c2" value="95"
                                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                        data-thickness=".15" />
                                                    <h5 class="text-muted mt-3">Total sales made today</h5>


                                                    <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading
                                                        elements are
                                                        designed to work best in the meat of your page content.</p>

                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                                            <h4><i class="fas fa-arrow-up text-success me-1"></i>$7.8k
                                                            </h4>

                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last week
                                                            </p>
                                                            <h4><i class="fas fa-arrow-down text-danger me-1"></i>$1.4k
                                                            </h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!--end card body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->

                                    <div class="col-lg-3">
                                        <div class="card" dir="ltr">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Graphique en aire</h4>
                                                <div class="text-center">
                                                    <p class="text-muted font-size-15 mb-0">
                                                        <span class="mx-2"><i
                                                                class="mdi mdi-checkbox-blank-circle text-blue"></i>
                                                            Hier</span>
                                                        <span class="mx-2"><i
                                                                class="mdi mdi-checkbox-blank-circle text-danger"></i>
                                                            Aujourd'hui</span>
                                                    </p>
                                                </div>
                                                <div id="morris-area-example" style="height: 350px;"
                                                    class="morris-chart"></div>
                                            </div>
                                        </div> <!-- end card-->
                                    </div>


                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title">Point</h4>
                                                <p class="card-subtitle mb-4 font-size-13">
                                                </p>

                                                <div class="table-responsive">
                                                    <table class="table table-centered table-striped table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Type de service</th>
                                                                <th>Montant</th>
                                                                <th>Etat de service</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-user">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                                        class="mr-2 avatar-xs rounded-circle">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-body font-weight-semibold">Paul J. Friend</a>
                                                                </td>
                                                                <td>
                                                                    937-330-1634
                                                                </td>
                                                                <td>
                                                                    pauljfrnd@jourrapide.com
                                                                </td>


                                                            </tr>

                                                            <tr>
                                                                <td class="table-user">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="table-user"
                                                                        class="mr-2 avatar-xs rounded-circle">
                                                                    <a href="javascript:void(0);"
                                                                        class="text-body font-weight-semibold">Bryan J. Luellen</a>
                                                                </td>
                                                                <td>
                                                                    215-302-3376
                                                                </td>
                                                                <td>
                                                                    bryuellen@dayrep.com
                                                                </td>


                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <!--end card body-->

                                        </div>

                                        <!--end card-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Stock</h4>
                                                <p class="card-subtitle mb-4">Recent Stock</p>

                                                <div class="text-center">
                                                    <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                                                        data-fgColor="#7a08c2" value="95" data-skin="tron" data-angleOffset="180"
                                                        data-readOnly=true data-thickness=".15" />
                                                    <h5 class="text-muted mt-3">Total sales made today</h5>


                                                    <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading
                                                        elements are
                                                        designed to work best in the meat of your page content.</p>

                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                                            <h4><i class="fas fa-arrow-up text-success me-1"></i>$7.8k</h4>

                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                                            <h4><i class="fas fa-arrow-down text-danger me-1"></i>$1.4k</h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> <!--end card body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->

                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h4 class="card-title">Account Transactions</h4>
                                                        <p class="card-subtitle mb-4">Transaction period from 21 July to
                                                            25 Aug</p>
                                                        <h3>$7841.12 <span class="badge badge-soft-success float-end">+7.5%</span>
                                                        </h3>
                                                    </div>
                                                </div> <!-- end row -->

                                                <div id="sparkline1" class="mt-3"></div>
                                            </div>
                                            <!--end card body-->
                                        </div>
                                        <!--end card-->

                                    </div>
                                </div> --}}



                                {{-- <div class="">
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
                                </div> --}}

                            </div>
                            <!--end card body-->

                        </div>
                        <!--end card-->
                    </div>






                    {{-- Ancien Point des recettes --}}

                    {{-- <div class="container text-center">
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
                            <form action="#" style="display: flex; align-items: center;">
                                <label for="start_date" style="margin-right: 15px;">Date de début:</label>
                                <input type="date" class="form-control custom-btn" name="start_date" id="start_date" required style="margin-right: 10px; width: 300px;">

                                <label for="end_date" style="margin-right: 15px;">Date de fin:</label>
                                <input type="date" class="form-control custom-btn" name="end_date" id="end_date" required style="margin-right: 10px; width: 300px;">

                                <button type="submit" class="btn btn-primary custom-btn" style="margin-right: 10px;">Point Journalier</button>
                                <button type="submit" class="btn btn-primary custom-btn">Rechercher</button>

                            </form>

                    </p>
                    <p>
                    <h1><span id="display_start_date"></span></p>
                    </h1>
                    <div class="col-lg-15">
                        <div class="card">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Type de service</th>
                                        <th>Montant</th>
                                        <th>Etat de service</th>
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

                    <div class="col-lg-15">
                        <div class="card">
                            <table class="table table-centered table-striped table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Type de service</th>
                                        <th>Montant</th>
                                        <th>Etat de service</th>
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
                <!--end row--> --}}

                    <div class="row">

                        <!--end col-->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-subtitle mb-4 font-size-13">
                                    <h2 class="container text-center">Services en Cours</h2>
                                    </p>
                                    <div class="">
                                        <div class="container">
                                            <div class="table-responsive service-table-1">
                                                <!-- Ajoutez la classe service-table-1 -->
                                                <!-- Tableau des services en cours -->
                                                @if ($services->isEmpty())
                                                    <p>Aucun service en cours</p>
                                                @else
                                                    <table
                                                        class="table table-centered table-striped table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nom de l'expéditeur</th>
                                                                <th>Description</th>
                                                                <th>Type de service en cours</th>
                                                                <th>État du service</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($services->where('payer', 0) as $service)
                                                                <tr>
                                                                    <td>{{ $service->notification->id }}</td>
                                                                    <td>{{ $service->notification->user->name }}</td>
                                                                    <td>{{ $service->description }}</td>
                                                                    <td>{{ $service->notification->service_type }}</td>
                                                                    <td>
                                                                        <span class="dot blink green"></span> En cours
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ asset('admin/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>



    </body>

    </html>
