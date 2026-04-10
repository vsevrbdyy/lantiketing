<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LAN-JALAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 1000px;
            border: 1px solid #e5e7eb;
        }
        .btn-submit {
            background: #1f2937;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
        }
        .btn-submit:hover {
            background: #374151;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            height: 60px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #9ca3af;
            box-shadow: none;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #1f2937;
            text-decoration: none;
            font-weight: 500;
        }
        .back-link:hover {
            color: #2563eb;
        }
        .info-box {
            background: #f9fafb;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
        }
        .social-icon {
            width: 32px;
            height: 32px;
            transition: all 0.3s ease;
        }
        .social-icon:hover {
            transform: translateY(-3px);
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="contact-card">
            <div class="logo">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                <h3 class="mt-3 fw-bold" style="color: #1f2937;">LAN-JALAN</h3>
                <p class="text-muted">Hubungi Kami</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold" style="color: #1f2937;">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold" style="color: #1f2937;">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold" style="color: #1f2937;">Perihal</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label fw-bold" style="color: #1f2937;">Pesan</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="button" class="btn btn-primary btn-submit w-100" onclick="showSuccessPopup()">Kirim Pesan</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <h4 class="fw-bold mb-4" style="color: #1f2937;">Informasi Kami</h4>
                        
                        <div class="mb-4">
                            <p class="fw-bold mb-1" style="color: #1f2937;">Alamat</p>
                            <p class="text-muted">Denpasar, Bali, Indonesia</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="fw-bold mb-1" style="color: #1f2937;">Email</p>
                            <p class="text-muted">infolanjalan@gmail.com</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="fw-bold mb-1" style="color: #1f2937;">Telepon</p>
                            <p class="text-muted">+62 822 6644 4692</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="fw-bold mb-1" style="color: #1f2937;">Jam Operasional</p>
                            <p class="text-muted">Senin - Minggu : 08.00 - 20.00 WIB</p>
                        </div>

                        <hr class="my-4">

                        <div>
                            <p class="fw-bold mb-3" style="color: #1f2937;">Ikuti Kami</p>
                            <div class="d-flex gap-4">
                                <a href="https://www.instagram.com/kevinsnry/" target="_blank">
                                    <img src="{{ asset('images/ig.svg') }}" alt="Instagram" class="social-icon">
                                </a>
                                <a href="https://www.facebook.com/share/1P78dY45yo/?mibextid=wwXIfr" target="_blank">
                                    <img src="{{ asset('images/fb.svg') }}" alt="Facebook" class="social-icon">
                                </a>
                                <a href="https://wa.me/6282266444692" target="_blank">
                                    <img src="{{ asset('images/wa.svg') }}" alt="WhatsApp" class="social-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/" class="back-link">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                // Tampilkan popup sukses
                const popup = document.createElement('div');
                popup.innerHTML = `
                    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center; z-index: 9999;">
                        <div style="background: white; padding: 30px 50px; border-radius: 12px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                            <h3 style="color: #1f2937; margin-bottom: 10px;">Pesan Terkirim!</h3>
                            <p style="color: #6b7280; margin-bottom: 20px;">Terima kasih, pesan Anda sudah kami terima.</p>
                            <button onclick="this.parentElement.parentElement.remove(); location.reload();" style="background: #1f2937; color: white; border: none; padding: 8px 25px; border-radius: 6px; cursor: pointer;">OK</button>
                        </div>
                    </div>
                `;
                document.body.appendChild(popup);
                
                // Reset form
                form.reset();
            }
        });
    }
    </script>
</body>
</html>