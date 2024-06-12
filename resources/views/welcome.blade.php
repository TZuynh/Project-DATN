<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <div
            style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center; font-size: 28px; flex-direction: column">
            <p>
                {{ config('app.name') }}
            </p>
            <a href="{{ route('admin.dashboard') }}" style="color: gray; font-size: 16px; margin-top: 38px">
                Go to admin page
            </a>
        </div>
    </body>
</html>
