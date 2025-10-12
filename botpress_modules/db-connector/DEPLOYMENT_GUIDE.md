# Database Connector Module Deployment Guide

## Overview

This guide provides step-by-step instructions for deploying the Database Connector module to enable your Botpress chatbot to access real-time data from your Laravel MySQL database.

## Prerequisites

1. Botpress server installed and running
2. MySQL database with your Laravel application data
3. Node.js (version 14 or higher) installed
4. npm (Node Package Manager) installed
5. Access to your Botpress server file system

## Deployment Steps

### Step 1: Copy Module Files

1. Copy the entire `db-connector` folder to your Botpress modules directory:
   ```
   /path/to/your/botpress/modules/
   ```

   The final structure should look like:
   ```
   /path/to/your/botpress/
   ├── modules/
   │   ├── db-connector/
   │   │   ├── dist/
   │   │   ├── src/
   │   │   ├── package.json
   │   │   ├── tsconfig.json
   │   │   ├── .env
   │   │   └── README.md
   ```

### Step 2: Configure Database Connection

1. Edit the `.env` file in the `db-connector` directory:
   ```env
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   DB_DATABASE=your_laravel_database_name
   ```

2. Update the values to match your Laravel database configuration:
   - `DB_HOST`: Your database server hostname or IP
   - `DB_PORT`: Your database port (default is 3306 for MySQL)
   - `DB_USERNAME`: Your database username
   - `DB_PASSWORD`: Your database password
   - `DB_DATABASE`: Your Laravel database name

### Step 3: Verify Module Build

The module has already been compiled, but you can verify the build by checking the `dist` directory:
```
dist/
├── config/
│   └── db.config.js
├── services/
│   ├── place.service.js
│   └── package.service.js
└── index.js
```

If you need to rebuild:
```bash
cd /path/to/botpress/modules/db-connector
npm install
npx tsc
```

### Step 4: Enable Module in Botpress

1. Edit your Botpress configuration file (`botpress.config.json`):
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

2. Restart your Botpress server to load the module:
   ```bash
   # If using systemd
   sudo systemctl restart botpress

   # If using pm2
   pm2 restart botpress

   # If running directly
   cd /path/to/botpress
   ./bp
   ```

### Step 5: Verify Module Loading

1. Check Botpress logs for successful module loading:
   ```
   Database connector module initialized successfully
   Database connector module is ready
   ```

2. If there are errors, check:
   - Database credentials in `.env` file
   - Network connectivity to database server
   - Database user permissions

## Using the Module in Botpress

### Available Services

The module exposes two main services:

1. **PlaceService**
   - `getAllPlaces()` - Get all active places
   - `getPlaceById(id)` - Get a specific place by ID
   - `getPlacesByProvince(province)` - Get places by province
   - `searchPlacesByName(name)` - Search places by name

2. **PackageService**
   - `getAllPackages()` - Get all active packages
   - `getPackageById(id)` - Get a specific package by ID
   - `getPackagesByType(type)` - Get packages by type
   - `searchPackagesByName(name)` - Search packages by name

### Example Usage in Skills

```javascript
// In your Botpress skill
const bp = require('botpress')

async function searchPlacesSkill(event, context) {
  const searchTerm = event.preview
  
  try {
    // Access the service through event state
    const places = await event.state.placeService.searchPlacesByName(searchTerm)
    
    if (places && places.length > 0) {
      const response = places.map(place => 
        `${place.name} (${place.province}) - Rs ${place.price || 'N/A'}`
      ).join('\n')
      
      await bp.cms.renderElement('builtin_text', {
        text: `Found ${places.length} places:\n${response}`,
        typing: true
      }, event)
    } else {
      await bp.cms.renderElement('builtin_text', {
        text: `No places found matching "${searchTerm}"`,
        typing: true
      }, event)
    }
  } catch (error) {
    console.error('Error searching places:', error)
    await bp.cms.renderElement('builtin_text', {
      text: 'Sorry, I encountered an error while searching for places.',
      typing: true
    }, event)
  }
}
```

### API Endpoints

The module also exposes REST API endpoints:

- `POST /db-connector/search-places` - Search places by name
- `POST /db-connector/search-packages` - Search packages by name
- `GET /db-connector/place/:id` - Get place by ID
- `GET /db-connector/package/:id` - Get package by ID

Example API usage:
```bash
curl -X POST http://localhost:3000/api/bot1/db-connector/search-places \
  -H "Content-Type: application/json" \
  -d '{"query": "colombo"}'
```

## Troubleshooting

### Common Issues

1. **Module Not Loading**
   - Check Botpress logs for error messages
   - Ensure the module is enabled in `botpress.config.json`
   - Verify the `dist` directory exists and contains compiled files

2. **Database Connection Failed**
   - Verify database credentials in `.env` file
   - Check network connectivity to database server
   - Ensure database user has proper permissions

3. **Services Not Available in Skills**
   - Confirm module loaded successfully
   - Check that `onServerStarted` executed without errors
   - Verify Botpress version compatibility

### Debugging Steps

1. Check Botpress server logs for module loading messages
2. Test database connection independently using the test script:
   ```bash
   cd /path/to/botpress/modules/db-connector
   node test-connection.js
   ```
3. Enable verbose logging in Botpress configuration if needed

## Maintenance

### Updating the Module

To update the module:

1. Backup your current `.env` file
2. Replace the module files with the new version
3. Restore your `.env` file
4. Rebuild if TypeScript files were updated:
   ```bash
   cd /path/to/botpress/modules/db-connector
   npm install
   npx tsc
   ```
5. Restart Botpress server

### Adding New Services

To add new database services:

1. Create a new service file in `src/services/`
2. Follow the pattern in existing service files
3. Add the service to `src/index.ts`
4. Rebuild the module:
   ```bash
   npx tsc
   ```

## Security Considerations

1. **Database Credentials**
   - Store credentials securely in `.env` file
   - Restrict file permissions on `.env`
   - Use a dedicated database user with minimal required permissions

2. **API Endpoints**
   - These endpoints are exposed through Botpress API
   - Ensure Botpress API security is properly configured
   - Consider rate limiting for public endpoints

3. **Input Validation**
   - Always validate and sanitize user inputs
   - Use parameterized queries to prevent SQL injection
   - Implement proper error handling

## Performance Optimization

1. **Connection Pooling**
   - The module uses MySQL connection pooling automatically
   - Adjust `connectionLimit` in `db.config.ts` if needed

2. **Caching**
   - Consider implementing caching for frequently accessed data
   - Use Botpress built-in caching mechanisms when available

3. **Query Optimization**
   - Add database indexes for frequently queried columns
   - Optimize complex queries
   - Monitor query performance
