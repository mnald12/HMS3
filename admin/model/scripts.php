<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./dist/js/app-style-switcher.js"></script>
<script src="./dist/js/waves.js"></script>
<script src="./dist/js/sidebarmenu.js"></script>
<script src="./dist/js/custom.js"></script>
<script src="./assets/libs/chartist/dist/chartist.min.js"></script>
<script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="./dist/js/pages/dashboards/dashboard1.js"></script>
<script src="./dist/tables/datatables.js"></script>
<script src="./dist/tables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#table').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });   
    });
</script>