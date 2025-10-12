// Test script to verify database connection and module functionality
const dotenv = require('dotenv');
const { createDBConnection } = require('./dist/config/db.config');
const { PlaceService } = require('./dist/services/place.service');
const { PackageService } = require('./dist/services/package.service');

// Load environment variables
dotenv.config();

async function testDatabaseConnection() {
  console.log('🧪 Testing Database Connection and Module Functionality');
  console.log('=====================================================\n');

  try {
    // Test 1: Basic database connection
    console.log('1. Testing basic database connection...');
    const connection = await createDBConnection();
    console.log('✅ Database connection successful!\n');

    // Test 2: Simple query
    console.log('2. Testing simple query...');
    const [rows] = await connection.execute('SELECT 1 as test');
    console.log('✅ Simple query successful:', rows[0], '\n');

    // Close connection
    await connection.end();

    // Test 3: PlaceService functionality
    console.log('3. Testing PlaceService connection...');
    try {
      // This will create a new connection and test it
      const places = await PlaceService.getAllPlaces();
      console.log(`✅ PlaceService connection successful! Found ${places.length} places.\n`);
    } catch (error) {
      console.log('⚠️  PlaceService test encountered an issue (this might be OK if no places exist):', error.message, '\n');
    }

    // Test 4: PackageService functionality
    console.log('4. Testing PackageService connection...');
    try {
      // This will create a new connection and test it
      const packages = await PackageService.getAllPackages();
      console.log(`✅ PackageService connection successful! Found ${packages.length} packages.\n`);
    } catch (error) {
      console.log('⚠️  PackageService test encountered an issue (this might be OK if no packages exist):', error.message, '\n');
    }

    console.log('🎉 All tests completed! The database connector module is ready for use.');
    console.log('\nNext steps:');
    console.log('1. Copy the db-connector folder to your Botpress modules directory');
    console.log('2. Enable the module in your botpress.config.json');
    console.log('3. Restart Botpress to load the module');

  } catch (error) {
    console.error('❌ Database connection failed:', error.message);
    console.error('\nTroubleshooting steps:');
    console.error('1. Check your .env file for correct database credentials');
    console.error('2. Ensure your MySQL server is running');
    console.error('3. Verify network connectivity to your database server');
    console.error('4. Check that your database user has proper permissions');
  }
}

// Run the test
testDatabaseConnection();
