function validateForm() {
    console.log('validateForm() function called'); // Add this line

    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var warningElement = document.getElementById('password-warning');

    if (password !== password2) {
        warningElement.textContent = 'Password tidak sama';
        warningElement.classList.add('text-red-600'); // Add the 'text-red' class
        return false; // Prevent form submission
    } else if (password.length < 8) {
        warningElement.textContent = 'Password minimal 8 karakter';
        warningElement.classList.add('text-red-600'); // Add the 'text-red' class
        return false; // Prevent form submission
    } else {
        warningElement.textContent = ''; // Clear the warning if passwords match
        warningElement.classList.remove('text-red-600'); // Remove the 'text-red' class
    }

    return true; // Allow form submission
}
