<!-- Core JS files -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js?v=' . rand(1,100)) }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset('assets/demo/pages/extra_sweetalert.js') }}"></script>
<script src="{{ asset('assets/js/vendor/visualization/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/visualization/d3/d3_tooltip.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('assets/js/vendor/forms/selects/select2.min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>

<script src="{{ asset('/plugin/datepicker-1.9.0/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/plugin/jquery-form/jquery.form.min.js') }}"></script>
<script src="{{ asset('/js/custom.js?v=' . rand(1,100)) }}"></script>
<script>
    moment.locale('id');

    setInterval(function() {
        var tanggal = moment().format('dddd, DD MMMM YYYY, H:mm:ss');
        $(".date-time").html(tanggal);
    }, 1000);

    base_url = function(param) {
        var public_url = "{{ url('') }}";
        var base_url = public_url + "/" + param;
        return base_url;
    }
</script>

@stack('script-default')