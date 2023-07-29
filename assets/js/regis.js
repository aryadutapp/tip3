 function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
            } else {
              passwordInput.type = 'password';
            }
          }

    function validateForm(event) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password2').value;

      if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        const warningMessage = document.getElementById('password-warning');
        warningMessage.innerText = 'Password and Konfirmasi Password must match.';
        warningMessage.style.display = 'block';
      } else if (password.length < 8) {
        event.preventDefault(); // Prevent form submission
        const warningMessage = document.getElementById('password-warning');
        warningMessage.innerText = 'Password must be at least 8 characters long.';
        warningMessage.style.display = 'block';
      }
    }
