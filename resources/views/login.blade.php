<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Form</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        .login-container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
        <div class="login-container">
            <h2>Login</h2>
            <form action="{{route('loginSubmit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" />
                    @error('email')
                        <span class="text-danger" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" />
                    @error('password')
                        <span class="text-danger" style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>