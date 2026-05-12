@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-orange: #E87722;
        --primary-navy: #1a2a4a;
        --dark-bg: #0f172a;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: var(--dark-bg);
        font-family: 'Nunito', sans-serif;
    }

    #app {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at top right, rgba(232, 119, 34, 0.15), transparent 40%),
                    radial-gradient(circle at bottom left, rgba(26, 42, 74, 0.4), transparent 40%),
                    var(--dark-bg);
        position: relative;
        overflow: hidden;
    }

    /* Decorative background elements */
    .bg-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        z-index: 0;
    }
    
    .shape-1 {
        width: 300px;
        height: 300px;
        background: var(--primary-orange);
        opacity: 0.15;
        top: -100px;
        right: -100px;
        animation: float 8s ease-in-out infinite;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: var(--primary-navy);
        opacity: 0.3;
        bottom: -150px;
        left: -100px;
        animation: float 10s ease-in-out infinite reverse;
    }

    @keyframes float {
        0% { transform: translateY(0) scale(1); }
        50% { transform: translateY(20px) scale(1.05); }
        100% { transform: translateY(0) scale(1); }
    }

    /* Main Container */
    .login-container {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 1000px;
        display: flex;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        margin: 0 20px;
    }

    .login-image-section {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-navy), #0f172a);
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        position: relative;
        overflow: hidden;
    }

    .login-image-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        opacity: 0.5;
    }

    .brand-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .brand-title span {
        color: var(--primary-orange);
    }

    .brand-subtitle {
        color: #94a3b8;
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
        line-height: 1.6;
    }

    .login-form-section {
        flex: 1;
        padding: 50px;
        background: rgba(15, 23, 42, 0.6);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-header {
        margin-bottom: 30px;
        text-align: center;
    }

    .login-header img {
        max-height: 80px;
        margin-bottom: 20px;
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
    }

    .login-header h3 {
        color: white;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .login-header p {
        color: #94a3b8;
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        color: #e2e8f0;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        font-size: 0.9rem;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        padding: 12px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.05) !important;
        border-color: var(--primary-orange) !important;
        box-shadow: 0 0 0 3px rgba(232, 119, 34, 0.2) !important;
    }

    .btn-login {
        background: var(--primary-orange);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 700;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-login:hover {
        background: #cf6619;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -10px rgba(232, 119, 34, 0.6);
    }

    .form-check-label {
        color: #94a3b8;
        font-size: 0.9rem;
        user-select: none;
        cursor: pointer;
    }

    .form-check-input {
        background-color: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.2);
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: var(--primary-orange);
        border-color: var(--primary-orange);
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            margin: 20px;
        }
        .login-image-section {
            padding: 30px;
            text-align: center;
            align-items: center;
        }
        .login-form-section {
            padding: 30px;
        }
    }
</style>

<?php
$genSetting = \App\Models\Setting::first();
?>

<div class="shape-1 bg-shape"></div>
<div class="shape-2 bg-shape"></div>

<div class="login-container">
    <div class="login-image-section">
        <h1 class="brand-title">Eshan <span>Buildwell</span></h1>
        <p class="brand-subtitle">Access the administrative dashboard to manage your construction projects, services, BIM training, and website content effortlessly.</p>
    </div>

    <div class="login-form-section">
        <div class="login-header">
            @if(isset($genSetting['logo']))
                <img src="{{ url('storage/' . $genSetting['logo']) }}" alt="Eshan Buildwell Logo">
            @else
                <h3 style="color: var(--primary-orange)">EBW</h3>
            @endif
            <h3>Admin Portal</h3>
            <p>Please sign in to continue</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Username or Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your username">

                @error('email')
                <span class="invalid-feedback" role="alert" style="display: block; margin-top: 5px; color: #ef4444;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                @error('password')
                <span class="invalid-feedback" role="alert" style="display: block; margin-top: 5px; color: #ef4444;">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-login">
                {{ __('Sign In') }}
            </button>
        </form>
    </div>
</div>
@endsection