{{-- <!-- footer content -->
<footer class="hidden-print">
    <div class="pull-left">

    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div> --}}


<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<script src="{{asset('assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app/custom/general/dashboard.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app/bundle/app.bundle.js')}}" type="text/javascript"></script>



<script src="{{asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors')}}/select2/dist/js/select2.full.min.js"></script>

{{-- 
<script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-switch/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-markdown/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/bootstrap-notify/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/jquery-validation/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/components/vendors/sweetalert2/init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
         --}}

{{-- <!-- jQuery -->
<script src="{{asset('vendors')}}/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('vendors')}}/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{asset('vendors')}}/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('vendors')}}/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{asset('vendors')}}/iCheck/icheck.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{asset('vendors')}}/moment/min/moment.min.js"></script>

<script src="{{asset('vendors')}}/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{asset('vendors')}}/select2/dist/js/select2.full.min.js"></script>
<script src="{{asset('vendors')}}/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="{{asset('vendors')}}/validator/validator.js"></script>

<!-- Custom Theme Scripts -->
<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>

<!-- Include this after the sweet alert js file -->

<!-- Chart.js -->
<script src="{{asset('vendors')}}/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="{{asset('vendors')}}/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
@if($lang == "ar")

<script src="{{asset('build')}}/js/custom.js"></script>
@else
    <script src="{{asset('build2')}}/js/custom.min.js"></script>
    @endif

  --}}
<script src="{{asset('js')}}/swetalert.js"></script>

@include('sweet::alert')

@yield('scripts')

