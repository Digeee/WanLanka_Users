<!DOCTYPE html>
<html>
<head>
    <title>Travel Locker Debug</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .success { color: green; }
        .error { color: red; }
        .info { color: blue; }
    </style>
</head>
<body>
    <h1>Travel Locker Debug Page</h1>
    
    <h2>Database Connection Test</h2>
    @try
        @php
            $user = \App\Models\User::first();
            $travelDocs = $user ? $user->travelDocuments()->count() : 0;
        @endphp
        <p class="success">✅ Database connection working</p>
        <p class="info">User: {{ $user ? $user->name : 'No user found' }}</p>
        <p class="info">Travel Documents Count: {{ $travelDocs }}</p>
    @catch(Exception $e)
        <p class="error">❌ Database error: {{ $e->getMessage() }}</p>
    @endtry

    <h2>Model Test</h2>
    @try
        @php
            $categories = \App\Models\TravelDocument::getCategories();
        @endphp
        <p class="success">✅ TravelDocument model working</p>
        <p class="info">Categories: {{ count($categories) }}</p>
    @catch(Exception $e)
        <p class="error">❌ Model error: {{ $e->getMessage() }}</p>
    @endtry

    <h2>Storage Test</h2>
    @try
        @php
            $storage = \Illuminate\Support\Facades\Storage::disk('private');
            $exists = $storage->exists('test.txt');
        @endphp
        <p class="success">✅ Private storage accessible</p>
    @catch(Exception $e)
        <p class="error">❌ Storage error: {{ $e->getMessage() }}</p>
    @endtry

    <h2>Routes Test</h2>
    @try
        @php
            $routes = \Illuminate\Support\Facades\Route::getRoutes();
            $travelLockerRoutes = $routes->filter(function($route) {
                return str_contains($route->uri(), 'travel-locker');
            });
        @endphp
        <p class="success">✅ Routes registered: {{ $travelLockerRoutes->count() }}</p>
    @catch(Exception $e)
        <p class="error">❌ Routes error: {{ $e->getMessage() }}</p>
    @endtry

    <h2>Next Steps</h2>
    <p>If all tests pass, you can access the Travel Locker at:</p>
    <ul>
        <li><a href="/travel-locker">Travel Locker Main Page</a></li>
        <li><a href="/travel-locker/create">Upload Document</a></li>
    </ul>
</body>
</html>
