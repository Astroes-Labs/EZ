@extends('layouts.home.layout')

@section('title', 'FAQs | ' . config('app.name'))

@section('content')

    <!-- Hero Banner -->
    <section class="relative min-h-[50vh] flex items-center justify-center bg-gradient-to-br from-red-900 via-black to-gray-950 overflow-hidden" id="banner">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/40 pointer-events-none"></div>
        <div class="container mx-auto px-6 lg:px-8 relative z-10 text-center py-20 lg:py-32">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight drop-shadow-2xl animate-fade-in">
                FREQUENTLY ASKED <span class="text-red-500">QUESTIONS</span>
            </h1>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl">
            <!-- Heading -->
            <div class="text-center mb-16 animate-fade-in">
                <h5 class="text-3xl lg:text-4xl font-bold text-red-600 mb-6">FAQs</h5>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Carefully curated most asked questions by investors and prospective investors on {{ config('app.name') }}.
                </p>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-8">
                @foreach([
                    [
                        'question' => 'How can I open an account?',
                        'answer' => 'To become an active investor, you must be signed up on our platform. Before the signing up, we strongly recommend that you familiarize yourself with <a href="'.route('terms').'" class="text-red-600 hover:underline">Terms & Conditions</a>. You will automatically accept all provisions of this document after your finishing the sign up. In addition, we recommend you to read <a href="'.route('how').'" class="text-red-600 hover:underline">How It Works</a> section.',
                        'delay' => '0.1s'
                    ],
                    [
                        'question' => 'What does it cost to open an account?',
                        'answer' => 'It is totally free to open an account with us.',
                        'delay' => '0.2s'
                    ],
                    [
                        'question' => 'Why should I choose '.config('app.name').' ?',
                        'answer' => 'The main advantages of our platform is it\'s profitability, convenience for investors and low risks. Due to the experience of our expert and the developed investing strategies, we can guarantee significant increase in your capital within a short time frame.',
                        'delay' => '0.3s'
                    ],
                    [
                        'question' => 'Can I open multiple accounts?',
                        'answer' => 'Investors are allowed to have just one account with '.config('app.name').'. Our technical control service checks every sign up and if several accounts are found that contain the same user data, all these accounts are blocked. The funds in these accounts are also getting blocked. Contact support for resolve if this use case applies to you.',
                        'delay' => '0.4s'
                    ],
                    [
                        'question' => 'What are the payment methods for deposits?',
                        'answer' => 'Due to the speed of processing transactions and limits by many countries, we have chosen Bitcoin as our only mode of transaction. It is easy, fast and reliable. To make a deposit, Login to your account and click “deposit fund”. Choose Bitcoin and input the desired amount ( minimum $1000). Preview your payment and proceed to the payment page and complete payment by sending the exact amount to the wallet address or QR code provided.',
                        'delay' => '0.5s'
                    ],
                    [
                        'question' => 'How long does it take for deposit to be confirmed?',
                        'answer' => 'Deposits are confirmed immediately fund is received. Deposits via some payment methods might take a little while. Please contact <a href="mailto:'.config('app.email').'" class="text-red-600 hover:underline">'.config('app.email').'</a>, in case you have deposited fund but is not showing in your account.',
                        'delay' => '0.6s'
                    ],
                    [
                        'question' => 'Can I invest in multiple plans?',
                        'answer' => 'Yes you can. And you can also invest multiple times in one plan.',
                        'delay' => '0.7s'
                    ],
                    [
                        'question' => 'Are returns on investments guaranteed?',
                        'answer' => 'We put in extra efforts to guarantee a steady profit return for all our clients depending on the investment plan they invest into.',
                        'delay' => '0.8s'
                    ],
                    [
                        'question' => 'What are the withdrawal limits?',
                        'answer' => 'You can withdraw any remaining balance in your account if its up to $200 that is not currently being used to secure open investments, however, please note, if the requested amount is lower than the processing fee, we won’t be able to proceed with the request.',
                        'delay' => '0.9s'
                    ],
                    [
                        'question' => 'How long does it take for withdrawals to be processed?',
                        'answer' => 'Withdrawal requests are processed instantly. Please note, at the '.config('app.name').' sole discretion, in some cases we can require additional information on the event of the withdrawal, in which case the request might be processed later. After the withdrawal request is processed, it depends on the withdrawal method how long it takes for the client to receive the funds.',
                        'delay' => '1.0s'
                    ],
                    [
                        'question' => 'Can I withdraw directly to my bank account?',
                        'answer' => 'No you can’t. Since Bitcoin is our sole means of transaction, you would have to withdraw to your bitcoin wallet before sending to your bank.',
                        'delay' => '1.1s'
                    ],
                    [
                        'question' => 'What are the fees and charges associated with the service?',
                        'answer' => 'As you may be aware, there is a cost associated with the services provided by the mining pool. In this case, there is a 20% commission fee applied to your overall profit margin. This fee covers various aspects such as managing and growing your trading account, as well as maximizing your profits.',
                        'delay' => '1.2s'
                    ],
                    [
                        'question' => 'What is our stance on the 20% commission fee?',
                        'answer' => 'At '.config('app.name').' we are committed to providing our investors with transparent and fair terms of service. This policy outlines our stance on the 20% commission fee for account management and profit maximization, clarifying that this fee cannot be deducted from your account balance. Instead, investors are required to pay this fee from their own pocket. Please read this policy carefully before using our services.
                        <br><br>1. Commission Fee: We charge a 20% commission fee on profits from these services.
                        <br>2. Payment Responsibility: You must pay this fee from your own pocket; it won\'t be deducted from your balance.
                        <br>3. Payment Method: Use our supported payment methods to settle the fee.
                        <br>4. No Deductions: We won\'t deduct the fee from your account balance or profits.
                        <br>5. Fee Details: Find rates and deadlines in our fee structure document.
                        <br>7. Policy Updates: We may update this policy, and you\'ll be informed.',
                        'delay' => '1.3s'
                    ],
                    [
                        'question' => 'How often can I withdraw?',
                        'answer' => 'You can withdraw your funds anytime and any day. We operate 24/7 hence, we carry out transactions every day.',
                        'delay' => '1.4s'
                    ],
                    [
                        'question' => 'Is there a reward program?',
                        'answer' => config('app.name').' has a referral program for all investments plan. Investor can earn up to 5% referral bonus on referrals deposits.',
                        'delay' => '1.5s'
                    ],
                    [
                        'question' => 'Can I receive referral bonus without depositing?',
                        'answer' => 'Yes. Our referral program is an alternative way to earn on '.config('app.name').'.',
                        'delay' => '1.6s'
                    ],
                    [
                        'question' => 'Is your support service easy to contact?',
                        'answer' => 'Yes! We know how frustrating modern customer support can be. We take pride in offering fast, friendly, and most importantly efficient customer service 24 hours a day through our Livechat, email and WhatsApp and telegram support lines. Details are on our contact page.',
                        'delay' => '1.7s'
                    ],
                    [
                        'question' => 'What are the working hours of support services?',
                        'answer' => 'If you use email to contact us, we work around the clock. If you decide to contact us via online chat support will be available 24/7.',
                        'delay' => '1.8s'
                    ],
                    [
                        'question' => 'My questions are not answered here?',
                        'answer' => 'Use support services like email, whatsapp, phone calls and text messages to contact us for any questions you may have. Do not duplicate your question on our support services, please use only one way for reaching us.',
                        'delay' => '1.9s'
                    ]
                ] as $faq)
                    <div class="wow fadeInUp" data-wow-delay="{{ $faq['delay'] }}">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-red-600/30 transition-all duration-500 transform hover:-translate-y-4 group">
                            <button class="w-full text-left p-8 lg:p-10 flex justify-between items-center focus:outline-none">
                                <h4 class="text-xl lg:text-2xl font-bold text-red-600 group-hover:text-red-500 transition-colors">
                                    {{ $faq['question'] }}
                                </h4>
                                <span class="text-3xl text-red-600 group-hover:rotate-180 transition-transform duration-300">+</span>
                            </button>
                            <div class="px-8 lg:px-10 pb-8 lg:pb-10 text-lg lg:text-xl text-gray-700">
                                {!! $faq['answer'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('xtraJs')
    <script>
        // Optional: simple accordion behavior if you want JS toggle
        document.querySelectorAll('.group button').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
@endsection