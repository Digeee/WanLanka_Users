<!-- resources/views/contact.blade.php -->

@include('include.Header')


<div class="contact-page-container" style="max-width:1200px; margin: 2rem auto; padding: 0 1rem;">
    <h1 style="text-align:center; font-size:2.5rem; margin-bottom:2rem;">Contact Us</h1>

    <!-- Branches Section -->
    <div class="branches" style="display:flex; flex-wrap:wrap; justify-content:space-around; gap:1rem; margin-bottom:3rem;">
        @php
            $branches = [
                [
                    'image' => asset('images/branch1.webp'),
                    'name' => 'Colombo Branch',
                    'description' => 'Our main office located in the heart of Colombo.'
                ],
                [
                    'image' => asset('images/branch2.jpeg'),
                    'name' => 'Kandy Branch',
                    'description' => 'Serving clients in the scenic city of Kandy.'
                ],
                [
                    'image' => asset('images/branch3.jpg'),
                    'name' => 'Galle Branch',
                    'description' => 'Coastal services from our Galle location.'
                ],
                [
                    'image' => asset('images/branch4.jpg'),
                    'name' => 'Jaffna Branch',
                    'description' => 'Your trusted partner in the north.'
                ],
                [
                    'image' => asset('images/branch5.jpg'),
                    'name' => 'Negombo Branch',
                    'description' => 'Close to the beach for your travel needs.'
                ],
            ];
        @endphp

        @foreach ($branches as $branch)
            <div class="branch-card" style="flex:1 1 180px; box-shadow:0 0 10px rgba(0,0,0,0.1); border-radius:8px; overflow:hidden; max-width:220px; text-align:center;">
                <img src="{{ $branch['image'] }}" alt="{{ $branch['name'] }}" style="width:100%; height:140px; object-fit:cover;">
                <div style="padding: 0.75rem;">
                    <h3 style="margin:0.5rem 0;">{{ $branch['name'] }}</h3>
                    <p style="font-size:0.9rem; color:#555;">{{ $branch['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Map Section -->
    <div class="map-container" style="margin-bottom:3rem;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41297.66458378165!2d135.4700108320272!3d34.69373652696326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e681c6e9ed71%3A0x8f3e8587b78b1d31!2sOsaka%2C%20Japan!5e0!3m2!1sen!2slk!4v1691856000000!5m2!1sen!2slk"
            width="100%"
            height="350"
            style="border:0; border-radius:8px;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>


    <!-- Contact Form Section -->
    <div class="form-container" style="max-width:600px; margin:0 auto;">
        <form action="{{ url('contact/send') }}" method="POST" style="display:flex; flex-direction:column; gap:1rem;">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required style="padding:0.75rem; font-size:1rem; border:1px solid #ccc; border-radius:4px;">
            <input type="tel" name="phone" placeholder="Phone Number" required style="padding:0.75rem; font-size:1rem; border:1px solid #ccc; border-radius:4px;">
            <input type="email" name="email" placeholder="Email Address" required style="padding:0.75rem; font-size:1rem; border:1px solid #ccc; border-radius:4px;">
            <textarea name="message" placeholder="Your Message" rows="5" required style="padding:0.75rem; font-size:1rem; border:1px solid #ccc; border-radius:4px; resize:none;"></textarea>
            <button type="submit" style="background-color:#0066cc; color:white; padding:0.75rem; font-size:1.1rem; border:none; border-radius:4px; cursor:pointer; transition:background-color 0.3s ease;">
                Send Details
            </button>
        </form>
    </div>
</div>


@include('include.Footer')
