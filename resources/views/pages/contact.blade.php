@extends('layouts.app')
@section('title', 'Contact')

@section('content')

    <div class="container py-5">
        <div class="text-center mb-5 fade-scroll">
            <h1 class="fw-bold text-primary-custom">Contact Us</h1>
            <p class="text-muted">
                Hubungi kami untuk konsultasi atau kerja sama lebih lanjut
            </p>
        </div>
        <div class="row g-5">
            <div class="col-md-5 fade-scroll">
                <h4 class="fw-bold text-primary-custom mb-3">Get in Touch</h4>
                <p class="text-muted">
                    Kami siap membantu Anda dalam mengembangkan solusi teknologi terbaik untuk bisnis Anda.
                </p>
                <div class="mt-4 contact-info">
                    <p><strong>Email:</strong><br> {{ $profile?->email ?? 'nigmagird@net.com' }}</p>
                    <p><strong>Phone:</strong><br> {{ $profile?->phone ?? '+62 812-3456-7890' }}</p>
                    <p><strong>Address:</strong><br>
                        {{ $profile?->address ?? 'Jl. Kebagusan 3 No.58Q 9, RT.9/RW.5, Kebagusan, Ps. Minggu, Jakarta Selatan 12520' }}
                    </p>
                </div>
            </div>
            <div class="col-md-7 fade-scroll">
                <div class="contact-card p-4">
                    <form>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn text-white w-100 send-btn">
                                    Send Message
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-5 fade-scroll">
            <iframe
                src="{{ $profile?->map_embed_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.630413613589!2d106.8278276749911!3d-6.312187093677131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edef660438c1%3A0xe08d45ea5f9ff2b4!2sMulia%20Kebagusan%20Residence!5e0!3m2!1sen!2sid!4v1777620758324!5m2!1sen!2sid' }}"
                width="100%" height="300" style="border:0; border-radius:12px;">
            </iframe>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll('.fade-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, {
                threshold: 0.2
            });
            elements.forEach(el => observer.observe(el));
        });
    </script>
@endsection
