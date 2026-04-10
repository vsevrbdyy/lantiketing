<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lan-jalan</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="bg-white text-gray-800">
    <div class="min-h-screen flex flex-col">
        <x-navbar/>
        <x-image-slider/>
    </div>
</body>
</html>