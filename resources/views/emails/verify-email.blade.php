<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email — {{ config('app.name') }}</title>
</head>

<body style="margin:0;padding:0;background-color:#0d1117;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0d1117;padding:40px 20px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="max-width:600px;width:100%;background-color:#1a2238;border-radius:16px;border:1px solid #222f53;overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td
                            style="background-color:#111827;padding:32px 40px;text-align:center;border-bottom:1px solid #222f53;">
                            <img src="{{ asset('assets/images/rel-icon.png', true) }}" alt="{{ config('app.name') }}"
                                style="height:48px; width:auto; display:block;" height="48">
                            <p
                                style="margin:10px 0 0;font-size:20px;font-weight:700;color:#ffffff;letter-spacing:0.5px;">
                                {{ ucfirst(config('app.name')) }}
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:48px 40px;text-align:center;">

                            <!-- Icon -->
                            <div
                                style="display:inline-block;background-color:#eac46e20;border:1px solid #eac46e40;border-radius:50%;padding:16px;margin-bottom:24px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png" alt="verify"
                                    style="width:40px;height:40px;filter:invert(1) sepia(1) saturate(3) hue-rotate(5deg);">
                            </div>

                            <h1 style="margin:0 0 12px;font-size:28px;font-weight:800;color:#ffffff;">
                                Verify Your Email Address
                            </h1>

                            <p style="margin:0 0 32px;font-size:15px;color:#9ca3af;line-height:1.6;">
                                Thanks for signing up. Before getting started, please verify your email address by
                                clicking the button below.
                            </p>

                            <!-- Button -->
                            <a href="{{ $url }}" style="display:inline-block;background-color:#eac46e;color:#111827;font-weight:700;
                           padding:14px 28px;border-radius:12px;text-decoration:none;font-size:14px;">
                                Verify Email Address
                            </a>

                            <p style="margin:32px 0 0;font-size:13px;color:#6b7280;line-height:1.6;">
                                If you did not create an account, no further action is required.
                            </p>

                            <!-- Fallback link -->
                            <p style="margin:20px 0 0;font-size:12px;color:#4b5563;word-break:break-all;">
                                If the button doesn’t work, copy and paste this link:<br>
                                <a href="{{ $url }}" style="color:#eac46e;">
                                    {{ $url }}
                                </a>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color:#111827;padding:24px 40px;text-align:center;border-top:1px solid #222f53;">
                            <p style="margin:0;font-size:12px;color:#4b5563;">
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