function validateForm() {
    var password1 = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var warningElement = document.getElementById('password-warning');

    if (password1 !== password2) {
        warningElement.textContent = 'Password tidak sama';
        warningElement.classList.add('text-red-600'); // Add the 'text-red' class
        return false; // Prevent form submission
    } 
    else if (password1.length < 8) {
        warningElement.textContent = 'Passwords minimal 8 karakter';
        warningElement.classList.add('text-red-600'); // Add the 'text-red' class
        return false; // Prevent form submission
    }

    else {
        warningElement.textContent = ''; // Clear the warning if passwords match
        warningElement.classList.remove('text-red-600'); // Remove the 'text-red' class

    }

    return true; // Allow form submission
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }

}

function togglePasswordVisibility2() {
    var passwordInput = document.getElementById('password2');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }

}