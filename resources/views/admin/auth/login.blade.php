<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin - Panel Administrasi PPID</title>
    <link rel="stylesheet" href="{{ asset('css/instansi.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 440px;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }
        .login-card-header {
            background-color: #1e3a8a;
            color: white;
            padding: 2rem 1.75rem;
            text-align: center;
            border-bottom: 3px solid #d97706;
        }
        .login-card-body {
            padding: 2rem 1.75rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-card-header">
            <div style="display: inline-flex; width: 48px; height: 48px; background: white; color: #1e3a8a; border-radius: 50%; align-items: center; justify-content: center; font-size: 1.4rem; font-weight: 800; margin-bottom: 0.75rem;">
                🔒
            </div>
            <h1 style="font-size: 1.3rem; font-weight: 700; margin-bottom: 0.25rem;">Panel Administrasi PPID</h1>
            <p style="font-size: 0.825rem; color: #cbd5e1;">Portal Resmi Instansi Pemerintah &bull; Paket Silver</p>
        </div>

        <div class="login-card-body">
            @if(session('info'))
                <div class="alert alert-info" style="font-size: 0.85rem; padding: 0.75rem 1rem;">
                    {{ session('info') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" style="font-size: 0.85rem; padding: 0.75rem 1rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email Administrator</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="contoh: admin@instansi.go.id">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan kata sandi">
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem; margin-top: 1rem;">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember" style="font-size: 0.875rem; color: var(--gov-text-muted); cursor: pointer;">Ingat sesi saya di peramban ini</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 0.5rem;" id="btn-submit-login">
                    Masuk ke Panel Admin &rarr;
                </button>
            </form>

            <div style="margin-top: 1.75rem; text-align: center; border-top: 1px solid #e2e8f0; padding-top: 1.25rem;">
                <a href="{{ route('home') }}" style="color: var(--gov-text-muted); text-decoration: none; font-size: 0.875rem;">
                    &larr; Kembali ke Beranda Situs
                </a>
            </div>
        </div>
    </div>

</body>
</html>
