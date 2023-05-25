<div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="color: red;">
      <i class="bi bi-bell"></i>
      <strong class="me-auto">Alert</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      @if ($alert && $alert->ativo)
        <strong>{{ $alert->texto }}</strong>
      @else
        <script>
          var liveToastBtn = document.getElementById("liveToastBtn");
          if (liveToastBtn) {
            liveToastBtn.style.display = 'none';
          }
        </script>
      @endif
    </div>
  </div>
</div>



