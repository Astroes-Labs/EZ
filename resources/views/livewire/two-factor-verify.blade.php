<div class="bg-white/5 backdrop-blur-lg p-8 rounded-2xl border border-red-600/30 shadow-2xl">
    <form wire:submit="verify" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-300">Verification Code</label>
            <input wire:model.debounce.500ms="code" type="text" maxlength="4" inputmode="numeric" pattern="[0-9]*" placeholder="- - - -"
                required
                class="mt-2 block w-full rounded-xl border-0 bg-gray-800/70 text-white text-center text-3xl tracking-widest py-6 focus:ring-2 focus:ring-red-600">
            @error('code') <p class="mt-2 text-sm text-red-400">{{ $message }}</p> @enderror
        </div>

        <button type="submit" wire:loading.attr="disabled"
            class="w-full bg-red-600 text-white py-4 rounded-xl font-bold hover:bg-red-700 transition">
            <span wire:loading.remove>Verify & Login</span>
            <span wire:loading>Verifying...</span>
        </button>
    </form>

</div>