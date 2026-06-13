<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Get Started Request – Crowns IT</title>
</head>
<body style="margin:0;padding:0;background:#f0f0ee;font-family:'Outfit',Arial,sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background:#f0f0ee;padding:40px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,0.08);">

          <!-- Header -->
          <tr>
            <td style="background:linear-gradient(135deg,#22c55e 0%,#16a34a 100%);padding:40px 40px 30px;text-align:center;">
              <table cellpadding="0" cellspacing="0" style="margin:0 auto 16px;">
                <tr>
                  <td style="display:grid;grid-template-columns:1fr 1fr;gap:4px;line-height:1;">
                    <div style="display:inline-flex;gap:5px;">
                      <span style="display:inline-block;width:12px;height:12px;border-radius:4px;background:#f59e0b;"></span>
                      <span style="display:inline-block;width:18px;height:18px;border-radius:50% 50% 0 50%;background:#1d4ed8;"></span>
                    </div>
                  </td>
                </tr>
              </table>
              <h1 style="margin:0;color:#ffffff;font-size:26px;font-weight:800;letter-spacing:-0.5px;">Crowns IT</h1>
              <p style="margin:6px 0 0;color:rgba(255,255,255,0.85);font-size:14px;font-weight:500;">New Project Inquiry</p>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="padding:40px;">
              <h2 style="margin:0 0 8px;font-size:22px;font-weight:700;color:#1a2744;">🚀 New Get Started Request!</h2>
              <p style="margin:0 0 28px;color:#6b7280;font-size:15px;line-height:1.6;">
                Someone has submitted a request via the website. Here are the details:
              </p>

              <!-- Info Cards -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                <tr>
                  <td style="background:#f8faf9;border:1px solid rgba(34,197,94,0.15);border-radius:12px;padding:18px 20px;margin-bottom:12px;display:block;">
                    <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#22c55e;letter-spacing:1px;text-transform:uppercase;">Full Name</p>
                    <p style="margin:0;font-size:17px;font-weight:600;color:#1a2744;">{{ $senderName }}</p>
                  </td>
                </tr>
              </table>

              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                <tr>
                  <td style="background:#f8faf9;border:1px solid rgba(34,197,94,0.15);border-radius:12px;padding:18px 20px;">
                    <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#22c55e;letter-spacing:1px;text-transform:uppercase;">Interested Service</p>
                    <p style="margin:0;font-size:17px;font-weight:600;color:#1a2744;">{{ $selectedService }}</p>
                  </td>
                </tr>
              </table>

              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:32px;">
                <tr>
                  <td style="background:#f8faf9;border:1px solid rgba(34,197,94,0.15);border-radius:12px;padding:18px 20px;">
                    <p style="margin:0 0 8px;font-size:11px;font-weight:700;color:#22c55e;letter-spacing:1px;text-transform:uppercase;">Message</p>
                    <p style="margin:0;font-size:15px;color:#374151;line-height:1.75;white-space:pre-line;">{{ $senderMessage }}</p>
                  </td>
                </tr>
              </table>

              <!-- CTA -->
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
                    <a href="mailto:{{ config('mail.from.address') }}" style="display:inline-block;background:linear-gradient(135deg,#22c55e,#16a34a);color:#fff;text-decoration:none;padding:14px 36px;border-radius:50px;font-weight:700;font-size:15px;letter-spacing:0.3px;">
                      Reply to Client →
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#f8faf9;padding:24px 40px;border-top:1px solid rgba(0,0,0,0.06);text-align:center;">
              <p style="margin:0;font-size:13px;color:#9ca3af;">This email was automatically generated from the Crowns IT website.</p>
              <p style="margin:6px 0 0;font-size:13px;color:#9ca3af;">© {{ date('Y') }} Crowns IT. All rights reserved.</p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>
