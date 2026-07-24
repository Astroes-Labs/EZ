
    {{-- ==================== REGISTER TEST FILLER (Fixed Version) ==================== --}}
<div class="fixed bottom-6 left-6 z-[9999]">
    <button onclick="fillRegisterTestData()"
            class="flex items-center gap-3 bg-[#222f53] hover:bg-[#2a3a6b] border border-[#eac46e] text-white px-6 py-3.5 rounded-2xl text-sm font-medium shadow-2xl transition-all active:scale-95">
        <i class="fa fa-magic"></i>
        <span>Fill Test Data (Register)</span>
    </button>
</div>

<script>
    function fillRegisterTestData() {
        const testData = {
            first_name: "John",
            last_name: "Doe",
            email: "john.doe." + Date.now() + "@test.com",
            password: "shdjt123#",
            password_confirmation: "shdjt123#",
            acctype: 1,           // Individual Account
            country: "Bangladesh",
            currency: "USD",
            acc_type: "BASIC",
            agree1: true,
            agree2: true,
            agree3: true,
            dob: "1995-05-15"       // for date field
        };

        Object.keys(testData).forEach(key => {
            // Stronger selector to catch all wire:model variations
            const selector = `[wire\\:model="${key}"], [wire\\:model\\.defer="${key}"], [wire\\:model\\.lazy="${key}"], [wire\\:model\\$="${key}"]`;
            const element = document.querySelector(selector);

            if (element) {
                if (element.type === 'checkbox') {
                    element.checked = testData[key];
                } else {
                    element.value = testData[key];
                }

                // Force Livewire to detect the change
                element.dispatchEvent(new Event('input', { bubbles: true }));
                element.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });

        console.log('%c✅ Register form filled successfully!', 'color:#eac46e; font-weight:bold;');
        alert('✅ Test data has been filled! You can now submit the form.');
    }
</script>

