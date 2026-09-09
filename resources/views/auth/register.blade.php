<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @livewireStyles
</head>
<body>

    <h1>Crear cuenta</h1>

    <form method="POST" action="/register">
        @csrf

        <div>
            <label for="name">Nombre</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
            >
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Correo electrónico</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input
                id="password"
                type="password"
                name="password"
                required
            >
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">
                Confirmar contraseña
            </label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
            >
        </div>

        <button type="submit">
            Registrarme
        </button>
    </form>

    <p>
        ¿Ya tienes una cuenta?
        <a href="/login">Iniciar sesión</a>
    </p>

    @livewireScripts
</body>
</html>