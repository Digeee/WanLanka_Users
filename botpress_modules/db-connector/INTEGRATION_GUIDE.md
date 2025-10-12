# Botpress Database Connector Integration Guide

This guide explains how to integrate the database connector module with your Botpress chatbot to access real-time data from your Laravel database.

## Prerequisites

1. Botpress installed and running
2. MySQL database with your Laravel application data
3. Node.js and npm installed

## Installation Steps

### 1. Install the Module

Copy the `db-connector` folder to your Botpress `modules` directory:
```
/path/to/botpress/modules/
```

### 2. Install Dependencies

Navigate to the module directory and install dependencies:
```bash
cd /path/to/botpress/modules/db-connector
npm install
```

### 3. Configure Database Connection

Update the `.env` file in the module directory with your database credentials:
```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
DB_DATABASE=your_laravel_database_name
```

### 4. Build the Module

Compile the TypeScript code:
```bash
npm run build
```

### 5. Enable the Module

In your Botpress configuration, ensure the module is enabled. This is typically done in your `botpress.config.json` file:
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

## Using the Module in Botpress Skills

### Accessing Services

Once the module is loaded, the services will be available in your Botpress skills through the event state:

```javascript
// In your Botpress skill
const places = await event.state.placeService.searchPlacesByName("colombo");
const packages = await event.state.packageService.searchPackagesByName("tour");
```

### Example: Place Search Skill

```javascript
// Place search skill
const searchTerm = event.preview.toLowerCase();

try {
  const places = await event.state.placeService.searchPlacesByName(searchTerm);
  
  if (places.length > 0) {
    // Format the response
    const placeList = places.map(place => 
      `${place.name} in ${place.province}`
    ).join('\n');
    
    await bp.cms.renderElement('builtin_text', {
      text: `I found these places matching "${searchTerm}":\n${placeList}`,
      typing: true
    }, event);
  } else {
    await bp.cms.renderElement('builtin_text', {
      text: `Sorry, I couldn't find any places matching "${searchTerm}".`,
      typing: true
    }, event);
  }
} catch (error) {
  console.error('Error searching places:', error);
  await bp.cms.renderElement('builtin_text', {
    text: 'Sorry, I encountered an error while searching for places.',
    typing: true
  }, event);
}
```

### Example: Package Details Skill

```javascript
// Package details skill
const packageId = event.nlu.intent.slots.packageId.value;

try {
  const pkg = await event.state.packageService.getPackageById(packageId);
  
  if (pkg) {
    await bp.cms.renderElement('builtin_text', {
      text: `Package: ${pkg.package_name}\nPrice: Rs ${pkg.price}\nDescription: ${pkg.description}`,
      typing: true
    }, event);
  } else {
    await bp.cms.renderElement('builtin_text', {
      text: 'Sorry, I couldn\'t find that package.',
      typing: true
    }, event);
  }
} catch (error) {
  console.error('Error fetching package:', error);
  await bp.cms.renderElement('builtin_text', {
    text: 'Sorry, I encountered an error while fetching package details.',
    typing: true
  }, event);
}
```

## Using API Endpoints

The module also exposes REST API endpoints that can be used directly:

### Search Places
```
POST /db-connector/search-places
Body: { "query": "colombo" }
```

### Search Packages
```
POST /db-connector/search-packages
Body: { "query": "tour" }
```

### Get Place by ID
```
GET /db-connector/place/123
```

### Get Package by ID
```
GET /db-connector/package/456
```

## Troubleshooting

### Common Issues

1. **Database Connection Failed**
   - Check your `.env` file credentials
   - Ensure your MySQL server is running
   - Verify network connectivity to the database

2. **Module Not Loading**
   - Check Botpress logs for error messages
   - Ensure the module is properly enabled in configuration
   - Verify the build was successful

3. **Services Not Available**
   - Ensure the module loaded successfully
   - Check that `onServerStarted` executed without errors

### Debugging

Enable debug logging in Botpress to see detailed information about module loading and database operations.

## Best Practices

1. **Error Handling**: Always wrap database calls in try-catch blocks
2. **Performance**: Consider implementing caching for frequently accessed data
3. **Security**: Validate and sanitize all user inputs before database queries
4. **Connection Management**: The module handles connection pooling automatically

## Extending the Module

To add new database services:

1. Create a new service file in `src/services/`
2. Follow the pattern in existing service files
3. Add the service to `src/index.ts`
4. Rebuild the module with `npm run build`
