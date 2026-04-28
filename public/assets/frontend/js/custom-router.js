// custom-router.js
(function ($) {
    'use strict';

    // History stack for custom navigation
    let navigationHistory = [];
    let isPoppingState = false;

    /**
     * Save current state before navigating away
     */
    function saveCurrentState() {
        const currentUrl = window.location.href;
        const currentTitle = document.title;
        const currentContent = $('#dynamic-content').html();

        // Only push if it's different from the last entry
        if (navigationHistory.length === 0 || navigationHistory[navigationHistory.length - 1].url !== currentUrl) {
            navigationHistory.push({
                url: currentUrl,
                title: currentTitle,
                content: currentContent
            });
        }
    }

    /**
     * Main custom router function
     */
    window.openCustom = function (event, element) {
        if (event) event.preventDefault();

        const url = element.getAttribute('href');
        const price = element.getAttribute('data-price') || null;

        if (!url) return;

        saveCurrentState();

        console.log('Navigating to:', url);

        $.ajax({
            url: url,
            method: 'GET',
            beforeSend: function () {
                showSpinner();
            },
            success: function (response) {
                $('#dynamic-content').html(response).promise().done(function () {
                    hideSpinner();

                    // Update browser URL and history
                    const newState = { url: url, title: document.title };
                    history.pushState(newState, document.title, url);
                });
            },
            error: function (xhr, status, error) {
                console.error('Navigation error:', error);
                hideSpinner();
                toastr.error('Failed to load page. Please try again.');
            }
        });
    };

    /**
     * Back button functionality
     */
    window.goBackCustom = function () {
        if (navigationHistory.length > 1) {
            // Remove current page
            navigationHistory.pop();

            const previous = navigationHistory[navigationHistory.length - 1];

            isPoppingState = true;

            $('#dynamic-content').html(previous.content);

            // Update browser history
            history.pushState(
                { url: previous.url, title: previous.title },
                previous.title,
                previous.url
            );

            isPoppingState = false;

            console.log('Navigated back to:', previous.url);
        } else {
            // If no history, go to dashboard
            const dashboardUrl = "{{ route('dashboard') }}";
            window.location.href = dashboardUrl;
        }
    };

    /**
     * Handle browser back/forward buttons
     */
    function handlePopState(e) {
        if (isPoppingState) return;

        const state = e.state;

        if (state && state.url) {
            showSpinner();

            $.ajax({
                url: state.url,
                method: 'GET',
                success: function (response) {
                    $('#dynamic-content').html(response);
                    hideSpinner();
                },
                error: function () {
                    hideSpinner();
                    toastr.error('Failed to restore previous page.');
                }
            });
        }
    }

    /**
     * Initialize the router
     */
    function initCustomRouter() {
        // Save initial state
        saveCurrentState();

        // Listen for browser back/forward
        window.addEventListener('popstate', handlePopState);

        // Optional: Keyboard back support (Alt + Left Arrow)
        $(document).on('keydown', function (e) {
            if (e.altKey && e.key === 'ArrowLeft') {
                e.preventDefault();
                goBackCustom();
            }
        });

        console.log('%cCustom Router with History initialized ✅', 'color: #eac46e; font-weight: bold');
    }

    // Auto-init when script loads
    $(document).ready(initCustomRouter);

})(jQuery);