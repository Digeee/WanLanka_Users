# Botpress Database Integration Summary

## Overview

This document summarizes the Botpress database connector module that has been created to enable your chatbot to access real-time data from your Laravel MySQL database.

## Files Created

The following files have been created in the `botpress_modules/db-connector` directory:

### Core Module Files
1. `package.json` - Module metadata and dependencies
2. `tsconfig.json` - TypeScript configuration
3. `.env` - Database configuration (you need to update this with your credentials)
4. `README.md` - Basic module documentation
5. `INTEGRATION_GUIDE.md` - Detailed integration instructions
6. `DEPLOYMENT_GUIDE.md` - Deployment and maintenance guide

### Source Code (TypeScript)
1. `src/config/db.config.ts` - Database connection configuration
2. `src/services/place.service.ts` - Place-related database operations
3. `src/services/package.service.ts` - Package-related database operations
4. `src/index.ts` - Main module entry point

### Compiled Code (JavaScript)
1. `dist/config/db.config.js` - Compiled database configuration
2. `dist/services/place.service.js` - Compiled place service
3. `dist/services/package.service.js` - Compiled package service
4. `dist/index.js` - Compiled main module

### Example Files
1. `examples/place-search-skill.js` - Example place search functionality
2. `examples/package-search-skill.js` - Example package search functionality
3. `examples/botpress-skill-example.js` - Complete Botpress skill examples

## Database Services Available

### PlaceService
- `getAllPlaces()` - Get all active places
- `getPlaceById(id)` - Get a specific place by ID
- `getPlacesByProvince(province)` - Get places by province
- `searchPlacesByName(name)` - Search places by name

### PackageService
- `getAllPackages()` - Get all active packages
- `getPackageById(id)` - Get a specific package by ID
- `getPackagesByType(type)` - Get packages by type
- `searchPackagesByName(name)` - Search packages by name

## Integration Steps

### 1. Update Database Configuration
Edit the `.env` file with your actual database credentials:
```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_DATABASE=wanlanka
```

### 2. Copy Module to Botpress
Copy the entire `db-connector` folder to your Botpress modules directory:
```
/path/to/your/botpress/modules/db-connector
```

### 3. Enable Module
Add the following to your Botpress configuration:
```json
{
  "modules": [
    {
      "location": "db-connector",
      "enabled": true
    }
  ]
}
```

### 4. Restart Botpress
Restart your Botpress server to load the module.

## Using in Botpress Skills

In your Botpress skills, you can now access the database services:

```javascript
// Search for places
const places = await event.state.placeService.searchPlacesByName("colombo");

// Get a specific package
const pkg = await event.state.packageService.getPackageById(123);

// Get all places in a province
const places = await event.state.placeService.getPlacesByProvince("Western");
```

## API Endpoints

The module also exposes REST API endpoints:
- POST `/db-connector/search-places`
- POST `/db-connector/search-packages`
- GET `/db-connector/place/:id`
- GET `/db-connector/package/:id`

## Next Steps

1. Review the detailed guides in `INTEGRATION_GUIDE.md` and `DEPLOYMENT_GUIDE.md`
2. Test the database connection using `node test-connection.js`
3. Implement the example skills from `examples/botpress-skill-example.js`
4. Customize the services to match your specific database schema
5. Monitor Botpress logs for any issues after deployment

## Support

If you encounter any issues:
1. Check the Botpress logs for error messages
2. Verify your database credentials in the `.env` file
3. Test the database connection independently
4. Ensure all dependencies are properly installed
