<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot Verification reCAPTCHA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

    <style>
        body {
        height: 100%;
        }
        .panel {
        padding: 30px;
        max-width: 425px;
        margin: 10% auto;
        box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.2);
        }
        .title {
        font-size: 1.5em;
        font-weight: 100;
        margin-top: 10px;
        text-align: center;
        }
        .recaptcha-center {
        margin-top: 35px;
        margin-bottom: 20px;
        margin-left: 13%;
        margin-right: 13%;
        display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel">
        <h3 class="title">Verifying that you are not a robot...</h3>
        <div id="recaptcha-container"></div>
        <div id="recaptcha-message"></div>
    </div>
</div>
    
<script>
    var onloadCallback = function() {
        grecaptcha.render('recaptcha-container', {
            'sitekey' : '<?php echo $recaptcha_site_key; ?>',
            'callback' : verifyCallback
        });
    };

    var verifyCallback = function(response) {
        $.ajax({
            url: '<?php echo base_url('captcha/validate_recaptcha'); ?>',
            type: 'POST',
            data: {
                'g-recaptcha-response': response
            },
            success: function(data) {
                var result = JSON.parse(data);
                if(result.success) {
                    window.location.href = '<?php echo base_url('home'); ?>';
                } else {
                    $('#recaptcha-message').html(result.message).css('color', 'red');
                }
            }
        });
    };
</script>
    

</body>
</html>
