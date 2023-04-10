<div id="toast" class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header" style="color: red;">
      <i class="bi bi-bell"></i>
      <strong class="me-auto">Alert</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <strong>texto
        <script>
          document.getElementById("liveToastBtn").style.display = 'none';
        </script>
      </strong>
    </div>
  </div>
</div>


<div class="toast-container position-fixed bottom-0 start-0">
  <div id="liveToast1" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000">
    <div class="toast-header text-white bg-success">
      <i class="bi bi-exclamation-circle fs-4 me-2"></i>
      <strong class="me-auto">Alert</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-dark">
      Message sent successfully.
    </div>
  </div>
</div>

<script>
var myToast = document.getElementById('liveToast1');
var myToastBtn = document.getElementById('liveToastBtn1');
myToastBtn.addEventListener('click', function (e) {
  e.preventDefault(); // impede o envio do form

  var subject = document.getElementById('subject').value;
  var message = document.getElementsByName('message')[0].value;

  if (subject !== "" && message !== "") {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'PHP/contact.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // resposta do servidor
        var bsToast = new bootstrap.Toast(myToast);
        bsToast.show();
        setTimeout(function () {
          location.reload();
        }, 3000);
      }
    };
    xhr.send('subject=' + subject + '&message=' + message);
  }
});
</script>