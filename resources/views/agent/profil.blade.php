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
                <div>
                    <div class="card">
                        @if(session('warning'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('warning') }}
                                </div>
                            @endif
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="card-title">Compléter son profil</h4>
                            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Numéro de téléphone</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp_link" class="form-label">Lien vers le compte WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" value="{{ old('whatsapp_link') }}">
                                    @error('whatsapp_link')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <small>Vous pouvez utiliser ce lien pour générer un lien vers votre profil WhatsApp : <a href="https://create.wa.link/" target="_blank">Générateur de lien WhatsApp gratuit</a></small>
                                </div>
                                <div class="mb-3">
                                    <label for="national_id" class="form-label">Numéro d'identification (Carte nationale)</label>
                                    <input type="text" class="form-control" id="national_id" name="national_id" value="{{ old('national_id') }}">
                                    @error('national_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @error('photo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Compléter son profil</button>
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
