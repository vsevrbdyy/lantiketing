<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LAN-JALAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans">
    <div class="container mx-auto flex justify-center items-center min-h-screen px-4 py-10">
        <div class="bg-white rounded-2xl shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-gray-200 p-10 w-full max-w-4xl">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-16 mx-auto">
                <h3 class="mt-3 text-2xl font-bold text-gray-800">LAN-JALAN</h3>
                <p class="text-gray-500">Hubungi Kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Form --}}
                <div>
                    @if(session('success'))
                        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg flex justify-between items-center">
                            <span>{{ session('success') }}</span>
                            <button onclick="this.parentElement.remove()" class="text-green-800 font-bold ml-4">&times;</button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-bold text-gray-800 mb-1">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-bold text-gray-800 mb-1">Alamat Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-bold text-gray-800 mb-1">Perihal</label>
                            <input type="text" id="subject" name="subject" required
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-bold text-gray-800 mb-1">Pesan</label>
                            <textarea id="message" name="message" rows="4" required
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-gray-400 resize-none"></textarea>
                        </div>

                        <button type="button"
                            onclick="showSuccessPopup()"
                            class="w-full bg-gray-800 hover:bg-gray-700 text-white font-medium py-3 rounded-lg text-base transition-colors duration-200">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                {{-- Info Box --}}
                <div class="bg-gray-50 rounded-xl p-6 h-full">
                    <h4 class="text-lg font-bold text-gray-800 mb-6">Informasi Kami</h4>

                    <div class="mb-4">
                        <p class="font-bold text-gray-800 mb-1">Alamat</p>
                        <p class="text-gray-500">Denpasar, Bali, Indonesia</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-bold text-gray-800 mb-1">Email</p>
                        <p class="text-gray-500">infolanjalan@gmail.com</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-bold text-gray-800 mb-1">Telepon</p>
                        <p class="text-gray-500">+62 822 6644 4692</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-bold text-gray-800 mb-1">Jam Operasional</p>
                        <p class="text-gray-500">Senin - Minggu : 08.00 - 20.00 WIB</p>
                    </div>

                    <hr class="my-6 border-gray-200">

                    <div>
                        <p class="font-bold text-gray-800 mb-3">Ikuti Kami</p>
                        <div class="flex gap-6">
                            <a href="https://www.instagram.com/kevinsnry/" target="_blank">
                                <img src="{{ asset('images/ig.svg') }}" alt="Instagram"
                                    class="w-8 h-8 transition-all duration-300 hover:-translate-y-1 hover:opacity-70">
                            </a>
                            <a href="https://www.facebook.com/share/1P78dY45yo/?mibextid=wwXIfr" target="_blank">
                                <img src="{{ asset('images/fb.svg') }}" alt="Facebook"
                                    class="w-8 h-8 transition-all duration-300 hover:-translate-y-1 hover:opacity-70">
                            </a>
                            <a href="https://wa.me/6282266444692" target="_blank">
                                <img src="{{ asset('images/wa.svg') }}" alt="WhatsApp"
                                    class="w-8 h-8 transition-all duration-300 hover:-translate-y-1 hover:opacity-70">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Back Link --}}
            <div class="text-center mt-6">
                <a href="/" class="inline-block text-gray-800 hover:text-blue-600 font-medium transition-colors duration-200">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script>
    function showSuccessPopup() {
        const form = document.getElementById('contactForm');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const popup = document.createElement('div');
                popup.innerHTML = `
                    <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[9999]">
                        <div class="bg-white px-12 py-8 rounded-xl text-center shadow-2xl">
                            <h3 class="text-gray-800 text-xl font-bold mb-2">Pesan Terkirim!</h3>
                            <p class="text-gray-500 mb-5">Terima kasih, pesan Anda sudah kami terima.</p>
                            <button
                                onclick="this.closest('[class*=fixed]').remove(); location.reload();"
                                class="bg-gray-800 text-white border-none px-6 py-2 rounded-lg cursor-pointer hover:bg-gray-700 transition-colors">
                                OK
                            </button>
                        </div>
                    </div>
                `;
                document.body.appendChild(popup);
                form.reset();
            }
        });
    }
    </script>
</body>
</html>