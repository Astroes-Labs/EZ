<div class="fixed top-5 right-5 z-50 max-w-sm w-full">
    @if (session('message'))
        <div class="bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center justify-between animate-fade-in">
            <span>{{ session('message') }}</span>
            <button type="button" class="ml-4 text-white hover:text-green-100 focus:outline-none" 
                    onclick="this.parentElement.remove()">
                ×
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-600 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center justify-between animate-fade-in">
            <span>{{ session('error') }}</span>
            <button type="button" class="ml-4 text-white hover:text-red-100 focus:outline-none" 
                    onclick="this.parentElement.remove()">
                ×
            </button>
        </div>
    @endif
</div>