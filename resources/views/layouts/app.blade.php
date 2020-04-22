<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        :root {
            --primary-color: #5d8d5c;
            --error-color: #ce4f4f;
        }

        body {
            color: white;
            height: 100vh;
            display: flex;
            overflow: hidden;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            background-color: var(--primary-color);
            font-family: Arial, Helvetica, sans-serif;
        }

        input {
            padding: 0.3rem;
            margin-top: 0.2rem;
            border-radius: 5px;
            border: 1px solid #f5f5f5;
        }

        input:focus {
            border: 1px solid #e7e7e7;
        }

        button {
            color: white;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #f5f5f5;
            background-color: var(--primary-color);
        }

        .container {
            display: flex;
            padding: 1rem;
            color: black;
            min-width: 100%;
            border-radius: 5px;
            flex-direction: column;
            background-color: white;
        }

        .row {
            display: flex;
            padding: 0.2rem;
            flex-direction: column;
        }

        .forgot {
            margin-top: 1rem;
            text-align: center;
            text-decoration: none;
            color: var(--primary-color);
        }

        .error {
            padding: 0.3rem;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--error-color);
        }
    </style>
</head>

<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>