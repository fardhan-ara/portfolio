<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .info-row { margin: 15px 0; padding: 10px; background: white; border-radius: 5px; }
        .label { font-weight: bold; color: #667eea; }
        .message-box { background: white; padding: 20px; border-left: 4px solid #667eea; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📧 New Contact Form Submission</h2>
        </div>
        <div class="content">
            <p>You have received a new message from your portfolio website:</p>
            
            <div class="info-row">
                <span class="label">Name:</span> {{ $contact->name }}
            </div>
            
            <div class="info-row">
                <span class="label">Email:</span> {{ $contact->email }}
            </div>
            
            @if($contact->subject)
            <div class="info-row">
                <span class="label">Subject:</span> {{ $contact->subject }}
            </div>
            @endif
            
            <div class="message-box">
                <span class="label">Message:</span>
                <p>{{ $contact->message }}</p>
            </div>
            
            <p style="margin-top: 30px; color: #666; font-size: 14px;">
                Submitted at: {{ $contact->created_at->format('d M Y, H:i') }}
            </p>
        </div>
    </div>
</body>
</html>
