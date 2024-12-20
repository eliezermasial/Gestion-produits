<!DOCTYPE html>
<html lang="en" translate="no">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('images/favicon.png') }}" />
  <!-- Ajouter le CDN de SweetAlert2 dans ton <head> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* Pour centrer l'alerte */
    .swal2-popup {
        font-size: 1.6rem; /* Taille du texte */
    }

    /* Si nécessaire, ajouter des styles personnalisés pour mieux positionner */
    .centered-popup {
        top: 50% !important;
        transform: translateY(-50%) !important;
    }
</style>
<body>
    <div class="container-scroller"> 
        <!-- partial:partials/_navbar -->
        @include('partials.navBar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
      
            <!-- partial:partials/_settings-panel -->
            @include('partials.settingPanel')
            <!-- partial -->

            <!-- partial:partials/_sidebar.html-->
            @include('partials.sidebar')
            <!-- partial -->

            <!-- main-panel -->
            @yield('content')
            <!-- main-panel ends -->

        </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2024. realisé by eliezer tamba.</span>
        </div>
    </footer>

    <!-- plugins:js -->
    <script src="{{ url('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ url('vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ url('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('js/template.js')}}"></script>
    <script src="{{ url('js/settings.js')}}"></script>
    <script src="{{ url('js/todolist.js')}}"></script>
    <script src="{{ url('js/off-canvas.js')}}"></script>
    <script src="{{ url('js/hoverable-collapse.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <!-- script qui gere la suppression -->
    <script type="text/javascript">
        function confirmDelete() {
          event.preventDefault();
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Voulez-vous vraiment effectuer cet action?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler',
                background: '#333', // Fond noir
                color: '#fff', // Texte en blanc
                backdrop: `
                  rgba(0,0,0,0.8) 
                  left top
                  no-repeat
                `,
                customClass: {
                    popup: 'centered-popup'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si l'utilisateur confirme la suppression, soumets le formulaire avec l'ID unique
                    document.getElementById('deleteForm'+ produitId).submit();
                }
            });
        }
    </script>
</body>

</html>

