document.addEventListener('DOMContentLoaded', function() {
  const dataForm = document.querySelector('.popap-form');
  const popapItem = document.querySelector('.popap');
  const popapMessage = document.querySelector('.popap__message');

  document.querySelectorAll('.js-modal-init').forEach(function(element) {
  element.addEventListener('click', function(e) {
    popapItem.classList.toggle('popap--visible');
      document.body.classList.toggle('body--hidden');
      e.preventDefault();
    });
  });

  dataForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(dataForm);
    fetch('sendform.php', {
      method: 'POST',
      body: formData
    }).then(function(response) {
    dataForm.classList.add('popap-form--hidden');
    popapMessage.classList.add('popap__message--show');
    });
  });
});