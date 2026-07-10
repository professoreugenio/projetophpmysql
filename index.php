<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login - Sistema de Controle de Estoque</title>
    <meta name="description" content="Acesse a plataforma de gerenciamento e controle de estoque. Entre com suas credenciais de administrador.">
    <meta name="keywords" content="estoque, login, gestão, controle de estoque, painel administrativo">
    <meta name="author" content="Desenvolvedor Front-end Especialista">
    
    <meta name="theme-color" content="#4f46e5">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2875/2875878.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --brand-color: #4f46e5;
            --brand-hover: #4338ca;
            --bg-gradient-light: linear-gradient(135deg, #f0fdf4 0%, #e0e7ff 100%);
            --bg-gradient-dark: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: var(--bg-gradient-light);
            transition: background 0.3s ease;
        }

        [data-bs-theme="dark"] body {
            background: var(--bg-gradient-dark);
        }

        .login-page {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background-color: var(--bs-body-bg);
            border: 1px solid var(--bs-border-color-translucent);
            border-radius: 1.25rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            padding: 2.5rem 2.25rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .login-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .brand-logo-icon {
            width: 48px;
            height: 48px;
            background-color: rgba(79, 70, 229, 0.1);
            color: var(--brand-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            font-size: 1.75rem;
            margin: 0 auto 1.25rem;
        }

        .btn-brand {
            background-color: var(--brand-color);
            color: #ffffff;
            font-weight: 500;
            padding: 0.75rem 1rem;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-brand:hover, .btn-brand:focus {
            background-color: var(--brand-hover);
            color: #ffffff;
        }

        .form-control:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.15);
        }

        .input-group-text {
            background-color: var(--bs-tertiary-bg);
        }

        /* Float Theme Switcher Button */
        .theme-toggle-btn {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1050;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        footer {
            padding: 1.5rem;
            text-align: center;
            background-color: var(--bs-body-bg);
            border-top: 1px solid var(--bs-border-color);
            font-size: 0.875rem;
            color: var(--bs-secondary-color);
        }
    </style>
</head>
<body>

    <button class="btn btn-light theme-toggle-btn" id="themeToggle" type="button" aria-label="Alternar entre tema claro e escuro">
        <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
    </button>

    <main class="login-page">
        <section class="login-container">
            <article class="login-card">
                
                <div class="text-center mb-4">
                    <div class="brand-logo-icon" aria-hidden="true">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <h1 class="h3 fw-bold mb-1 text-body">EstoquePRO</h1>
                    <p class="text-secondary small">Painel de Controle e Abastecimento</p>
                </div>

                <form id="loginForm" class="needs-validation" novalidate autocomplete="on">
                    
                    <div class="mb-3">
                        <label for="username" class="form-label small fw-medium">E-mail ou Usuário</label>
                        <div class="input-group">
                            <span class="input-group-text" id="user-addon"><i class="bi bi-person text-secondary"></i></span>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="username" 
                                name="username"
                                required 
                                placeholder="exemplo@estoquepro.com"
                                aria-describedby="user-addon feedback-username"
                                autocomplete="username"
                            >
                            <div class="invalid-feedback" id="feedback-username">
                                Por favor, insira um e-mail corporativo válido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="password" class="form-label small fw-medium mb-0">Senha</label>
                            <a href="#" class="text-decoration-none small text-primary" tabindex="0">Esqueceu a senha?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text" id="pass-addon"><i class="bi bi-lock text-secondary"></i></span>
                            <input 
                                type="password" 
                                class="form-control text-truncate" 
                                id="password" 
                                name="password"
                                required 
                                placeholder="Digite sua senha de acesso"
                                aria-describedby="pass-addon feedback-password"
                                autocomplete="current-password"
                            >
                            <button 
                                class="btn btn-outline-secondary" 
                                type="button" 
                                id="togglePasswordVisibility"
                                aria-label="Exibir senha em texto puro"
                            >
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                            <div class="invalid-feedback" id="feedback-password">
                                A senha deve conter os caracteres de autenticação.
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label small text-secondary" for="rememberMe">Manter-me conectado neste dispositivo</label>
                    </div>

                    <div class="alert alert-danger d-none small p-2" id="authErrorAlert" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Credenciais incorretas ou sem permissão de acesso.
                    </div>

                    <button type="submit" class="btn btn-brand w-100 rounded-3 d-flex align-items-center justify-content-center gap-2" id="submitBtn">
                        <span>Acessar Painel</span>
                        <i class="bi bi-arrow-right-short fs-5"></i>
                    </button>
                </form>

            </article>
        </section>
    </main>

    <footer>
        <div class="container">
            <p class="mb-1 fw-medium">&copy; 2026 EstoquePRO — Sistema Modular Integrado.</p>
            <p class="mb-0 text-muted small">Versão estável v5.4.12. Construído com padrões de acessibilidade W3C/WCAG.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            'use strict';

            // DOM Selectors
            const loginForm = document.getElementById('loginForm');
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const htmlElement = document.documentElement;
            const togglePasswordBtn = document.getElementById('togglePasswordVisibility');
            const passwordInput = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');
            const authErrorAlert = document.getElementById('authErrorAlert');
            const submitBtn = document.getElementById('submitBtn');

            /**
             * 1. Controle Avançado do Mecanismo de Tema (Light/Dark)
             */
            const currentSavedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-bs-theme', currentSavedTheme);
            updateThemeUI(currentSavedTheme);

            themeToggle.addEventListener('click', () => {
                const targetTheme = htmlElement.getAttribute('data-bs-theme') === 'light' ? 'dark' : 'light';
                htmlElement.setAttribute('data-bs-theme', targetTheme);
                localStorage.setItem('theme', targetTheme);
                updateThemeUI(targetTheme);
            });

            function updateThemeUI(theme) {
                if (theme === 'dark') {
                    themeIcon.className = 'bi bi-sun-fill';
                    themeToggle.className = 'btn btn-dark theme-toggle-btn';
                } else {
                    themeIcon.className = 'bi bi-moon-stars-fill';
                    themeToggle.className = 'btn btn-light theme-toggle-btn';
                }
            }

            /**
             * 2. Toggle de Visibilidade da Senha (Acessibilidade Mantida)
             */
            togglePasswordBtn.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                
                // Mudança dinâmica de ícones
                togglePasswordIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
                
                // Atualização de rótulo para Leitores de Tela (Screen Readers)
                togglePasswordBtn.setAttribute('aria-label', isPassword ? 'Ocultar senha em formato de texto' : 'Exibir senha em texto puro');
            });

            /**
             * 3. Validação do Formulário do Bootstrap Interativo com Simulação de Envio
             */
            loginForm.addEventListener('submit', (event) => {
                event.preventDefault();
                authErrorAlert.classList.add('d-none'); // Oculta alertas prévios

                // Se falhar na validação nativa do HTML5
                if (!loginForm.checkValidity()) {
                    event.stopPropagation();
                    loginForm.classList.add('was-validated');
                    return;
                }

                // Efeito visual de carregamento (UX / Loading feedback)
                setSubmittingState(true);

                // Mock de Autenticação (Simulação assíncrona)
                setTimeout(() => {
                    const email = document.getElementById('username').value;
                    const pass = passwordInput.value;

                    // Mock básico de validação de credenciais
                    if(email === "admin@estoquepro.com" && pass === "123456") {
                        // Sucesso: Redireciona para o painel principal criado anteriormente
                        window.location.href = 'index.html'; 
                    } else {
                        // Falha: Mostra erro e limpa os campos para segurança do usuário
                        setSubmittingState(false);
                        authErrorAlert.classList.remove('d-none');
                        passwordInput.value = '';
                        loginForm.classList.remove('was-validated');
                    }
                }, 1000);
            });

            function setSubmittingState(isLoading) {
                if (isLoading) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span>Autenticando...</span>
                    `;
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `
                        <span>Acessar Painel</span>
                        <i class="bi bi-arrow-right-short fs-5"></i>
                    `;
                }
            }
        });
    </script>
</body>
</html>