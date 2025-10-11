<?php

   namespace App\Http\Controllers;

   use App\Services\AdminApiService;
   use Illuminate\Http\Request;

   class PackageController extends Controller
   {
       public function fix(AdminApiService $apiService)
       {
           $packages = $apiService->getPackages();
           return view('packages.Fix-package-page', compact('packages'));
       }

       public function show($id, AdminApiService $apiService)
       {
           $package = $apiService->getPackage($id);
           if (!$package) {
               abort(404, 'Package not found');
           }
           return view('packages.show', compact('package'));
       }
   }
