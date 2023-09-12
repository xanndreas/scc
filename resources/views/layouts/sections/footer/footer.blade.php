<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }}">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>
          document.write(new Date().getFullYear())
        </script> <a href="{{ (!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '') }}" target="_blank" class="fw-semibold">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>, All Right Reserved.
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
