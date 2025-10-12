# Botpress Database Connector Setup Instructions

## Congratulations!

You've successfully created a custom Botpress module that connects your chatbot to your Laravel MySQL database. This will enable your chatbot to access real-time data from your application.

## Next Steps

### 1. Update Database Configuration

First, you need to update the database configuration with your actual credentials:

1. Open the file: `botpress_modules/db-connector/.env`
2. Update the following values to match your Laravel database configuration:
   ```
   DB_HOST=127.0.0.1          # Your database host
   DB_PORT=3306               # Your database port
   DB_USERNAME=your_username  # Your database username
   DB_PASSWORD=your_password  # Your database password
   DB_DATABASE=wanlanka       # Your Laravel database name
   ```

### 2. Test Database Connection

Before integrating with Botpress, test the database connection:

1. Open a terminal/command prompt
2. Navigate to the module directory:
   ```
   cd botpress_modules/db-connector
   ```
3. Run the test:
   ```
   npm test
   ```

If the test fails, double-check your database credentials in the `.env` file.

### 3. Integrate with Botpress

1. Copy the entire `db-connector` folder to your Botpress modules directory:
   ```
   /path/to/your/botpress/modules/db-connector
   ```

2. Edit your Botpress configuration file (`botpress.config.json`) to enable the module:
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

3. Restart your Botpress server to load the module.

### 4. Use in Botpress Skills

Once the module is loaded, you can access the database services in your Botpress skills:

```javascript
// Search for places
const places = await event.state.placeService.searchPlacesByName("colombo");

// Get a specific package
const pkg = await event.state.packageService.getPackageById(123);

// Get all places in a province
const places = await event.state.placeService.getPlacesByProvince("Western");
```

### 5. Example Skills

Look at the example skills in:
- `botpress_modules/db-connector/examples/botpress-skill-example.js`

These provide complete examples of how to use the database services in your Botpress skills.

## Documentation

For more detailed information, refer to:
- `botpress_modules/db-connector/README.md` - Basic module documentation
- `botpress_modules/db-connector/INTEGRATION_GUIDE.md` - Detailed integration instructions
- `botpress_modules/db-connector/DEPLOYMENT_GUIDE.md` - Deployment and maintenance guide

## Support

If you encounter any issues:
1. Check the Botpress logs for error messages
2. Verify your database credentials in the `.env` file
3. Test the database connection independently using `npm test`
4. Ensure all dependencies are properly installed

## Customization

You can extend the module by:
1. Adding new services in `src/services/`
2. Modifying existing services to match your database schema
3. Adding new API endpoints in `src/index.ts`

Remember to rebuild the module after making changes:
```
cd botpress_modules/db-connector
npm run build
```

## Security Notes

1. Keep your `.env` file secure and never commit it to version control
2. Use a dedicated database user with minimal required permissions
3. Consider implementing additional security measures for production use
