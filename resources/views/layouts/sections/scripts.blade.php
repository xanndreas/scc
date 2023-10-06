<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/toastr/toastr.js'))}}"></script>
<script src="{{ asset(mix('assets/js/global-toastr.js')) }}"></script>

<script src="https://unpkg.com/smooth-scrollbar@8.8.4/dist/smooth-scrollbar.js"></script>
<script> Scrollbar.initAll(); </script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/651fee716fcfe87d54b71bc3/1hc2bmrd4';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
