<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body style="margin:0;padding:0;background-color:#0d1117;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0d1117;padding:40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background-color:#1a2238;border-radius:16px;border:1px solid #222f53;overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td style="background-color:#111827;padding:32px 40px;text-align:center;border-bottom:1px solid #222f53;">
                            <img src="{{ url('assets/images/rel-icon.png') }}" alt="{{ config('app.name') }}" style="height:48px;width:auto;">
                            <p style="margin:10px 0 0;font-size:20px;font-weight:700;color:#ffffff;letter-spacing:0.5px;">
                                {{ ucfirst(config('app.name')) }}
                            </p>
                        </td>
                    </tr>

                    {{-- Hero --}}
                    <tr>
                        <td style="background:linear-gradient(135deg,#1a2238 0%,#111827 100%);padding:48px 40px;text-align:center;border-bottom:1px solid #222f53;">
                            <h1 style="margin:0 0 16px;font-size:32px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;">
                                Welcome to <span style="color:#eac46e;">{{ ucfirst(config('app.name')) }}</span>
                            </h1>
                            <p style="margin:0;font-size:16px;color:#9ca3af;line-height:1.7;">
                                Your account has been created successfully.<br>
                                You're now part of a smarter way to invest digitally.
                            </p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:48px 40px;">

                            <p style="margin:0 0 24px;font-size:15px;color:#d1d5db;line-height:1.7;">
                                Hi <strong style="color:#ffffff;">{{ $user->name }}</strong>,
                            </p>
                            <p style="margin:0 0 36px;font-size:15px;color:#9ca3af;line-height:1.7;">
                                We're thrilled to have you on board. Your account is ready and you can start exploring investment options right away.
                            </p>

                            {{-- Stats Row --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:36px;">
                                <tr>
                                    <td style="width:33%;padding:20px;background-color:#111827;border:1px solid #222f53;border-radius:12px;text-align:center;">
                                        <p style="margin:0 0 6px;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6b7280;">Account Status</p>
                                        <p style="margin:0;font-size:16px;font-weight:700;color:#eac46e;">Active</p>
                                    </td>
                                    <td style="width:4%;"></td>
                                    <td style="width:33%;padding:20px;background-color:#111827;border:1px solid #222f53;border-radius:12px;text-align:center;">
                                        <p style="margin:0 0 6px;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6b7280;">Member Since</p>
                                        <p style="margin:0;font-size:16px;font-weight:700;color:#ffffff;">{{ now()->format('M Y') }}</p>
                                    </td>
                                    <td style="width:4%;"></td>
                                    <td style="width:33%;padding:20px;background-color:#111827;border:1px solid #222f53;border-radius:12px;text-align:center;">
                                        <p style="margin:0 0 6px;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6b7280;">Network</p>
                                        <p style="margin:0;font-size:16px;font-weight:700;color:#ffffff;">Global</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- CTA --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:36px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('dashboard') }}"
                                           style="display:inline-block;background-color:#eac46e;color:#111827;font-size:15px;font-weight:700;text-decoration:none;padding:16px 48px;border-radius:12px;letter-spacing:0.5px;">
                                            Go to Dashboard
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            {{-- What's next --}}
                            <div style="background-color:#111827;border:1px solid #222f53;border-radius:12px;padding:28px;">
                                <p style="margin:0 0 16px;font-size:13px;letter-spacing:2px;text-transform:uppercase;color:#6b7280;">
                                    Getting Started
                                </p>
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="padding:10px 0;border-bottom:1px solid #1f2937;">
                                            <span style="color:#eac46e;font-weight:700;margin-right:12px;">01</span>
                                            <span style="color:#d1d5db;font-size:14px;">Complete your profile and KYC verification</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px 0;border-bottom:1px solid #1f2937;">
                                            <span style="color:#eac46e;font-weight:700;margin-right:12px;">02</span>
                                            <span style="color:#d1d5db;font-size:14px;">Make your first deposit to activate your account</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px 0;">
                                            <span style="color:#eac46e;font-weight:700;margin-right:12px;">03</span>
                                            <span style="color:#d1d5db;font-size:14px;">Choose an investment plan and start earning</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    {{-- Support --}}
                    <tr>
                        <td style="padding:0 40px 40px;text-align:center;">
                            <p style="margin:0;font-size:13px;color:#6b7280;line-height:1.6;">
                                Need help getting started? Reach us at
                                <a href="mailto:{{ config('app.support_email') }}"
                                   style="color:#eac46e;text-decoration:none;">
                                    {{ config('app.support_email') }}
                                </a>
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color:#111827;padding:24px 40px;text-align:center;border-top:1px solid #222f53;">
                            <p style="margin:0 0 8px;font-size:12px;color:#4b5563;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                            <p style="margin:0;font-size:11px;color:#374151;">
                                {{-- {{ config('app.companyaddress') ?? 'Global Operations Hub' }} --}}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>