<!doctype html>
<html lang="ms">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Portal Industri Pertahanan | Reset Password</title>

    <style>
        /* Keep only safe, non-critical CSS here. Inline styles below are the source of truth. */
        body {
            margin: 0;
            padding: 0;
            background: #f4f6f9;
        }

        table {
            border-collapse: collapse;
        }

        img {
            border: 0;
            display: block;
        }

        a {
            color: #1d4ed8;
            text-decoration: underline;
        }

        @media screen and (max-width:620px) {
            .container {
                width: 100% !important;
            }

            .px {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; background:#f4f6f9;">
    <center style="width:100%; background:#f4f6f9;">
        <table width="100%" role="presentation">
            <tr>
                <td align="center" style="padding:24px 12px;">

                    <table width="600" class="container" role="presentation"
                        style="width:600px; max-width:600px; background:#ffffff; border-radius:10px; overflow:hidden;">

                        <!-- Header -->
                        <tr>
                            <td class="px" style="padding:18px 24px;">
                                <table width="100%" role="presentation">
                                    <tr>
                                        <td>
                                            <!-- Reuse same header asset for consistency -->
                                            <img src="{{ $url }}/pip/assets/img/email/header.png" width="660" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- ===================== -->
                        <!-- BAHASA MALAYSIA BLOCK -->
                        <!-- ===================== -->
                        <tr>
                            <td class="px"
                                style="padding:24px; font-family:Arial,Helvetica,sans-serif; color:#111827;">
                                <div style="">
                                    <h2 style="margin:0 0 10px 0; font-size:22px; line-height:28px;">Tetapkan Semula
                                        Kata Laluan Anda</h2>

                                    <p style="margin:0 0 12px 0;">Salam sejahtera {{ $user->name }},</p>

                                    <p style="margin:0 0 12px 0;">
                                        Kami menerima permintaan untuk menetapkan semula kata laluan akaun anda.
                                        Jika anda yang membuat permintaan ini, sila klik pautan di bawah untuk mencipta
                                        kata laluan baharu:
                                    </p>

                                    <p style="margin:0 0 14px 0;">
                                        <strong>Pautan Tetapan Semula Kata Laluan:</strong><br />
                                        <a href="{{ $link }}" target="_blank">Link</a>
                                    </p>

                                    <p style="margin:0 0 12px 0;">
                                        Atas sebab keselamatan, pautan ini akan tamat tempoh dalam
                                        <strong>48 Hrs</strong>.
                                        Jika anda tidak membuat permintaan ini, sila abaikan e-mel ini atau hubungi
                                        pasukan sokongan kami dengan segera.
                                    </p>


                                    <p style="margin:0 0 12px 0;">Terima kasih.</p>
                                    <p style="margin:0; font-weight:700;">Pasukan Sokongan Portal Industri Pertahanan
                                        (PIP)</p>

                                    <p style="margin:12px 0 0 0;">
                                        <p> <img src="{{ $url }}/pip/assets/img/footer-logo-portal.png" /> </p>
                                    </p>
                                </div>
                            </td>
                        </tr>

                        <!-- ============== -->
                        <!-- ENGLISH BLOCK  -->
                        <!-- ============== -->
                        <tr>
                            <td class="px"
                                style="padding:24px; font-family:Arial,Helvetica,sans-serif; color:#111827;">
                                <div style="">
                                    <h2 style="margin:0 0 10px 0; font-size:22px; line-height:28px;">Reset Your Password
                                    </h2>

                                    <p style="margin:0 0 12px 0;">Greetings {{ $user->name }},</p>

                                    <p style="margin:0 0 12px 0;">
                                        We received a request to reset your account password.
                                        If you initiated this request, please click the link below to create a new
                                        password:
                                    </p>

                                    <p style="margin:0 0 14px 0;">
                                        <strong>Reset Password Link:</strong><br />
                                        <a href="{{ $link }}" target="_blank">Link</a>
                                    </p>

                                    <p style="margin:0 0 12px 0;">
                                        For security reasons, this link will expire in
                                        <strong>48 Hrs</strong>.
                                        If you did not request a password reset, please ignore this email or contact our
                                        team immediately.
                                    </p>


                                    <p style="margin:0 0 12px 0;">Thank you.</p>
                                    <p style="margin:0; font-weight:700;">Defence Industry Portal (PIP) Support Team</p>

                                    <p style="margin:12px 0 0 0;">
                                        <p> <img src="{{ $url }}/pip/assets/img/footer-logo-portal.png" /> </p>
                                    </p>
                                </div>
                            </td>
                        </tr>

                        <!-- Footer / Disclaimer -->
                        <tr>
                            <td class="px"
                                style="padding:16px 24px; font-family:Arial,Helvetica,sans-serif; font-size:11.5px; line-height:18px; color:#6b7280;">
                                <p style="margin:0 0 10px 0;">
                                    Emel ini dijana secara automatik oleh sistem Portal Industri Pertahanan (PIP). Sila
                                    jangan membalas emel ini.
                                    <br />
                                    This email is auto-generated by the Defence Industry Portal system. Please do not
                                    reply.
                                </p>

                                <p style="margin:0;">
                                    Rujukan / Reference ID: <strong
                                        style="color:#374151;">{{ WebTool::encode($user->id) }}</strong><br />
                                    Tarikh &amp; Masa / Date &amp; Time: <strong
                                        style="color:#374151;">{{ $user->created_at }}</strong>
                                </p>
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>
        </table>
    </center>
</body>

</html>
