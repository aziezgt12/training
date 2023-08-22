    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script src="<?= base_url('assets/argon/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/argon/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/argon/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/argon/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url() ?>assets/plugins/sweet-alert2/sweetalert2.all.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/argon/js/argon-dashboard.min.js?v=2.0.4') ?>"></script>

  