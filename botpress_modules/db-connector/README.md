# Database Connector Module for Botpress

This module allows your Botpress chatbot to connect to your local MySQL database and fetch real-time data.

## Installation

1. Navigate to your Botpress modules directory:
   ```
   cd /path/to/your/botpress/modules
   ```

2. Copy this `db-connector` folder to the modules directory.

3. Install dependencies:
   ```
   cd db-connector
   npm install
   ```

4. Build the module:
   ```
   npm run build
   ```

## Configuration

1. Update the `.env` file with your database credentials:
   ```
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   DB_DATABASE=your_database
   ```

## Usage

The module provides the following services:

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

## API Endpoints

The module exposes the following endpoints:

- POST `/db-connector/search-places` - Search places by name
- POST `/db-connector/search-packages` - Search packages by name
- GET `/db-connector/place/:id` - Get place by ID
- GET `/db-connector/package/:id` - Get package by ID

## Using in Botpress Skills

In your Botpress skills, you can access the services through the event state:

```javascript
const places = await event.state.placeService.searchPlacesByName("colombo");
const packages = await event.state.packageService.searchPackagesByName("tour");
```
