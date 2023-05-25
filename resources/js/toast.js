const toastTrigger = document.getElementById('liveToastBtn');
const toastLiveExample = document.getElementById('liveToast');

if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    // Exibe o Toastr ao clicar no botão
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "timeOut": 2000,
      "extendedTimeOut": 0,
      "preventDuplicates": true
    };
    toastr.error('Racing Mania in development...', 'Alert');
  });
}
