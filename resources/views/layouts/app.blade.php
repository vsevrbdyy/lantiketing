<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lan-jalan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
    /* Membuat semua menu navbar berwarna hitam */
    nav ul li, 
    nav ul li a, 
    nav ul li button,
    nav div a,
    nav div button {
        color: #000000 !important;
        text-decoration: none !important;
    }
    
    /* Saat hover berubah jadi biru */
    nav ul li:hover, 
    nav ul li a:hover, 
    nav ul li button:hover,
    nav div a:hover,
    nav div button:hover {
        color: #2563eb !important;
    }
    
    /* Login jadi huruf besar L */
    nav ul li:last-child {
        text-transform: capitalize !important;
    }
</style>
</head>
<body class="bg-white text-gray-800">
    <div class="min-h-screen flex flex-col">
        <x-navbar/>
        <x-image-slider/>
    </div>
    <script>
    // Cek status login setiap halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/api/user')
            .then(res => res.json())
            .then(data => {
                if (data.user) {
                    // Ganti tulisan "login" dengan nama user
                    let loginMenu = document.querySelector('nav ul li:last-child');
                    if (loginMenu && loginMenu.innerText.trim() === 'login') {
                        loginMenu.innerHTML = `<div class="relative" style="position:relative;">
                            <span class="cursor-pointer" onclick="this.nextElementSibling.classList.toggle('show')">${data.user.name}</span>
                            <div class="absolute right-0 mt-2 w-32 bg-white shadow-lg rounded-md hidden" style="position:absolute; right:0; z-index:100;">
                                <form action="/logout" method="POST" style="margin:0;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="w-full text-left px-3 py-2 text-sm hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>`;
                    }
                    
                    // Sembunyikan tombol Sign Up
                    let signupBtn = document.querySelector('nav div:last-child button, nav div:last-child a');
                    if (signupBtn && signupBtn.innerText.includes('Sign Up')) {
                        signupBtn.style.display = 'none';
                    }
                }
            });
    });
</script>

<style>
    .absolute.show {
        display: block !important;
    }
    .hidden {
        display: none;
    }
</style>
</body>
</html>