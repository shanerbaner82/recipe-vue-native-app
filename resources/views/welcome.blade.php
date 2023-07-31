<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue + NativePHP</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-900">

<div id="app"></div>
</body>
</html>
