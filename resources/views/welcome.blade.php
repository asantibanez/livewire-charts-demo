<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <livewire:styles />
</head>
<body class="bg-gray-200 p-8">

<livewire:dashboard/>

<livewire:scripts />

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>
</html>
