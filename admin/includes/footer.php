</div>
 <script src="<?= $asset_path ?? ''; ?>assets/js/core/jquery.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/core/jquery.dataTables.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/core/popper.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/core/bootstrap-material-design.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/plugins/sweetalert2.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/jquery.fileuploader.min.js"></script>
 <script src="<?= $asset_path ?? ''; ?>assets/js/material-dashboard.min.js?v=2.1.1" type="text/javascript"></script>
 <script>
    $(document).ready(function() {
        // enable fileuploader plugin
        $('input[name="files"]').fileuploader({
            addMore: true
        });

        $("#dataTable").DataTable();
        
    });
 </script>
 </body>

 </html>