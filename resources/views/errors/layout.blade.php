<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Dualana') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <style>
        :root {
            --primary: #ff6268;
            --primary-glow: rgba(255, 98, 104, 0.4);
            --bg-start: #031427;
            --bg-end: #07223d;
            --card-bg: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.08);
            --text-main: #ffffff;
            --text-muted: #8fa7be;
            --blue-glow: rgba(7, 58, 114, 0.6);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--bg-start) 0%, var(--bg-end) 100%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            padding: 24px;
        }

        /* Ambient Glowing Background Blobs */
        .glowing-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 1;
            opacity: 0.5;
            animation: float-ambient 20s ease-in-out infinite alternate;
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background: var(--blue-glow);
            top: -100px;
            left: -100px;
        }

        .blob-2 {
            width: 500px;
            height: 500px;
            background: var(--primary-glow);
            bottom: -150px;
            right: -100px;
            animation-delay: -5s;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            background: rgba(12, 80, 139, 0.4);
            top: 40%;
            left: 60%;
            animation-delay: -10s;
        }

        @keyframes float-ambient {
            0% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(40px, -60px) scale(1.1);
            }
            100% {
                transform: translate(-20px, 30px) scale(0.95);
            }
        }

        /* Content Container */
        .error-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 540px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 48px 32px;
            text-align: center;
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.3), 
                        inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            animation: card-appear 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes card-appear {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Branding Logo */
        .logo-wrap {
            margin-bottom: 32px;
        }

        .logo-wrap img {
            height: 40px;
            margin: 0 auto;
            display: block;
            opacity: 0.95;
            transition: transform 0.3s ease;
        }

        .logo-wrap img:hover {
            transform: scale(1.05);
        }

        /* Icon styling */
        .icon-wrap {
            font-size: 80px;
            color: var(--primary);
            margin-bottom: 24px;
            display: inline-block;
            position: relative;
            filter: drop-shadow(0 0 15px var(--primary-glow));
        }

        .pulse-animation {
            animation: pulse-icon 2.5s ease-in-out infinite;
        }

        .float-animation {
            animation: float-icon 4s ease-in-out infinite;
        }

        .spin-animation {
            animation: spin-icon 12s linear infinite;
        }

        @keyframes pulse-icon {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 15px var(--primary-glow)); }
            50% { transform: scale(1.08); filter: drop-shadow(0 0 25px var(--primary)); }
        }

        @keyframes float-icon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes spin-icon {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Error Code */
        .error-code {
            font-size: 100px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #ffffff 30%, #a2bccc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -2px;
        }

        /* Titles and messages */
        .error-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        .error-message {
            font-size: 15px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 36px;
            font-weight: 400;
            padding: 0 16px;
        }

        /* Action Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 36px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ffffff;
            background: var(--primary);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 30px rgba(255, 98, 104, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 98, 104, 0.5);
            background: #ff787d;
        }

        .btn:hover::after {
            left: 100%;
        }

        .btn:active {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 98, 104, 0.4);
        }

        .btn-secondary {
            background: transparent;
            border: 1px solid var(--card-border);
            color: var(--text-muted);
            box-shadow: none;
            margin-top: 12px;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            box-shadow: none;
        }

        /* Footer Copyright in glass card */
        .error-footer {
            margin-top: 40px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.2);
            letter-spacing: 0.5px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        @media (max-width: 480px) {
            .error-container {
                padding: 36px 20px;
            }
            .error-code {
                font-size: 80px;
            }
            .error-title {
                font-size: 20px;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Ambient glowing backgrounds -->
    <div class="glowing-blob blob-1"></div>
    <div class="glowing-blob blob-2"></div>
    <div class="glowing-blob blob-3"></div>

    <div class="error-container">
        <!-- Brand logo -->
        <div class="logo-wrap">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/aset-logo.png') }}" alt="Dualana Logo">
            </a>
        </div>

        <!-- Custom Icon -->
        <div class="icon-wrap @yield('icon-animation', 'float-animation')">
            @yield('icon')
        </div>

        <!-- Error code -->
        <div class="error-code">@yield('code')</div>

        <!-- Error title -->
        <h1 class="error-title">@yield('title')</h1>

        <!-- Error description -->
        <p class="error-message">@yield('message')</p>

        <!-- CTAs -->
        <div class="actions">
            <a href="{{ url('/') }}" class="btn">
                <i class="fa-solid fa-house"></i> Back to Home
            </a>
        </div>

        <!-- Footer -->
        <div class="error-footer">
            &copy; {{ date('Y') }} Dualana Indonesia. All rights reserved.
        </div>
    </div>
</body>
</html>
