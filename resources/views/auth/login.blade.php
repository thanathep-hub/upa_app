<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('auth/upa-icon-ll.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <title>เข้าสู่ระบบ - UPA</title>

    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            font-family: 'Sarabun', sans-serif;
            font-size: 15px;
            margin: 0;
            height: 100%;
            background: #eef1f8;
        }

        /* ── Page layout ── */
        .login-page {
            height: 100dvh;
            display: flex;
            overflow: hidden;
        }

        /* ── Form panel ── */
        .form-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            background:
                radial-gradient(ellipse 60% 50% at 15% 20%, rgba(33, 30, 83, 0.07) 0%, transparent 70%),
                radial-gradient(ellipse 50% 40% at 85% 80%, rgba(99, 102, 241, 0.06) 0%, transparent 65%),
                linear-gradient(135deg, #eaecf8 0%, #eef1f8 50%, #e8edf5 100%);
        }

        /* Grid overlay */
        .form-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(33, 30, 83, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(33, 30, 83, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .login-card {
            position: relative;
            z-index: 1;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(33, 30, 83, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 440px;
        }

        .login-card-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
        }

        .login-card-sub {
            font-size: 0.9375rem;
            color: #64748b;
            margin-top: 0.375rem;
        }

        /* ── Form controls ── */
        .form-label-custom {
            font-size: 0.8125rem;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.875rem;
            pointer-events: none;
        }

        .form-control-custom {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            font-family: 'Sarabun', sans-serif;
            font-size: 0.9375rem;
            font-weight: 400;
            color: #0f172a;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        .form-control-custom::placeholder {
            color: #cbd5e1;
            font-weight: 400;
        }

        .form-control-custom:focus {
            border-color: #211e53;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(33, 30, 83, 0.08);
        }

        /* ── Error alert ── */
        .error-alert {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.8125rem;
            color: #dc2626;
            font-weight: 500;
        }

        /* ── Submit button ── */
        .btn-login {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            background-color: #211e53;
            border: none;
            border-radius: 10px;
            padding: 0.9375rem 1rem;
            color: #ffffff;
            font-family: 'Sarabun', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, box-shadow 0.15s, transform 0.1s;
            box-shadow: 0 4px 14px rgba(33, 30, 83, 0.25);
        }

        .btn-login:hover {
            background-color: #1a1840;
            box-shadow: 0 6px 20px rgba(33, 30, 83, 0.32);
        }

        .btn-login:active {
            transform: scale(0.99);
        }

        .btn-login:disabled {
            opacity: 0.75;
            cursor: not-allowed;
            transform: none;
        }

        /* ── Spinner ── */
        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            flex-shrink: 0;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* ── Redirect modal ── */
        .redirect-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }

        .redirect-overlay.show {
            display: flex;
        }

        .redirect-modal {
            background: #ffffff;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            max-width: 340px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 60px rgba(33, 30, 83, 0.18);
            animation: modalIn 0.25s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.92) translateY(8px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .redirect-modal .modal-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid rgba(33, 30, 83, 0.12);
            border-top-color: #211e53;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 0 auto 1.25rem;
        }

        .redirect-modal .modal-title {
            font-size: 1.0625rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.375rem;
        }

        .redirect-modal .modal-sub {
            font-size: 0.875rem;
            color: #64748b;
        }

        /* ── Helper link ── */
        .help-link {
            font-size: 0.9rem;
            color: #94a3b8;
            text-decoration: none;
        }

        .help-link:hover {
            color: #211e53;
        }
    </style>
</head>

<body>
    <div class="login-page">

        <div class="form-panel">
            <div class="login-card">

                {{-- Header --}}
                <div class="mb-4 text-center">
                    <div class="login-card-title">UPA</div>
                    <div class="login-card-sub">เข้าสู่ระบบด้วยรหัส ERP ของคุณ</div>
                </div>

                {{-- Error message --}}
                @if ($errors->any())
                    <div class="error-alert mb-4">
                        {{ $errors->first('msg') }}
                    </div>
                @endif

                <form method="POST" action="/login" id="login-form">
                    @csrf

                    {{-- Username --}}
                    <div class="mb-3">
                        <label class="form-label-custom" for="user">ชื่อผู้ใช้หรือเลขบัตรประชาชน</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" id="user" name="username" class="form-control-custom"
                                placeholder="ชื่อผู้ใช้หรือเลขบัตรประชาชน" autocomplete="username" required>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label class="form-label-custom" for="password">รหัสผ่านหรือเบอร์โทรศัพท์</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" class="form-control-custom"
                                placeholder="••••••••" autocomplete="current-password" required>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-login mb-4" id="btn-login">
                        <span id="btn-text">เข้าสู่ระบบ</span>
                        <span id="btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                        <span id="btn-spinner" class="spinner" style="display:none;"></span>
                    </button>

                    {{-- Help --}}
                    <div class="text-center">
                        <a href="#" class="help-link">หากพบปัญหาติดต่อฝ่ายไอที</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

    {{-- Redirect modal --}}
    <div class="redirect-overlay" id="redirect-overlay">
        <div class="redirect-modal">
            <div class="modal-spinner"></div>
            <div class="modal-title">กำลังเข้าสู่ระบบ…</div>
            <div class="modal-sub">กรุณารอสักครู่ ระบบกำลังพาคุณไปยังหน้าถัดไป</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('login-form').addEventListener('submit', function() {
            const btn = document.getElementById('btn-login');
            const text = document.getElementById('btn-text');
            const icon = document.getElementById('btn-icon');
            const spinner = document.getElementById('btn-spinner');

            // Button loading state
            btn.disabled = true;
            text.textContent = 'กำลังเข้าสู่ระบบ…';
            icon.style.display = 'none';
            spinner.style.display = 'inline-block';

            // Show redirect modal after short delay
            setTimeout(function() {
                document.getElementById('redirect-overlay').classList.add('show');
            }, 400);
        });
    </script>
</body>

</html>
