@include('layouts.partials.agent.main')

<head>
    @include('layouts.partials.agent.title-meta', ['title' => 'Dashboard'])


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

                <!-- Start Content-->
                <div class="container-fluid">
                    @include('layouts.partials.agent.page-title', ['subtitle' => 'Dashtrap', 'title' => 'Dashboard'])
                   <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="card-title">Changer de statut</h4>
                            <form action="{{ route('status.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="status" class="form-label">Statut</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="available">Disponible</option>
                                        <option value="not_available">Non disponible</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary">Changer de statut</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('layouts.partials.agent.footer')

    </div>
    <!-- End Page content -->


</div>
<!-- END wrapper -->

<!-- Vendor js -->
@include('layouts.partials.agent.footer-scripts')

<!-- Validation Demo js-->
<script src="assets/js/pages/form-validation.js"></script>

</body>
</html>
