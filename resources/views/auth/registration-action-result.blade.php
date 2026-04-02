<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} — {{ config('app.name') }}</title>
</head>
<body style="font-family: system-ui, sans-serif; line-height: 1.5; padding: 2rem; max-width: 36rem; margin: 0 auto; color: #1e293b;">
    <h1 style="font-size: 1.25rem; font-weight: 600;">{{ $title }}</h1>
    <p>{{ $message }}</p>
    @isset($loginUrl)
        <p><a href="{{ $loginUrl }}" style="color: #2563eb;">Go to login</a></p>
    @endisset
</body>
</html>
