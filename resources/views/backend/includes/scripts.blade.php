<script src="{{ url('backend/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ url('backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ url('backend/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

{{-- Datatables --}}
{{-- <script src="{{ url('backend/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="{{ url('backend/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('backend/vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('backend/dist/js/responsive-datatable-data.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ url('backend/dist/js/jquery.slimscroll.js') }}"></script>

<!-- simpleWeather JavaScript -->
<script src="{{ url('backend/vendors/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ url('backend/dist/js/simpleweather-data.js') }}"></script>

<!-- Gallery JavaScript -->
<script src="{{ url('backend/dist/js/isotope.js')}}"></script>
<script src="{{ url('backend/dist/js/lightgallery-all.js')}}"></script>
<script src="{{ url('backend/dist/js/froogaloop2.min.js')}}"></script>

<!-- Progressbar Animation JavaScript -->
<script src="{{ url('backend/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('backend/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ url('backend/dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Sparkline JavaScript -->
<script src="{{ url('backend/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- Toast JavaScript -->
{{-- <script src="{{ url('backend/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script> --}}

<!-- Switchery JavaScript -->
<script src="{{ url('backend/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- Bootstrap Select JavaScript -->
<script src="{{ url('backend/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ url('backend/dist/js/init.js') }}"></script>
<script src="{{ url('backend/dist/js/ecommerce-data.js') }}"></script>

{{-- ckeditor --}}
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>