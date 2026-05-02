<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code — {{ config('app.name') }}</title>
</head>

<body style="margin:0;padding:0;background-color:#0d1117;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0d1117;padding:40px 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="max-width:600px;width:100%;background-color:#1a2238;border-radius:16px;border:1px solid #222f53;overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td
                            style="background-color:#111827;padding:32px 40px;text-align:center;border-bottom:1px solid #222f53;">
                            <img src="{{ url('assets/images/rel-icon.png') }}" alt="{{ config('app.name') }}"
                                style="height:48px; width:auto; display:block;" height="48">
                            <p
                                style="margin:10px 0 0;font-size:20px;font-weight:700;color:#ffffff;letter-spacing:0.5px;">
                                {{ ucfirst(config('app.name')) }}
                            </p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:48px 40px;text-align:center;">

                            <div
                                style="display:inline-block;background-color:#eac46e20;border:1px solid #eac46e40;border-radius:50%;padding:16px;margin-bottom:24px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="shield"
                                    style="width:40px;height:40px;filter:invert(1) sepia(1) saturate(3) hue-rotate(5deg);">
                            </div>

                            <h1
                                style="margin:0 0 12px;font-size:28px;font-weight:800;color:#ffffff;letter-spacing:-0.5px;">
                                Token Verification
                            </h1>
                            <p style="margin:0 0 36px;font-size:15px;color:#9ca3af;line-height:1.6;">
                                Use the code below as your token verification code. It expires in <strong
                                    style="color:#eac46e;">10 minutes</strong>.
                            </p>

                            {{-- Code Box --}}
                            <div
                                style="background-color:#111827;border:1px solid #222f53;border-radius:12px;padding:28px 40px;margin:0 auto 36px;display:inline-block;">
                                <p
                                    style="margin:0 0 8px;font-size:11px;letter-spacing:2px;text-transform:uppercase;color:#6b7280;">
                                    Your Code</p>
                                <p
                                    style="margin:0;font-size:52px;font-weight:900;letter-spacing:16px;color:#eac46e;font-family:'Courier New',monospace;">
                                    {{ $code }}
                                </p>
                            </div>

                            <p style="margin:0;font-size:13px;color:#6b7280;line-height:1.6;">
                                If you didn't request this code, you can safely ignore this email.<br>
                                Someone may have entered your email address by mistake.
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td
                            style="background-color:#111827;padding:24px 40px;text-align:center;border-top:1px solid #222f53;">
                            <p style="margin:0 0 8px;font-size:12px;color:#4b5563;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                            <p style="margin:0;font-size:11px;color:#374151;">
                                {{-- {{ config('app.company_address') ?? 'Global Operations Hub' }} --}}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>