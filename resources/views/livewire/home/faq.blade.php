<div class="min-h-screen bg-[#07070a] text-gray-100 font-sans">

    <!-- Page Hero / Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-[#07070a] overflow-hidden pt-20" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 pointer-events-none"></div>
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/40 to-transparent"></div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tighter uppercase font-mono">
                FREQUENTLY ASKED <span class="text-[#8b5cf6]">QUESTIONS</span>
            </h1>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 lg:py-28 bg-[#07070a]">
        <div class="max-w-screen-2xl mx-auto px-6 lg:px-12">
            <div class="max-w-4xl mx-auto">
                <!-- Heading -->
                <div class="text-center mb-16">
                    <p class="text-xs font-mono uppercase tracking-widest text-[#8b5cf6] mb-2">Help Center</p>
                    <h2 class="text-3xl lg:text-4xl font-black text-white tracking-tight uppercase">
                        FAQs
                    </h2>
                    <p class="text-sm text-gray-400 font-light mt-4 max-w-2xl mx-auto">
                        Carefully curated most asked questions by investors and prospective investors on {{ config('app.name') }}.
                    </p>
                </div>

                <!-- FAQ Accordion -->
                <div class="space-y-4">
                    @foreach([
                        [
                            'question' => 'How can I open an account?',
                            'answer' => 'To become an active investor, you must be signed up on our platform. Before signing up, we strongly recommend that you familiarize yourself with <a href="'.route('terms').'" class="text-[#8b5cf6] hover:underline font-mono">Terms & Conditions</a>. You will automatically accept all provisions of this document after finishing the sign up. In addition, we recommend you to read the <a href="'.route('how').'" class="text-[#8b5cf6] hover:underline font-mono">How It Works</a> section.'
                        ],
                        [
                            'question' => 'What does it cost to open an account?',
                            'answer' => 'It is totally free to open an account with us.'
                        ],
                        [
                            'question' => 'Why should I choose ' . config('app.name') . ' ?',
                            'answer' => 'The main advantages of our platform are its profitability, convenience for investors and low risks. Due to the experience of our experts and the developed investing strategies, we can guarantee significant increase in your capital within a short time frame.'
                        ],
                        [
                            'question' => 'Can I open multiple accounts?',
                            'answer' => 'Investors are allowed to have just one account with ' . config('app.name') . '. Our technical control service checks every sign up and if several accounts are found that contain the same user data, all these accounts are blocked. The funds in these accounts are also getting blocked. Contact support for resolution if this use case applies to you.'
                        ],
                        [
                            'question' => 'What are the payment methods for deposits?',
                            'answer' => 'Due to the speed of processing transactions and limits by many countries, we have chosen Bitcoin as our only mode of transaction. It is easy, fast and reliable. To make a deposit, login to your account and click “Deposit Fund”. Choose Bitcoin and input the desired amount (minimum $1000). Preview your payment and proceed to the payment page and complete payment by sending the exact amount to the wallet address or QR code provided.'
                        ],
                        [
                            'question' => 'How long does it take for deposit to be confirmed?',
                            'answer' => 'Deposits are confirmed immediately funds are received. Deposits via some payment methods might take a little while. Please contact <a href="mailto:'.config('app.email').'" class="text-[#8b5cf6] hover:underline font-mono">'.config('app.email').'</a>, in case you have deposited funds but it is not showing in your account.'
                        ],
                        [
                            'question' => 'Can I invest in multiple plans?',
                            'answer' => 'Yes you can. And you can also invest multiple times in one plan.'
                        ],
                        [
                            'question' => 'Are returns on investments guaranteed?',
                            'answer' => 'We put in extra efforts to guarantee a steady profit return for all our clients depending on the investment plan they invest into.'
                        ],
                        [
                            'question' => 'What are the withdrawal limits?',
                            'answer' => 'You can withdraw any remaining balance in your account if it is up to $200 that is not currently being used to secure open investments. However, please note, if the requested amount is lower than the processing fee, we won’t be able to proceed with the request.'
                        ],
                        [
                            'question' => 'How long does it take for withdrawals to be processed?',
                            'answer' => 'Withdrawal requests are processed instantly. Please note, at the ' . config('app.name') . ' sole discretion, in some cases we can require additional information on the event of the withdrawal, in which case the request might be processed later. After the withdrawal request is processed, it depends on the withdrawal method how long it takes for the client to receive the funds.'
                        ],
                        [
                            'question' => 'Can I withdraw directly to my bank account?',
                            'answer' => 'No you can’t. Since Bitcoin is our sole means of transaction, you would have to withdraw to your bitcoin wallet before sending to your bank.'
                        ],
                        [
                            'question' => 'What are the fees and charges associated with the service?',
                            'answer' => 'As you may be aware, there is a cost associated with the services provided by the mining pool. In this case, there is a 20% commission fee applied to your overall profit margin. This fee covers various aspects such as managing and growing your trading account, as well as maximizing your profits.'
                        ],
                        [
                            'question' => 'What is our stance on the 20% commission fee?',
                            'answer' => 'At ' . config('app.name') . ' we are committed to providing our investors with transparent and fair terms of service. This policy outlines our stance on the 20% commission fee for account management and profit maximization, clarifying that this fee cannot be deducted from your account balance. Instead, investors are required to pay this fee from their own pocket.<br><br>1. Commission Fee: We charge a 20% commission fee on profits from these services.<br>2. Payment Responsibility: You must pay this fee from your own pocket; it won\'t be deducted from your balance.<br>3. Payment Method: Use our supported payment methods to settle the fee.<br>4. No Deductions: We won\'t deduct the fee from your account balance or profits.<br>5. Fee Details: Find rates and deadlines in our fee structure document.<br>7. Policy Updates: We may update this policy, and you\'ll be informed.'
                        ],
                        [
                            'question' => 'How often can I withdraw?',
                            'answer' => 'You can withdraw your funds anytime and any day. We operate 24/7 hence, we carry out transactions every day.'
                        ],
                        [
                            'question' => 'Is there a reward program?',
                            'answer' => config('app.name') . ' has a referral program for all investments plan. Investor can earn up to 5% referral bonus on referrals deposits.'
                        ],
                        [
                            'question' => 'Can I receive referral bonus without depositing?',
                            'answer' => 'Yes. Our referral program is an alternative way to earn on ' . config('app.name') . '.'
                        ],
                        [
                            'question' => 'Is your support service easy to contact?',
                            'answer' => 'Yes! We know how frustrating modern customer support can be. We take pride in offering fast, friendly, and most importantly efficient customer service 24 hours a day through our Livechat, email and WhatsApp and telegram support lines. Details are on our contact page.'
                        ],
                        [
                            'question' => 'What are the working hours of support services?',
                            'answer' => 'If you use email to contact us, we work around the clock. If you decide to contact us via online chat support will be available 24/7.'
                        ],
                        [
                            'question' => 'My questions are not answered here?',
                            'answer' => 'Use support services like email, whatsapp, phone calls and text messages to contact us for any questions you may have. Do not duplicate your question on our support services, please use only one way for reaching us.'
                        ]
                    ] as $faq)
                    <div class="bg-[#111116] border border-white/10 hover:border-[#8b5cf6]/60 rounded-none overflow-hidden transition-all duration-300 shadow-[0_20px_50px_rgba(0,0,0,0.8)] relative group">
                        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#8b5cf6]/30 to-transparent"></div>
                        <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span').classList.toggle('rotate-45')"
                                class="w-full text-left p-6 lg:p-8 flex justify-between items-center focus:outline-none">
                            <h4 class="text-sm lg:text-base font-mono font-bold text-white tracking-wider pr-8 uppercase">
                                {{ $faq['question'] }}
                            </h4>
                            <span class="text-xl text-[#8b5cf6] font-mono transition-transform duration-300">+</span>
                        </button>
                        <div class="hidden px-6 lg:px-8 pb-6 lg:pb-8 text-sm font-light text-gray-300 leading-relaxed border-t border-white/5 pt-4">
                            {!! $faq['answer'] !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>