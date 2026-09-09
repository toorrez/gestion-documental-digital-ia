<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    @livewireStyles
</head>
<body>

    <h1>Iniciar sesión</h1>

    <form method="POST" action="/login">
        @csrf

        <div>
            <label for="email">Correo electrónico</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
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

        <label>
            <input type="checkbox" name="remember">
            Recordarme
        </label>

        <button type="submit">
            Iniciar sesión
        </button>
    </form>

    <p>
        <a href="/register">Crear una cuenta</a>
    </p>

    @livewireScripts
</body>
</html>