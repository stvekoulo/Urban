@include('layouts.partials.agent.main')

<head>
    @include('layouts.partials.agent.title-meta', ['title' => 'Dashboard'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('admin/assets/libs/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

    @include('layouts.partials.agent.head-css')
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        @include('layouts.partials.agent.menu')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            @include('layouts.partials.agent.topbar')

            <div class="px-3">

                @if(session('error'))
                    <script>
                        alert("{{ session('error') }}");
                    </script>
                 @endif

                 @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Start Content-->
                <div class="container-fluid">

                   @include('layouts.partials.agent.page-title', ['subtitle' => 'Dashtrap', 'title' => 'Dashboard'])

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">{{ $statusText }}</span>
                                        <h3 class="card-title mb-0">Statut</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">
                                            <h4 class="d-flex align-items-center mb-0">
                                                Votre Statut
                                            </h4>
                                        </div>
                                        <div class="col-4 text-end">
                                            @if ($user->status)
                                            <span class="text-muted">{{ $user->status->updated_at->diffForHumans() }}<i class="mdi mdi-arrow-up text-success"></i></span>
                                        @else
                                            <span class="text-muted">No status available</span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Jour</span>
                                        <h3 class="card-title mb-0">Solde</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">

                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="text-muted"><i
                                                    class="mdi mdi-arrow-down "></i></span>
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
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Jour</span>
                                        <h3 class="card-title mb-0">Nombre de service</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">

                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="text-muted"><i
                                                    class="mdi mdi-arrow-down"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0;"></div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <span class="badge badge-soft-primary float-end">Date</span>
                                        <h3 class="card-title mb-0">Aujoud'hui</h3>
                                    </div>
                                    <div class="row d-flex align-items-center mb-4">
                                        <div class="col-8">

                                        </div>
                                        <div class="col-4 text-end">
                                            <span class="text-muted"><i
                                                    class="mdi mdi-arrow-down"></i></span>
                                        </div>
                                    </div>

                                    <div class="progress shadow-sm" style="height: 5px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0;"></div>
                                    </div>
                                </div>
                                <!--end card body-->
                            </div><!-- end card-->
                        </div> <!-- end col-->
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Statistiques et Graphiques</h4>
                                    <p class="card-subtitle mb-4"></p>
                                    <div id="morris-bar-example" class=""></div>
                                </div> <!--end card body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Rapports et Analyses</h4>
                                    <p class="card-subtitle mb-4"></p>

                                    <div class="text-center">
                                        <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                                            data-fgColor="#7a08c2" value="0" data-skin="tron" data-angleOffset="180"
                                            data-readOnly=true data-thickness=".15" />
                                        <h5 class="text-muted mt-3"></h5>

                                        <p class="text-muted w-75 mx-auto sp-line-2">Rapports et des analyses pour permettre à l'agent d'évaluer les performances du service, les tendances de livraison</p>

                                        <div class="row mt-3">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">

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
                                            <h4 class="card-title">Montant</h4>
                                            <p class="card-subtitle mb-4">
                                                <form action="#" method="post">
                                                    @csrf
                                                    <label for="start_date">Date de début :</label>
                                                    <input type="date" name="start_date" required><br><br>

                                                    <label for="end_date">Date de fin :</label>
                                                    <input type="date" name="end_date" required><br><br>
                                                    <button type="submit">Rechercher</button>

                                                </form>
                                            </p>

                                        </div>
                                    </div> <!-- end row -->

                                    <div id="sparkline1" class="mt-3"></div>
                                </div>
                                <!--end card body-->
                            </div>
                            <!--end card-->

                        </div><!-- end col -->
                    </div>
                    <!--end row-->

                    <div class="row">

                        <!--end col-->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Services</h4>
                                    <p class="card-subtitle mb-4 font-size-13"><h2>Services en Cours</h2>
                                    </p>

                                    <div class="table-responsive">

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
                                                        {{-- Utilisez une boucle pour itérer sur les services en cours --}}

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <!-- Ajoutez ici des boutons/actions supplémentaires selon vos besoins -->
                                                                    <!-- Vous pouvez ajouter un bouton pour mettre à jour l'état du service, par exemple -->
                                                                    <form action="" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                                    </form><br>

                                                                    <!-- Vous pouvez également ajouter un bouton pour marquer le service comme terminé -->
                                                                    <form action="" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit" class="btn btn-success">Terminer</button>
                                                                    </form>
                                                                </td>
                                                            </tr>

                                                        {{-- Fin de la boucle --}}
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
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">

                        </>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>

    @include('layouts.partials.agent.footer-scripts')

    <!-- Knob charts js -->
    <script src="{{asset('admin/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <!-- Sparkline Js-->
    <script src="{{asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('admin/assets/libs/morris.js/morris.min.js')}}"></script>

    <script src="{{asset('admin/assets/libs/raphael/raphael.min.js')}}"></script>

    <!-- Dashboard init-->
    <script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>

</body>

</html>
