<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://adhyy.my.id/" target="_blank">{{ config('app.name') }}</a> 2023</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->

<!--**********************************
   Support ticket button start
***********************************-->

<!--**********************************
   Support ticket button end
***********************************-->


</div>
<!--**********************************
Main wrapper end
***********************************-->

<!--**********************************
Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/owl-carousel/owl.carousel.js"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/dashboard/dashboard-1.js"></script>

<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/custom.min.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/deznav-init.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/demo.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/styleSwitcher.js"></script>

<!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/moment/moment.min.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/pickadate/picker.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/pickadate/picker.time.js"></script>
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/pickadate-init.js"></script>

<!-- Datatable -->
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin/mophy.dexignzone.com/xhtml') }}/js/plugins-init/datatables.init.js"></script>

<script>
function carouselReview(){
    /*  testimonial one function by = owl.carousel.js */
    /*  testimonial one function by = owl.carousel.js */
    jQuery('.testimonial-one').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        center:true,
        dots: false,
        navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
        responsive:{
            0:{
                items:2
            },
            400:{
                items:3
            },
            700:{
                items:5
            },
            991:{
                items:6
            },

            1200:{
                items:4
            },
            1600:{
                items:5
            }
        }
    })
}

jQuery(window).on('load',function(){
    setTimeout(function(){
        carouselReview();
    }, 1000);
});
</script>
</body>
</html>
