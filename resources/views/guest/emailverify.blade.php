<div style="font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #4CAF50; padding: 20px; text-align: center; color: white;">
            <h1 style="margin: 0; font-size: 24px;">Email Verification</h1>
        </div>
        <div style="padding: 20px;">
            <p style="margin: 0 0 15px;">Hello <strong>{{ $user->fname }}</strong>,</p>
            <p style="margin: 0 0 15px;">
                Thank you for registering with us. Please confirm your email address to complete the registration process.
            </p>
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $url }}" style="display: inline-block; padding: 12px 24px; font-size: 16px; color: white; background-color: #4CAF50; text-decoration: none; border-radius: 5px;">
                    Verify Email
                </a>
            </div>
            <p style="margin: 0 0 15px;">
                If you did not create an account, no further action is required.
            </p>
            <p style="margin: 0; color: #777;">
                Regards,<br>The Team
            </p>
        </div>
        <div style="background-color: #f1f1f1; padding: 10px 20px; text-align: center; font-size: 12px; color: #555;">
            <p style="margin: 0;">If you’re having trouble clicking the "Verify Email" button, copy and paste the URL below into your web browser:</p>
            <p style="margin: 5px 0;"><a href="{{ $url }}" style="color: #4CAF50; word-break: break-all;">{{ $url }}</a></p>
        </div>
    </div>
</div>