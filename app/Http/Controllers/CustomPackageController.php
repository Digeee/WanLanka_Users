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
     * Display a listing of all active packages publicly
     * (used in /custom-packages page).
     */
    public function index()
    {
        $packages = CustomPackage::with('user')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // --- Fetch all Places grouped by District ---
        $placesByDistrict = DB::table('places')
            ->select('district', 'name')
            ->orderBy('district')
            ->get()
            ->groupBy('district')
            ->map(fn($group) => $group->pluck('name')->values());

        // --- Fetch all Accommodations grouped by District ---
        $accommodationsByDistrict = DB::table('accommodations')
            ->select('district', 'name')
            ->orderBy('district')
            ->get()
            ->groupBy('district')
            ->map(fn($group) => $group->pluck('name')->values());

        // --- Fetch Vehicle Options ---
        $vehicleOptions = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->orderBy('vehicle_type')
            ->get();

        // --- Static Province → District mapping ---
        $provinces = [
            'Central'       => ['Kandy', 'Matale', 'Nuwara Eliya'],
            'Eastern'       => ['Ampara', 'Batticaloa', 'Trincomalee'],
            'North Central' => ['Anuradhapura', 'Polonnaruwa'],
            'Northern'      => ['Jaffna', 'Kilinochchi', 'Mannar', 'Vavuniya', 'Mullaitivu'],
            'North Western' => ['Kurunegala', 'Puttalam'],
            'Sabaragamuwa'  => ['Kegalle', 'Ratnapura'],
            'Southern'      => ['Galle', 'Matara', 'Hambantota'],
            'Uva'           => ['Badulla', 'Monaragala'],
            'Western'       => ['Colombo', 'Gampaha', 'Kalutara'],
        ];

        return view('packages.Custom-package', compact(
            'packages',
            'vehicleOptions',
            'provinces',
            'placesByDistrict',
            'accommodationsByDistrict'
        ));
    }

    /**
     * Display packages created by the authenticated user.
     */
    public function myPackages()
    {
        $packages = CustomPackage::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        $placesByDistrict = DB::table('places')
            ->select('district', 'name')
            ->orderBy('district')
            ->get()
            ->groupBy('district')
            ->map(fn($group) => $group->pluck('name')->values());

        $accommodationsByDistrict = DB::table('accommodations')
            ->select('district', 'name')
            ->orderBy('district')
            ->get()
            ->groupBy('district')
            ->map(fn($group) => $group->pluck('name')->values());

        $vehicleOptions = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->orderBy('vehicle_type')
            ->get();

        $provinces = [
            'Central'       => ['Kandy', 'Matale', 'Nuwara Eliya'],
            'Eastern'       => ['Ampara', 'Batticaloa', 'Trincomalee'],
            'North Central' => ['Anuradhapura', 'Polonnaruwa'],
            'Northern'      => ['Jaffna', 'Kilinochchi', 'Mannar', 'Vavuniya', 'Mullaitivu'],
            'North Western' => ['Kurunegala', 'Puttalam'],
            'Sabaragamuwa'  => ['Kegalle', 'Ratnapura'],
            'Southern'      => ['Galle', 'Matara', 'Hambantota'],
            'Uva'           => ['Badulla', 'Monaragala'],
            'Western'       => ['Colombo', 'Gampaha', 'Kalutara'],
        ];

        return view('packages.Custom-package', compact(
            'packages',
            'vehicleOptions',
            'provinces',
            'placesByDistrict',
            'accommodationsByDistrict'
        ));
    }

    /**
     * Show the form for creating a new custom package.
     */
    public function create()
    {
        $availablePlaces = DB::table('places')
            ->select('id', 'name', 'province', 'district')
            ->orderBy('name')
            ->get();

        $vehicleOptions = DB::table('vehicles')
            ->select('id', 'vehicle_type as name', 'vehicle_type as type')
            ->orderBy('vehicle_type')
            ->get();

        try {
            $accommodationOptions = DB::table('accommodations')
                ->select('id', 'name', 'type', 'location')
                ->orderBy('name')
                ->get();
        } catch (\Exception $e) {
            $accommodationOptions = collect([]);
        }

        return view('custom-packages.create', compact(
            'availablePlaces',
            'vehicleOptions',
            'accommodationOptions'
        ));
    }

    /**
     * Store a new custom package.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'num_people' => 'required|integer|min:1',
            'destinations' => 'required|string', // JSON string
            'vehicles' => 'required|string', // JSON string
            'accommodations' => 'required|string', // JSON string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'title', 'description', 'start_location', 'duration', 'num_people'
        ]);

        $data['user_id'] = Auth::id();
        $data['destinations'] = $request->destinations;
        $data['vehicles'] = $request->vehicles;
        $data['accommodations'] = $request->accommodations;
        $data['status'] = 'active';
        $data['price'] = $this->calculatePackagePrice($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('custom-packages', 'public');
        }

        CustomPackage::create($data);

        return redirect()->route('custom-packages.my')
            ->with('success', 'Package created successfully!');
    }

    /**
     * Show details for a specific custom package.
     */
    public function show($id)
    {
        $package = CustomPackage::with('user')->findOrFail($id);

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
            'package', 'destinations', 'vehicles', 'accommodations'
        ));
    }

    /**
     * Delete a custom package.
     */
    public function destroy($id)
    {
        $package = CustomPackage::where('user_id', Auth::id())->findOrFail($id);

        if ($package->image) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('custom-packages.my')
            ->with('success', 'Package deleted successfully!');
    }

    /**
     * Calculate total price of the package.
     */
    private function calculatePackagePrice(Request $request)
    {
        $basePrice = 50;
        $vehicleCost = 0;
        
        // Decode the JSON vehicles array
        $vehicles = json_decode($request->vehicles, true);
        
        if (!empty($vehicles)) {
            foreach ($vehicles as $vehicleType) {
                $dailyRate = match ($vehicleType) {
                    'bike' => 25,
                    'three_wheeler' => 35,
                    'car' => 50,
                    'van' => 80,
                    'bus' => 120,
                    default => 40,
                };
                $vehicleCost += $dailyRate * $request->duration;
            }
        }

        // Decode accommodations to calculate cost
        $accommodations = json_decode($request->accommodations, true);
        $accommodationCost = (!empty($accommodations) ? count($accommodations) : 0) * 60 * $request->duration;

        return ($basePrice * $request->num_people * $request->duration)
            + $vehicleCost
            + $accommodationCost;
    }
}
