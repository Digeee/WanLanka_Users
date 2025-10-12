<div class="contact-section">
    <div class="contact-background">
        <div class="bg-pattern"></div>
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
    </div>
    
    <div class="contact-container">
        <div class="contact-header">
            <div class="section-badge">
                <span>Get In Touch</span>
            </div>
            <h2 class="contact-title">Let's Plan Your Dream Vacation</h2>
            <p class="contact-subtitle">Our travel experts are ready to create your perfect Sri Lankan adventure</p>
        </div>

        <div class="contact-content">
            <div class="contact-info">
                <div class="info-card">
                    <div class="info-icon">
                        <svg class="phone-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Call Us Directly</h3>
                        <p>Speak with our travel consultants</p>
                        <a href="tel:0773457489" class="phone-number">
                            +94 77 345 7489
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg class="clock-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Operating Hours</h3>
                        <p>We're here to help you</p>
                        <span class="hours">Mon - Sun: 7:00 AM - 10:00 PM</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <svg class="message-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h3>Email Us</h3>
                        <p>Get a personalized response</p>
                        <a href="mailto:info@wanlanka.com" class="email-link">
                            info@wanlanka.com
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-actions">
                <button class="contact-button primary">
                    <span class="button-text">Send Custom Inquiry</span>
                    <div class="button-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </button>

                <button class="contact-button secondary">
                    <span class="button-text">Live Chat</span>
                    <div class="button-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>

        <div class="trust-badges">
            <div class="trust-badge">
                <div class="badge-icon">✓</div>
                <span>24/7 Support</span>
            </div>
            <div class="trust-badge">
                <div class="badge-icon">✓</div>
                <span>Expert Guides</span>
            </div>
            <div class="trust-badge">
                <div class="badge-icon">✓</div>
                <span>Best Price Guarantee</span>
            </div>
        </div>
    </div>
</div>

<style>
.contact-section {
    position: relative;
    width: 100%;
    padding: 120px 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.contact-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(74, 105, 189, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(42, 157, 143, 0.03) 0%, transparent 50%);
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.floating-element {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(74, 105, 189, 0.05), rgba(42, 157, 143, 0.03));
    animation: float 8s ease-in-out infinite;
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.element-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    right: 10%;
    animation-delay: 0s;
}

.element-2 {
    width: 120px;
    height: 120px;
    bottom: 30%;
    left: 5%;
    animation-delay: 2s;
}

.element-3 {
    width: 60px;
    height: 60px;
    top: 60%;
    right: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.contact-container {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 40px;
    z-index: 2;
}

.contact-header {
    text-align: center;
    margin-bottom: 80px;
}

.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    padding: 10px 25px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 25px;
    box-shadow: 0 5px 20px rgba(74, 105, 189, 0.3);
}

.contact-title {
    font-size: 3.2rem;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 20px;
    line-height: 1.1;
}

.contact-subtitle {
    font-size: 1.3rem;
    color: #64748b;
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.contact-content {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 80px;
    align-items: center;
    margin-bottom: 60px;
}

.contact-info {
    display: grid;
    gap: 25px;
}

.info-card {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    cursor: pointer;
}

.info-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border-color: rgba(74, 105, 189, 0.2);
}

.info-icon {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 5px 15px rgba(74, 105, 189, 0.3);
}

.info-icon svg {
    width: 24px;
    height: 24px;
}

.info-content h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
}

.info-content p {
    font-size: 1rem;
    color: #64748b;
    margin-bottom: 12px;
    font-weight: 400;
}

.phone-number, .email-link, .hours {
    font-size: 1.2rem;
    font-weight: 700;
    color: #4a69bd;
    text-decoration: none;
    transition: all 0.3s ease;
}

.phone-number:hover, .email-link:hover {
    color: #2a9d8f;
    transform: translateX(5px);
}

.hours {
    color: #1e293b;
}

.contact-actions {
    display: flex;
    flex-direction: column;
    gap: 20px;
    min-width: 250px;
}

.contact-button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 30px;
    border: none;
    border-radius: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.contact-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.contact-button:hover::before {
    left: 100%;
}

.contact-button.primary {
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    box-shadow: 0 10px 30px rgba(74, 105, 189, 0.4);
}

.contact-button.primary:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(74, 105, 189, 0.6);
}

.contact-button.secondary {
    background: rgba(255, 255, 255, 0.9);
    color: #4a69bd;
    border: 2px solid #4a69bd;
    backdrop-filter: blur(10px);
}

.contact-button.secondary:hover {
    transform: translateY(-5px);
    background: #4a69bd;
    color: white;
    box-shadow: 0 10px 30px rgba(74, 105, 189, 0.3);
}

.button-icon {
    transition: transform 0.3s ease;
}

.contact-button:hover .button-icon {
    transform: translateX(5px);
}

.trust-badges {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
}

.trust-badge {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 25px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.badge-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4a69bd, #2a9d8f);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
}

.trust-badge span {
    font-weight: 600;
    color: #374151;
    font-size: 0.95rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .contact-content {
        grid-template-columns: 1fr;
        gap: 50px;
        text-align: center;
    }
    
    .contact-actions {
        min-width: auto;
        max-width: 400px;
        margin: 0 auto;
    }
    
    .info-card {
        max-width: 500px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .contact-section {
        padding: 80px 0;
    }
    
    .contact-container {
        padding: 0 25px;
    }
    
    .contact-title {
        font-size: 2.5rem;
    }
    
    .contact-subtitle {
        font-size: 1.1rem;
    }
    
    .info-card {
        padding: 25px;
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .contact-button {
        padding: 18px 25px;
        font-size: 1rem;
    }
    
    .trust-badges {
        gap: 20px;
    }
    
    .trust-badge {
        padding: 12px 20px;
    }
}

@media (max-width: 480px) {
    .contact-section {
        padding: 60px 0;
    }
    
    .contact-container {
        padding: 0 20px;
    }
    
    .contact-title {
        font-size: 2rem;
    }
    
    .section-badge {
        font-size: 0.8rem;
        padding: 8px 20px;
    }
    
    .info-card {
        padding: 20px;
    }
    
    .contact-actions {
        gap: 15px;
    }
    
    .trust-badges {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
    
    .trust-badge {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
</style>