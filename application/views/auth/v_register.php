<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Nine Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1f2e 0%, #2d1f3f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: #1a1f2e;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-section h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .logo-section p {
            color: #a0a4b8;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: #a0a4b8;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0a4b8;
            font-size: 16px;
            z-index: 1;
        }

        .form-control {
            background: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            padding: 12px 15px 12px 45px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: #0f172a;
            border-color: #800000;
            color: #fff;
            box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.1);
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0a4b8;
            cursor: pointer;
            font-size: 16px;
            z-index: 1;
        }

        .password-toggle:hover {
            color: #800000;
        }

        .btn-signup {
            width: 100%;
            background: #800000;
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 14px;
            font-size: 15px;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-signup:hover {
            background: #660000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #a0a4b8;
            font-size: 14px;
        }

        .login-link a {
            color: #800000;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            border: none;
            font-size: 14px;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
        }

        .alert i {
            margin-right: 8px;
        }

        .fade-out {
            animation: fadeOut 0.35s ease-out forwards;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <img src="<?= base_url('public/assets/images/logo.png') ?>" alt="Nine Store" style="height: 60px; width: auto; margin-bottom: 15px;">
                <h2 style="color: #fff; font-size: 28px; font-weight: 700; margin-bottom: 10px;">Nine Store</h2>
                <p>Buat akun baru untuk mengakses dashboard</p>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/simpan_register') ?>" method="post" id="signupForm">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-circle input-icon"></i>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required autocomplete="name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" required autocomplete="username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required autocomplete="new-password" style="padding-right: 45px;">
                        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                    </div>
                </div>

                <button type="submit" class="btn-signup">Daftar Akun</button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            if (passwordInput && togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    togglePassword.classList.toggle('fa-eye');
                    togglePassword.classList.toggle('fa-eye-slash');
                });
            }

            // Auto hide alerts
            document.querySelectorAll('.alert').forEach(function(alertElement) {
                setTimeout(function() {
                    alertElement.classList.add('fade-out');
                    setTimeout(function() {
                        alertElement.remove();
                    }, 350);
                }, 3000);
            });
        });
    </script>
</body>
</html>
