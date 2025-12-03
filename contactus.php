<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Gift Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
        }

        body { 
            background: var(--primary-gradient); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .contact-section { padding: 80px 0; }
        .contact-card { 
            background: rgba(255,255,255,0.95); 
            border-radius: 25px; 
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            backdrop-filter: blur(10px);
        }

        .form-control:focus { 
            border-color: #667eea; 
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25); 
        }

        .btn-submit { 
            background: var(--primary-gradient);
            border: none; 
            padding: 15px 40px; 
            border-radius: 50px; 
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-submit:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4); 
        }

        .contact-info i { 
            font-size: 1.8rem; 
            color: #667eea; 
            margin-right: 15px; 
        }

        /* 🎬 ANIMATION STYLES */
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7); }
            70% { box-shadow: 0 0 0 25px rgba(102, 126, 234, 0); }
            100% { box-shadow: 0 0 0 0 rgba(102, 126, 234, 0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .success-modal {
            animation: bounceIn 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .success-icon {
            font-size: 5rem;
            animation: float 3s ease-in-out infinite, pulseGlow 2s infinite;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .detail-item {
            animation: slideInUp 0.8s ease forwards;
            opacity: 0;
        }

        .detail-item:nth-child(1) { animation-delay: 0.2s; }
        .detail-item:nth-child(2) { animation-delay: 0.3s; }
        .detail-item:nth-child(3) { animation-delay: 0.4s; }
        .detail-item:nth-child(4) { animation-delay: 0.5s; }

        .btn-success-anim {
            animation: pulseGlow 2.5s infinite;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .btn-success-anim:hover {
            transform: scale(1.08) translateY(-3px);
            box-shadow: 0 20px 40px rgba(255,255,255,0.3);
        }

        @keyframes confetti {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-10vh) rotate(720deg); opacity: 0; }
        }

        .confetti { 
            position: fixed; 
            width: 10px; 
            height: 10px; 
            background: #f093fb; 
            animation: confetti 3s linear infinite; 
            pointer-events: none; 
            z-index: 9999;
        }
    </style>
</head>
<body>
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold text-white mb-4">Contact Us</h1>
                        <p class="lead text-white-50 fs-4">Have questions about perfect gifts? We're here to help! :)</p>
                    </div>
                    
                    <div class="row">
                        <!-- 📱 Contact Form -->
                        <div class="col-lg-8">
                            <div class="contact-card p-5 mb-4 mb-lg-0">
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold fs-5">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-lg" name="name" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold fs-5">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control form-control-lg" name="email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold fs-5">Phone</label>
                                            <input type="tel" class="form-control form-control-lg" name="phone">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label fw-bold fs-5">Subject</label>
                                            <input type="text" class="form-control form-control-lg" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-bold fs-5">Message <span class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-lg" name="message" rows="6" required placeholder="Tell us about your gift needs..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit btn-lg w-100">
                                        <i class="fas fa-paper-plane me-3"></i>Send Your Message
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!--  Contact Info -->
                        <div class="col-lg-4">
                            <div class="contact-card p-5 h-100">
                                <h4 class="fw-bold mb-5 text-center">Get In Touch </h4>
                                
                                <div class="mb-4 p-3 rounded-3 hover-lift">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-map-marker-alt text-primary fs-2"></i>
                                        <div>
                                            <div class="fw-bold fs-6">Visit Us</div>
                                            <div>Gobichettipalayam</div>
                                            <div>Tamil Nadu, India - 638476</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4 p-3 rounded-3 hover-lift">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-phone text-success fs-2"></i>
                                        <div>
                                            <div class="fw-bold fs-6">Call Us</div>
                                            <div>+91 98765 43210</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-5 p-3 rounded-3 hover-lift">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope text-warning fs-2"></i>
                                        <div>
                                            <div class="fw-bold fs-6">Email</div>
                                            <a href="mailto:hello@giftstore.in" class="text-decoration-none fw-semibold">hello@giftstore.in</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h6 class="fw-bold mb-3">Follow Us ***</h6>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="#" class="btn btn-outline-primary btn-lg rounded-circle p-3"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="btn btn-outline-danger btn-lg rounded-circle p-3"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="btn btn-success btn-lg rounded-circle p-3"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        //  MAIN FORM HANDLER WITH ANIMATIONS
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const btn = this.querySelector('button[type="submit"]');
            
            // Loading animation
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-3"></i>Sending...';
            btn.disabled = true;
            
            fetch('contact.php', { 
                method: 'POST', 
                body: formData 
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    createConfetti();  // 
                    showAnimatedSuccess(data);  
                    this.reset();
                } else {
                    alert(`❌ ${data.message}`);
                }
            })
            .catch(() => alert('❌ Network error. Please try again.'))
            .finally(() => {
                btn.innerHTML = '<i class="fas fa-paper-plane me-3"></i>Send Your Message';
                btn.disabled = false;
            });
        });

        //  ANIMATED SUCCESS MODAL
        function showAnimatedSuccess(data) {
            const modalHTML = `
                <div class="modal fade show d-block success-modal" tabindex="-1" style="background: rgba(102, 126, 234, 0.2); backdrop-filter: blur(15px);">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content border-0 shadow-5" style="border-radius: 30px; background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255,255,255,0.85)); backdrop-filter: blur(20px);">
                            <div class="modal-header border-0 p-5 text-center">
                                <div class="success-icon mb-4"><i class="fas fa-gift"></i></div>
                                <h2 class="modal-title fw-bold mb-2 text-dark">${data.title}</h2>
                                <p class="fs-5 opacity-90 mb-0">${data.message}</p>
                            </div>
                            <div class="modal-body p-5">
                                <div class="row g-4 mb-5">
                                    <div class="col-md-6 detail-item">
                                        <div class="p-4 bg-primary bg-opacity-10 rounded-4 text-center hover-lift h-100">
                                            <i class="fas fa-user-circle fs-1 text-primary mb-3"></i>
                                            <div class="h5 fw-bold text-dark">${data.details.name}</div>
                                            <small class="text-muted">Customer</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 detail-item">
                                        <div class="p-4 bg-success bg-opacity-10 rounded-4 text-center hover-lift h-100">
                                            <i class="fas fa-envelope-open fs-1 text-success mb-3"></i>
                                            <div class="h5 fw-bold text-dark">${data.details.email}</div>
                                            <small class="text-muted">Reply To</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 detail-item">
                                        <div class="p-4 bg-warning bg-opacity-10 rounded-4 text-center hover-lift h-100">
                                            <i class="fas fa-tag fs-1 text-warning mb-3"></i>
                                            <div class="h5 fw-bold text-dark">${data.details.subject}</div>
                                            <small class="text-muted">Subject</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 detail-item">
                                        <div class="p-4 bg-info bg-opacity-10 rounded-4 text-center hover-lift h-100">
                                            <i class="fas fa-ticket-alt fs-1 text-info mb-3"></i>
                                            <div class="h5 fw-bold">#${data.details.ticket_id}</div>
                                            <small class="text-muted">Ticket ID</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center p-4 bg-light rounded-4">
                                    <div class="h6 fw-bold mb-3 text-primary"> Submitted: ${data.details.submitted}</div>
                                    <div class="h6 fw-bold mb-0">Next Steps:</div>
                                    <div class="mt-2 fs-6">${data.next_steps.join(' • ')}</div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 p-5 justify-content-center">
                                <button class="btn btn-success btn-lg px-5 py-3 fw-bold rounded-pill btn-success-anim fs-5" onclick="closeSuccess()">
                                    <i class="fas fa-check-double me-3"></i>Perfect! Thank You .
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            setTimeout(closeSuccess, 12000);
        }

        function closeSuccess() {
            const modal = document.querySelector('.modal.show');
            if (modal) modal.remove();
        }

        //  CONFETTI EFFECT
        function createConfetti() {
            for(let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = `hsl(${Math.random() * 360}, 70%, 60%)`;
                confetti.style.animationDelay = Math.random() * 0.5 + 's';
                confetti.style.animationDuration = (Math.random() * 1 + 2) + 's';
                document.body.appendChild(confetti);
                setTimeout(() => confetti.remove(), 4000);
            }
        }

        // Hover effects
        document.querySelectorAll('.hover-lift').forEach(el => {
            el.addEventListener('mouseenter', () => el.style.transform = 'translateY(-5px)');
            el.addEventListener('mouseleave', () => el.style.transform = 'translateY(0)');
        });
    </script>
</body>
</html>
