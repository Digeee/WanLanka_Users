<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CustomPackageController extends Controller
{
    /**
     * Public listing of all active packages
     */
    public function index()
    {
        $packages = CustomPackage::with('user')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('packages.Custom-package', compact('packages'));
    }

    /**
     * Show authenticated user's packages + creation form view
     */
    public function myPackages()
    {
        $packages = CustomPackage::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        // Fetch all required options from your existing database tables
        $availablePlaces = DB::table('places')
            ->select('id', 'name', 'province', 'district')
            ->orderBy('name')
            ->get();
            
        // Updated to use correct column names based on your actual table structure
        $vehicleOptions = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->orderBy('vehicle_type')
            ->get();
            
        // Check accommodations table structure first - let's be safe
        try {
            $accommodationOptions = DB::table('accommodations')
                ->select('id', 'name', 'type', 'location')
                ->orderBy('name')
                ->get();
        } catch (\Exception $e) {
            // If the query fails, try with different column names or return empty
            $accommodationOptions = collect([]);
        }

        return view('packages.Custom-package', compact(
            'packages',
            'availablePlaces',
            'vehicleOptions',
            'accommodationOptions'
        ));
    }

    /**
     * Show form for creating new package
     */
    public function create()
    {
        // Fetch all required options from your existing database tables
        $availablePlaces = DB::table('places')
            ->select('id', 'name', 'province', 'district')
            ->orderBy('name')
            ->get();
            
        // Updated to use correct column names based on your actual table structure
        $vehicleOptions = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->orderBy('vehicle_type')
            ->get();
            
        // Check accommodations table structure first - let's be safe
        try {
            $accommodationOptions = DB::table('accommodations')
                ->select('id', 'name', 'type', 'location')
                ->orderBy('name')
                ->get();
        } catch (\Exception $e) {
            // If the query fails, try with different column names or return empty
            $accommodationOptions = collect([]);
        }

        return view('custom-packages.create', compact(
            'availablePlaces',
            'vehicleOptions',
            'accommodationOptions'
        ));
    }

    /**
     * Store a new custom package
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'num_people' => 'required|integer|min:1',
            'start_date' => 'nullable|date|after_or_equal:today',
            'destinations' => 'required|array|min:1',
            'vehicles' => 'required|array|min:1',
            'accommodations' => 'required|array|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'title',
            'description',
            'start_location',
            'duration',
            'num_people',
            'start_date'
        ]);
        
        $data['user_id'] = Auth::id();
        $data['destinations'] = json_encode($request->destinations);
        $data['vehicles'] = json_encode($request->vehicles);
        $data['accommodations'] = json_encode($request->accommodations);
        $data['status'] = 'active';
        
        // Calculate price based on selections (you can customize this logic)
        $data['price'] = $this->calculatePackagePrice($request);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('custom-packages', 'public');
            $data['image'] = $imagePath;
        }

        $package = CustomPackage::create($data);

        return redirect()->route('custom-packages.my')->with('success', 'Package created successfully!');
    }

    /**
     * Show specific package
     */
    public function show($id)
    {
        $package = CustomPackage::with(['user'])->findOrFail($id);
        
        // Load related data for display using correct column names
        $destinations = DB::table('places')
            ->whereIn('id', json_decode($package->destinations, true) ?? [])
            ->get();
            
        $vehicles = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->whereIn('id', json_decode($package->vehicles, true) ?? [])
            ->get();
            
        $accommodations = DB::table('accommodations')
            ->whereIn('id', json_decode($package->accommodations, true) ?? [])
            ->get();
        
        return view('custom-packages.show', compact(
            'package',
            'destinations',
            'vehicles',
            'accommodations'
        ));
    }

    /**
     * Delete a package
     */
    public function destroy($id)
    {
        $package = CustomPackage::where('user_id', Auth::id())->findOrFail($id);

        if ($package->image) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('custom-packages.my')->with('success', 'Package deleted successfully!');
    }

    /**
     * Calculate package price based on selections
     */
    private function calculatePackagePrice($request)
    {
        $basePrice = 50; // Base price per person per day
        
        // Simple pricing since we don't have price columns in vehicles table yet
        $vehicleCount = count($request->vehicles);
        $accommodationCount = count($request->accommodations);
        
        // Vehicle pricing based on type (you can adjust these rates)
        $vehicleCost = 0;
        foreach ($request->vehicles as $vehicleId) {
            $vehicleType = DB::table('vehicles')->where('id', $vehicleId)->value('vehicle_type');
            switch ($vehicleType) {
                case 'bike':
                    $vehicleCost += 25 * $request->duration;
                    break;
                case 'three_wheeler':
                    $vehicleCost += 35 * $request->duration;
                    break;
                case 'car':
                    $vehicleCost += 50 * $request->duration;
                    break;
                case 'van':
                    $vehicleCost += 80 * $request->duration;
                    break;
                case 'bus':
                    $vehicleCost += 120 * $request->duration;
                    break;
                default:
                    $vehicleCost += 40 * $request->duration;
            }
        }
        
        // Simple accommodation cost (adjust as needed)
        $accommodationCost = $accommodationCount * 60 * $request->duration;
        
        $totalPrice = ($basePrice * $request->num_people * $request->duration) + 
                     $vehicleCost + 
                     $accommodationCost;
                     
        return $totalPrice;
    }
}