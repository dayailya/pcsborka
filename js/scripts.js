function validateForm() {
  const form = document.querySelector('form');
  const components = form.querySelectorAll('select');

  for (let i = 0; i < components.length; i++) {
    if (components[i].value === '') {
      alert('Пожалуйста, выберите все комплектующие для сборки.');
      return false;
    }
  }

  return true;
}

document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');

  if (form) {
    form.addEventListener('submit', function(event) {
      if (!validateForm()) {
        event.preventDefault();
      }
    });
  }
});

