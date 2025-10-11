@extends('layouts.master')
@include('include.header')

<style>
    .booking-container { max-width: 1200px; margin: 40px auto; padding: 0 15px; }
    .steps-header { display: flex; justify-content: space-between; margin-bottom: 40px; position: relative; }
    .steps-header::after {
        content: '';
        position: absolute;
        top: 20px;
        left: 25%;
        right: 25%;
        height: 2px;
        background: #e9ecef;
        z-index: 1;
    }
    .step-indicator {
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 2;
        position: relative;
    }
    .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e9ecef;
        display: grid;
        place-items: center;
        font-weight: bold;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }
    .step-circle.active { background: #0a4da2; color: white; }
    .step-label { font-size: 0.9rem; color: #6c757d; font-weight: 500; }
    .step-section { display: none; }
    .step-section.active { display: block; animation: fadeIn 0.4s ease; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

    .form-section { background: white; padding: 35px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); margin-bottom: 30px; }
    .section-title { font-size: 1.8rem; font-weight: 700; color: #1a2b47; margin-bottom: 20px; }
    .form-row { display: flex; gap: 20px; margin-bottom: 20px; }
    .form-group { flex: 1; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
    .form-control {
        width: 100%; padding: 14px; border: 1px solid #dee2e6; border-radius: 10px;
        font-size: 1rem; transition: border 0.3s ease;
    }
    .form-control:focus {
        outline: none; border-color: #0a4da2;
    }
    .btn-group { display: flex; justify-content: space-between; margin-top: 30px; }
    .btn { padding: 12px 30px; border-radius: 30px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
    .btn-back { background: #f1f3f5; color: #495057; border: none; }
    .btn-back:hover { background: #e9ecef; }
    .btn-next, .btn-book { background: #0a4da2; color: white; border: none; }
    .btn-next:hover, .btn-book:hover { background: #083b7a; transform: translateY(-2px); }
    .btn-book { background: #28a745; width: 100%; padding: 16px; font-size: 1.1rem; }

    .sidebar { background: white; padding: 30px; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); }
    .sidebar h4 { font-size: 1.4rem; margin-bottom: 20px; color: #1a2b47; }
    .sidebar-item { display: flex; justify-content: space-between; margin: 16px 0; }
    .free-cancel { color: #28a745; font-size: 0.95rem; margin-top: 20px; display: flex; align-items: center; gap: 8px; }
    .terms { font-size: 0.9rem; color: #6c757d; line-height: 1.6; margin-top: 20px; }

    @media (max-width: 992px) {
        .booking-layout { flex-direction: column; }
        .sidebar { margin-top: 30px; }
        .steps-header::after { display: none; }
        .step-indicator { margin-bottom: 20px; }
    }
</style>

<div class="booking-container">
    <div class="steps-header">
        <div class="step-indicator" data-step="1">
            <div class="step-circle active" id="circle1">1</div>
            <div class="step-label">Contact</div>
        </div>
        <div class="step-indicator" data-step="2">
            <div class="step-circle" id="circle2">2</div>
            <div class="step-label">Activity</div>
        </div>
        <div class="step-indicator" data-step="3">
            <div class="step-circle" id="circle3">3</div>
            <div class="step-label">Payment</div>
        </div>
    </div>

   <form action="{{ route('fixedbooking.store') }}" method="POST" enctype="multipart/form-data" id="bookingForm">

    @csrf
    <input type="hidden" name="package_id" value="{{ $package->id }}">

        <!-- STEP 1: CONTACT -->
        <div class="step-section active" id="step1">
            <div class="form-section">
                <h2 class="section-title">Contact Details</h2>
                <p>We'll use this information to send you confirmation and updates about your booking.</p>

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <div style="display: flex; gap: 5px;">
                        <input type="text" value="+94" readonly style="width: 60px; background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 10px 0 0 10px; text-align: center;">
                        <input type="tel" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" name="sms_opt_in" id="sms_opt_in" class="form-check-input">
                        <label class="form-check-label" for="sms_opt_in">Receive SMS updates about your booking. Message rates may apply.</label>
                    </div>
                </div>

                <div class="btn-group">
                    <div></div> <!-- empty for left -->
                    <button type="button" class="btn btn-next" onclick="showStep(2)">Next</button>
                </div>
            </div>
        </div>

        <!-- STEP 2: ACTIVITY -->
        <div class="step-section" id="step2">
            <div class="form-section">
                <h2 class="section-title">Activity Details</h2>
                <p>Please provide lead traveler information and preferences.</p>

                <div class="form-group">
                    <label>Lead Traveler</label>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="lead_first_name" class="form-control" placeholder="First Name *" required value="{{ old('lead_first_name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lead_last_name" class="form-control" placeholder="Last Name *" required value="{{ old('lead_last_name') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pickup_location">Pickup Location *</label>
                    <select name="pickup_location" id="pickup_location" class="form-control" required>
                        <option value="">Select pickup location</option>
                        <option value="Colombo Tree House">Colombo Tree House</option>
                        <option value="Negombo Beach">Negombo Beach</option>
                        <option value="Airport">Airport</option>
                    </select>
                    <small class="text-muted">The provider offers pickup from select locations.</small>
                </div>

                <div class="form-group">
                    <label for="language">Tour/Activity Language</label>
                    <select name="language" id="language" class="form-control">
                        <option value="">Select language</option>
                        <option value="English - Guide">English - Guide</option>
                        <option value="Sinhala - Guide">Sinhala - Guide</option>
                        <option value="Tamil - Guide">Tamil - Guide</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-back" onclick="showStep(1)">Back</button>
                    <button type="button" class="btn btn-next" onclick="showStep(3)">Next</button>
                </div>
            </div>
        </div>

        <!-- STEP 3: PAYMENT -->
        <div class="step-section" id="step3">
        <div class="form-section">
            <h2 class="section-title">Payment Details</h2>

            <div class="form-group">
                <label for="payment_method">Payment Method *</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="">Select payment method</option>
                    <option value="cash">Cash on Arrival</option>
                    <option value="online">Online Payment</option>
                </select>
            </div>

            <div class="form-group" id="receiptUpload" style="display: none;">
                <label for="receipt">Upload Payment Receipt</label>
                <input type="file" name="receipt" id="receipt" class="form-control" accept="image/*,application/pdf">
                <small class="text-muted">Upload proof of payment if paying online.</small>
            </div>

            <!-- ✅ Participants & Total Price hidden fields (to store in DB) -->
            <input type="hidden" name="participants" id="participantsHidden" value="1">
            <input type="hidden" name="total_price" id="totalPriceHidden" value="{{ $package->price }}">

            <button type="button" class="btn btn-book" onclick="submitBooking()">Book Now</button>
        </div>
    </div>
    </form>

    <!-- SIDEBAR -->
    <div class="booking-layout" style="display: flex; gap: 30px; margin-top: 40px;">
        <div style="flex:1;"></div>
        <div class="sidebar">
            <h4>{{ $package->package_name }}</h4>
            <div class="sidebar-item">
                <span>Date</span>
                <span>Monday, October 6, 2025</span>
            </div>
            <div class="sidebar-item">
                <span>Time</span>
                <span>5:00 AM</span>
            </div>
            <div class="sidebar-item">
    <span>Participants</span>
    <input type="number" id="participants" name="participants" value="1" min="1" style="width:60px; text-align:center; border:1px solid #dee2e6; border-radius:6px; padding:4px;">
</div>

            <div class="sidebar-item">
    <span>Total</span>
    <span id="totalPrice">${{ number_format($package->price, 2) }}</span>
</div>

            <div class="free-cancel" style="margin-top: 20px;">
                <svg fill="#28a745" width="16" height="16"><use href="#clock"/></svg>
                Free cancellation before 5:00 AM on October 5
            </div>
        </div>
    </div>
</div>

<svg style="display:none">
    <symbol id="clock" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></symbol>
</svg>

<!-- Confirmation Modal -->
<div id="confirmModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#0a4da2" fill-opacity="0.1"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#0a4da2" stroke-width="2"/>
                        <path d="M8 12L11 15L16 9" stroke="#0a4da2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="mb-3">Booking Request Submitted!</h5>
                <p class="text-muted">
                    Your request has been sent to our admin team.<br>
                    They will contact you via email as soon as possible.
                </p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-primary" onclick="submitBooking()">OK, Got it</button>
            </div>
        </div>
    </div>
</div>

<script>
function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.step-section').forEach(el => el.classList.remove('active'));
    // Show current step
    document.getElementById('step' + step).classList.add('active');

    // Update circles
    document.querySelectorAll('.step-circle').forEach((el, i) => {
        if (i + 1 <= step) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });
}

// Toggle receipt upload
document.getElementById('payment_method')?.addEventListener('change', function() {
    const upload = document.getElementById('receiptUpload');
    if (this.value === 'online') {
        upload.style.display = 'block';
    } else {
        upload.style.display = 'none';
    }
});

function showConfirmModal() {
    const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
    modal.show();
}

function submitBooking() {
    document.getElementById('bookingForm').submit();
}

document.addEventListener('DOMContentLoaded', function() {
    const participantsInput = document.getElementById('participants');
    const totalPriceElem = document.getElementById('totalPrice');
    const basePrice = parseFloat("{{ $package->price }}");

    function updateTotalPrice() {
        let count = parseInt(participantsInput.value);
        if (isNaN(count) || count < 1) count = 1;
        const total = (basePrice * count).toFixed(2);
        totalPriceElem.textContent = `$${total}`;
    }

    participantsInput.addEventListener('input', updateTotalPrice);

    // Initialize on load
    updateTotalPrice();
});

</script>

@include('include.footer')