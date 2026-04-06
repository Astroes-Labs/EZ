<style>
    /* Spinner Styles */
    #spinner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        /* Use flexbox to center the spinner */
        justify-content: center;
        /* Center horizontally */
        align-items: center;
        /* Center vertically */
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        z-index: 1050;
    }

    /* Spinner Circle */
    .spinner {
        border: 4px solid rgba(255, 255, 255, 0.3);
        /* Light gray border */
        border-top: 4px solid #fff;
        /* White border for the spinning effect */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    /* Spinner Animation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
