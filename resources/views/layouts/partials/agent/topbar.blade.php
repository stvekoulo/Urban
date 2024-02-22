<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="logo" class="logo-lg" height="22">
                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="22">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg" height="22">
                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="22">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-4">

            @if(Request::is('agent/home'))
                <li class="d-none d-md-inline-block">
                    <form id="toggleStatusForm" action="{{ route('status.toggle') }}" method="POST">
                        @csrf
                        <button type="submit" id="changeStatusBtn" class="btn btn-primary">
                            @if(auth()->user()->status && auth()->user()->status->status === 'not_available')
                                Disponible
                            @else
                                Non disponible
                            @endif
                        </button>
                    </form>
                </li>
            @endif

            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </a>
            </li>
            @if(Request::is('agent/home'))
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell font-size-24"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $notifications->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-size-16 fw-semibold">Notification</h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('notifications.clear')}}" class="text-dark text-decoration-underline">
                                    <small>Effacez tout</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-1" style="max-height: 300px;" data-simplebar>
                        @forelse($notifications as $notification)
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="noti-item-subtitle text-muted mb-1" style="white-space: normal;">{{ $notification->message }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-success btn-sm me-2" onclick="showAcceptModal({{ $notification->id }}, {{ $notification->user_id }})">
                                                    <i class="mdi mdi-check"></i> Accepter
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-close"></i> Refuser
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted font-size-13 fw-normal mt-2">Aucune notification</p>
                        @endforelse
                    </div>
                </div>
            </li>
            @endif
            <li class="nav-link" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>

            <li class="dropdown">
                @if(Auth::check())
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="user-image" class="rounded-circle">
                    @endif
                    <span class="ms-1 d-none d-md-inline-block">
                         <i class="mdi mdi-chevron-down"></i>
                    {{ Auth::user()->name }}
                    </span>
                </a>
                @else
                    <script>window.location.href = "{{ route('welcome') }}";</script>
                @endif
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bienvenue !</h6>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
    </div>
</div>

<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptModalLabel">Accepter la notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="acceptForm">
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Type de service</label>
                        <select class="form-select" id="serviceType" name="serviceType" onchange="toggleFields()">
                            <option value="transport">Transport</option>
                            <option value="livraison">Livraison</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" style="display: none;"></textarea>
                    </div>
                    <div class="mb-3" id="prixField">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix">
                    </div>
                    <input type="hidden" id="notificationId" name="notification_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="submitAcceptForm()">Soumettre</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fonction pour afficher/cacher les champs en fonction du type de service sélectionné
    function toggleFields() {
        var serviceType = $('#serviceType').val();
        if (serviceType === 'transport') {
            $('#description').val('').hide();
            $('#prixField').show();
        } else if (serviceType === 'livraison') {
            $('#description').val('').show();
            $('#prixField').show();
        }
    }

    // Fonction pour afficher le formulaire modal
    function showAcceptModal(notificationId) {
        // Vous pouvez utiliser cette fonction pour charger des données spécifiques dans le formulaire modal si nécessaire
        $('#notificationId').val(notificationId); // Pré-remplissez le champ de l'identifiant de la notification dans le formulaire modal
        toggleFields(); // Assurez-vous que les champs appropriés sont affichés en fonction du type de service
        $('#acceptModal').modal('show');
    }

    // Fonction pour soumettre le formulaire
    function submitAcceptForm() {
        // Récupérez les valeurs des champs du formulaire
        var notificationId = $('#notificationId').val();
        var serviceType = $('#serviceType').val();
        var description = $('#description').val();
        var prix = $('#prix').val();

        // Validation des champs
        if (serviceType.trim() === '' || (serviceType === 'livraison' && description.trim() === '') || prix.trim() === '') {
            alert('Veuillez remplir tous les champs');
            return;
        }

        // Soumission du formulaire via AJAX
        $.ajax({
            url: '{{ route("accept.notification") }}', // Utilisation de la route nommée pour l'URL
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Ajout du jeton CSRF pour la protection
                notification_id: notificationId,
                service_type: serviceType,
                description: description,
                prix: prix
            },
            success: function(response) {
                // Réponse après soumission réussie
                console.log(response);
                // Fermeture du formulaire modal
                $('#acceptModal').modal('hide');
            },
            error: function(xhr, status, error) {
                // Gestion des erreurs
                console.error(xhr.responseText);
            }
        });
    }
</script>


<script src="{{ asset('js/app.js') }}"></script>


<!-- ========== Topbar End ========== -->
