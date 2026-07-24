// File: public/admin/js/login.js
/**
 * Admin Login Page JavaScript
 * - Frontend validation (Toastr errors)
 * - Password visibility toggle
 * - Matches exact requirements
 */

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('login-form');
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('password-addon');

    // ================== PASSWORD TOGGLE ==================
    toggleBtn.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.textContent = '🙈';
        } else {
            passwordInput.type = 'password';
            toggleBtn.textContent = '👁';
        }
    });

    // ================== FRONTEND VALIDATION ==================
    form.addEventListener('submit', (e) => {
        const username = document.getElementById('username').value.trim();
        const password = passwordInput.value.trim();
        let isValid = true;

        if (!username) {
            toastr.error('Username is required');
            isValid = false;
        }

        if (!password) {
            toastr.error('Password is required');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});