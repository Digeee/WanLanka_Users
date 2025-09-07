<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanLanka</title>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home-contact.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="{{ asset('js/home-slider.js') }}"></script>
</head>
<body>
</br>
</br>
</br>
</br>

    @include('include.header') <!-- Your header blade component -->



@section('content')
  <!-- Hero Section -->
  <section class="relative text-white">
    <img alt="Scenic Sri Lankan landscape with mountains and lush greenery under a bright blue sky" class="w-full h-[24rem] object-cover brightness-50" height="600" loading="lazy" src="https://storage.googleapis.com/a1aa/image/b86ff984-c010-4681-0acc-8929ce39a270.jpg" width="1920"/>
    <div class="absolute inset-0 flex flex-col justify-center items-center px-6 text-center max-w-4xl mx-auto w-full" style="top: 50%; transform: translateY(-50%)">
      <h1 class="text-4xl md:text-5xl font-playfair font-bold leading-tight drop-shadow-lg">
        Discover Wanlanka Travel
      </h1>
      <p class="mt-4 text-lg md:text-xl max-w-3xl drop-shadow-md">
        Your trusted partner for unforgettable Sri Lankan adventures since 2010
      </p>
    </div>
  </section>

  <!-- About Content Section -->
  <section class="bg-white py-20 px-6 md:px-12 max-w-7xl mx-auto">
    <div class="max-w-4xl mx-auto space-y-20">
      <article>
        <h2 class="text-3xl font-playfair font-bold text-center text-[#1a3a4b] mb-8 relative after:block after:w-20 after:h-1 after:bg-gradient-to-r after:from-[#1a3a4b] after:to-[#2c6e8f] after:mx-auto after:rounded">
          Our Story
        </h2>
        <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
          <p>
            Founded in 2010, Wanlanka Travel began as a small family-owned business with a passion for showcasing the incredible beauty and rich culture of Sri Lanka. What started as a modest operation with just two guides and one vehicle has now grown into one of Sri Lanka's most respected travel companies.
          </p>
          <p>
            Our journey began when our founder, Anil Perera, recognized the need for authentic, personalized travel experiences that go beyond the typical tourist trails. He believed that travelers deserved to experience the real Sri Lanka - its hidden gems, local communities, and untouched natural wonders.
          </p>
          <p>
            Today, we're proud to have served over 15,000 satisfied customers from around the world and have built a network of trusted partners across the island. Despite our growth, we've stayed true to our original values of personalized service, ethical tourism, and deep respect for Sri Lanka's cultural and natural heritage.
          </p>
        </div>
      </article>

      <article>
        <h2 class="text-3xl font-playfair font-bold text-center text-[#1a3a4b] mb-8 relative after:block after:w-20 after:h-1 after:bg-gradient-to-r after:from-[#1a3a4b] after:to-[#2c6e8f] after:mx-auto after:rounded">
          Our Mission
        </h2>
        <div class="space-y-6 text-gray-700 text-lg leading-relaxed max-w-3xl mx-auto">
          <p>
            At Wanlanka Travel, our mission is to create transformative travel experiences that connect visitors with the authentic spirit of Sri Lanka while supporting local communities and promoting sustainable tourism practices.
          </p>
          <p>
            We believe that travel should be a force for good - benefiting both travelers and the destinations they visit. That's why we're committed to:
          </p>
          <ul class="list-disc list-inside space-y-3 text-[#2c6e8f] font-medium">
            <li>Providing authentic, culturally immersive experiences</li>
            <li>Supporting local economies and communities</li>
            <li>Promoting environmental sustainability</li>
            <li>Preserving Sri Lanka’s cultural heritage</li>
            <li>Exceeding customer expectations through personalized service</li>
          </ul>
        </div>
      </article>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="bg-gradient-to-r from-[#1a3a4b] to-[#2c6e8f] text-white py-20 px-6">
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 text-center">
      <div>
        <div class="text-5xl font-bold font-poppins mb-2">
          13+
        </div>
        <div class="text-lg opacity-90">
          Years of Excellence
        </div>
      </div>
      <div>
        <div class="text-5xl font-bold font-poppins mb-2">
          15,000+
        </div>
        <div class="text-lg opacity-90">
          Happy Travelers
        </div>
      </div>
      <div>
        <div class="text-5xl font-bold font-poppins mb-2">
          200+
        </div>
        <div class="text-lg opacity-90">
          Tours Offered
        </div>
      </div>
      <div>
        <div class="text-5xl font-bold font-poppins mb-2">
          98%
        </div>
        <div class="text-lg opacity-90">
          Satisfaction Rate
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="bg-gray-50 py-20 px-6 max-w-7xl mx-auto">
    <h2 class="text-3xl font-playfair font-bold text-center text-[#1a3a4b] mb-4 relative after:block after:w-20 after:h-1 after:bg-gradient-to-r after:from-[#1a3a4b] after:to-[#2c6e8f] after:mx-auto after:rounded">
      Meet Our Leadership Team
    </h2>
    <p class="text-center text-[#2c6e8f] max-w-3xl mx-auto mb-12 font-medium">
      Our dedicated team of travel experts brings together decades of experience in creating unforgettable Sri Lankan adventures
    </p>
    <div class="grid gap-10 sm:grid-cols-2 md:grid-cols-4">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-3 hover:shadow-2xl">
        <div class="h-72 overflow-hidden">
          <img alt="Portrait of Anil Perera founder of Wanlanka Travel wearing formal attire with a friendly smile" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" height="300" loading="lazy" src="https://storage.googleapis.com/a1aa/image/50606076-562f-4890-7dea-0a2e617212db.jpg" width="400"/>
        </div>
        <div class="p-6 text-center">
          <h3 class="text-xl font-semibold text-[#1a3a4b] mb-1">
            Anil Perera
          </h3>
          <p class="text-[#2c6e8f] font-medium">
            Founder &amp; CEO
          </p>
        </div>
      </div>
      <!-- Repeat similar structure for other team members -->
    </div>
  </section>

  <!-- Values Section -->
  <section class="bg-white py-20 px-6 max-w-7xl mx-auto">
    <h2 class="text-3xl font-playfair font-bold text-center text-[#1a3a4b] mb-4 relative after:block after:w-20 after:h-1 after:bg-gradient-to-r after:from-[#1a3a4b] after:to-[#2c6e8f] after:mx-auto after:rounded">
      Our Values
    </h2>
    <p class="text-center text-[#2c6e8f] max-w-3xl mx-auto mb-12 font-medium">
      The principles that guide everything we do at Wanlanka Travel
    </p>
    <div class="grid gap-12 sm:grid-cols-1 md:grid-cols-3 max-w-6xl mx-auto">
      <!-- Values cards (Authenticity, Responsibility, Excellence) -->
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="bg-gray-100 py-20 px-6 text-center">
    <div class="max-w-3xl mx-auto">
      <h2 class="text-4xl font-playfair font-bold text-[#1a3a4b] mb-6">
        Ready to Explore Sri Lanka with Us?
      </h2>
      <p class="text-lg text-[#2c6e8f] mb-10">
        Discover the beauty, culture, and adventure that await you with Wanlanka Travel as your guide.
      </p>
      <a class="inline-block bg-gradient-to-r from-[#1a3a4b] to-[#2c6e8f] text-white font-semibold px-12 py-4 rounded-full shadow-lg hover:shadow-xl transition transform hover:-translate-y-1" href="/contact">
        Get in Touch
      </a>
    </div>
  </section>

@endsection

    <!-- Footer Component -->
    @include('include.footer')
</body>
</html>
