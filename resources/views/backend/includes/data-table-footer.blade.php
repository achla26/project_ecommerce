{{-- <script src="{{asset('assets/backend/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('assets/backend/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

        <!-- Datatable Demo Aapp js -->
        <script src="{{asset('assets/backend/js/pages/demo.datatable-init.js')}}"></script> --}}

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>

<script>
  $(document).ready(function () {
         // Create search inputs in footer
      $("#example tfoot th").each(function () {
          var title = $(this).text();
          $(this).html('<input type="text" placeholder="Search ' + title + '" />');
      });
      // DataTable initialisation
      var table = $("#example").DataTable({
          dom: '<"dt-buttons"Bf><"clear">lirtp',
          paging: true,
          autoWidth: true,
          buttons: [
              "colvis",
              "copyHtml5",
              "csvHtml5",
              "excelHtml5",
              "pdfHtml5",
              "print"
          ],
          initComplete: function (settings, json) {
              var footer = $("#example tfoot tr");
              $("#example thead").append(footer);
          }
      });
  
      // Apply the search
      $("#example thead").on("keyup", "input", function () {
          table.column($(this).parent().index())
          .search(this.value)
          .draw();
      });
  });
</script>