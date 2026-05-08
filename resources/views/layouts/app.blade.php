<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('auth/upa-icon-ll.png') }}">
    <title>@yield('title') — UPA</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/ce56e0f8fa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <!-- Bootstrap 5 -->
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
            font-family: 'Inter', 'Noto Sans Thai', sans-serif;
            font-size: 14px;
            font-weight: 400;
            margin: 0;
            height: 100%;
            background-color: #f8fafc;
            color: #0f172a;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        /* ── App shell ── */
        .app-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            min-width: 0;
        }

        /* ── Topbar ── */
        .topbar {
            height: 56px;
            background: #211e53;
            border-bottom: none;
            display: flex;
            align-items: center;
            padding: 0 1.25rem;
            gap: 0.75rem;
            flex-shrink: 0;
            z-index: 40;
        }

        .toggler-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            color: rgba(255, 255, 255, 0.7);
            transition: background 0.15s, color 0.15s;
            flex-shrink: 0;
        }

        .toggler-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .toggler-btn i {
            font-size: 1.2rem;
        }

        .topbar-title {
            font-size: 0.9375rem;
            font-weight: 700;
            color: #ffffff;
            flex: 1;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 0.625rem;
        }

        .topbar-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .topbar-user-name {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.2;
        }

        .topbar-user-role {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.2;
        }

        /* ── Main content area ── */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
            background: #f8fafc;
        }
    </style>
    @stack('style')

</head>

<body>
    <div class="app-wrapper">
        @include('layouts.sidebar')

        <div class="main-wrapper">
            <!-- Topbar -->
            <header class="topbar">
                <button class="toggler-btn" type="button" aria-label="Toggle sidebar">
                    <i class="lni lni-text-align-left"></i>
                </button>
                {{-- @yield('title') --}}
                <span class="topbar-title"></span>

                @if (session('user'))
                    <div class="topbar-user">
                        <div class="topbar-avatar">
                            <i class="fa-solid fa-user" style="font-size:13px;"></i>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="topbar-user-name">
                                {{ session('username') ?? (session('username') ?? 'User') }}</div>
                            <div class="topbar-user-role">{{ session('user')->PsNameS }}</div>
                        </div>
                    </div>
                @endif
            </header>

            <!-- Page content -->
            <main class="main-content">
                <div class="container-fluid px-0">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('script')
</body>

</html>
