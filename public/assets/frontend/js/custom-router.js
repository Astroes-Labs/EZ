// custom-router.js - FINAL POLISHED VERSION
(function ($) {
    'use strict';

    let navigationHistory = [];
    let isProcessing = false;
    let maxHistoryLength = 20;   // ← Added: Prevent memory bloat

    function saveCurrentState() {
        const url = window.location.href;
        const title = document.title || 'Dashboard';

        // Prevent duplicates
        if (navigationHistory.length === 0 || navigationHistory.at(-1).url !== url) {
            navigationHistory.push({ url, title });
            
            // Limit history size
            if (navigationHistory.length > maxHistoryLength) {
                navigationHistory.shift();
            }
            
            console.log(`📌 History saved [${navigationHistory.length}]:`, url);
        }
    }

    window.openCustom = function (event, element) {
        if (event) event.preventDefault();
        if (isProcessing) return;

        const url = element.getAttribute('href');
        if (!url) return;

        isProcessing = true;
        showSpinner();

        $.ajax({
            url: url,
            method: 'GET',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                if (typeof response === 'string') {
                    $('#dynamic-content').html(response);
                } else {
                    console.warn('Response is not HTML');
                    return;
                }

                history.pushState({ url, title: document.title }, document.title, url);
                saveCurrentState();                    // ← Save AFTER load
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    window.location.href = '/login';
                } else if (xhr.status === 419) {
                    window.location.reload();
                } else if (xhr.status === 403) {
                    toastr?.error('Access denied');
                } else {
                    toastr?.error('Failed to load page');
                }
            },
            complete: function () {
                hideSpinner();
                isProcessing = false;
            }
        });
    };

    window.goBackCustom = function () {
        if (isProcessing || navigationHistory.length <= 1) {
            window.location.href = "{{ route('dashboard') }}";
            return;
        }

        navigationHistory.pop();           // Remove current
        const previous = navigationHistory.at(-1);

        console.log('⬅️ Going back to:', previous.url);

        isProcessing = true;
        showSpinner();

        $.ajax({
            url: previous.url,
            method: 'GET',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (response) {
                $('#dynamic-content').html(response);
                history.pushState({ url: previous.url, title: previous.title }, 
                                previous.title, previous.url);
                saveCurrentState();            // Re-save the page we returned to
            },
            error: function () {
                toastr?.error('Failed to go back');
                window.location.href = previous.url;   // Hard fallback
            },
            complete: function () {
                hideSpinner();
                isProcessing = false;
            }
        });
    };

    function handlePopState(e) {
        if (!e.state?.url || isProcessing) return;

        showSpinner();

        $.ajax({
            url: e.state.url,
            method: 'GET',
            success: function (response) {
                $('#dynamic-content').html(response);
                saveCurrentState();
            },
            complete: hideSpinner
        });
    }

    // Utility functions
    window.clearHistory = function () {
        navigationHistory = [];
        saveCurrentState();
        console.log('🧹 History cleared');
    };

    // Initialize
    $(document).ready(function () {
        saveCurrentState();

        window.addEventListener('popstate', handlePopState);

        // Optional: Warn before leaving page
        window.addEventListener('beforeunload', () => {
            if (navigationHistory.length > 5) {
                console.log('User leaving with', navigationHistory.length, 'pages in history');
            }
        });

        console.log('%c✅ Custom Router Fully Loaded | History:', navigationHistory.length, 'color:#eac46e; font-weight:bold');
    });

})(jQuery);