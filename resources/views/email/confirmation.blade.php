<!doctype html>
<html lang="ms">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Portal Industri Pertahanan | Account Registration</title>

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
                                            {{-- https://portal.reverent-saha.203-142-6-111.plesk.page --}}
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
                                <!-- Inline display toggle (email-safe) -->
                                <div style="">
                                    <h2 style="margin:0 0 10px 0; font-size:22px; line-height:28px;">Pendaftaran Akaun
                                        Berjaya</h2>

                                    <p style="margin:0 0 12px 0;">Salam sejahtera {{ $user->name }},</p>

                                    <p style="margin:0 0 12px 0;">
                                        Kami ingin memaklumkan bahawa akaun anda di
                                        <strong>Portal Industri Pertahanan</strong> telah berjaya diwujudkan.
                                    </p>

                                    <p style="margin:0 0 10px 0;">Butiran log masuk anda adalah seperti berikut:</p>

                                    <ul style="margin:0 0 12px 22px; padding:0;">
                                        <li style="margin:0 0 6px 0;">Nama Pengguna: {{ $user->email }}</li>
                                        <li style="margin:0 0 6px 0;">Kata Laluan: Kata laluan yang anda tetapkan semasa
                                            pra-pendaftaran</li>
                                    </ul>

                                    <p style="margin:0 0 12px 0;">
                                        <strong>Pautan Aktifkan Akaun:</strong><br />
                                        <a
                                            href="{{ $url }}/pip/accunt/active/{{ WebTool::enc($user->id, 3) }}">Pautan
                                            Activate Akaun Anda</a>
                                    </p>

                                    <p style="margin:0 0 12px 0;">
                                        <strong>Pautan Log Masuk:</strong><br />
                                        <a href="{{ $url }}/login">Pautan Log Masuk</a>
                                    </p>

                                    <p style="margin:0 0 10px 0;">Sekiranya anda menghadapi sebarang masalah, sila
                                        hubungi kami</p>

                                    <p style="margin:0 0 12px 0;">Sekian, terima kasih.</p>
                                    <p style="margin:0; font-weight:700;">Bahagian Industri Pertahanan (BIP)</p>
                                    <p> <img src="{{ $url }}/pip/assets/img/footer-logo-portal.png" /> </p>
                                </div>
                            </td>
                        </tr>

                        <!-- ============== -->
                        <!-- ENGLISH BLOCK  -->
                        <!-- ============== -->
                        <tr>
                            <td class="px"
                                style="padding:24px; font-family:Arial,Helvetica,sans-serif; color:#111827;">
                                <!-- Inline display toggle (email-safe) -->
                                <div style="">
                                    <h2 style="margin:0 0 10px 0; font-size:22px; line-height:28px;">Account
                                        Registration Successful</h2>

                                    <p style="margin:0 0 12px 0;">Greetings {{ $user->name }},</p>

                                    <p style="margin:0 0 12px 0;">
                                        We are pleased to inform you that your account on the
                                        <strong>Defence Industry Portal</strong> has been successfully created.
                                    </p>

                                    <p style="margin:0 0 10px 0;">Your login details are as follows:</p>

                                    <ul style="margin:0 0 12px 22px; padding:0;">
                                        <li style="margin:0 0 6px 0;">Username: {{ $user->email }}</li>
                                        <li style="margin:0 0 6px 0;">Password: The password you set during
                                            pre-registration</li>
                                    </ul>

                                    <p style="margin:0 0 12px 0;">
                                        <strong>Account Activation Link:</strong><br />
                                        <a
                                            href="{{ $url }}/pip/accunt/active/{{ WebTool::enc($user->id, 3) }}">Account
                                            Activation Link</a>
                                    </p>

                                    <p style="margin:0 0 12px 0;">
                                        <strong>Login Link:</strong><br />
                                        <a href="{{ $url }}/login">Login Link</a>
                                    </p>

                                    <p style="margin:0 0 10px 0;">If you encounter any issues, please contact us.</p>



                                    <p style="margin:0 0 12px 0;">Thank you.</p>
                                    <p style="margin:0; font-weight:700;">Defence Industry Division (DID)</p>
                                    <p> <img src="{{ $url }}/pip/assets/img/footer-logo-portal.png" /> </p>
                                </div>
                            </td>
                        </tr>

                        <!-- Footer / Disclaimer (bilingual-safe, or duplicate similarly if needed) -->
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
                                        style="color:#374151;">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</strong>
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
