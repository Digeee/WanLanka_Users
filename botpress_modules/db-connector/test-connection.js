// Simple test script to verify database connection
const { createDBConnection } = require('./dist/config/db.config');

async function testConnection() {
  try {
    console.log('Testing database connection...');
    const connection = await createDBConnection();
    console.log('Connection successful!');

    // Test a simple query
    const [rows] = await connection.execute('SELECT 1 as test');
    console.log('Test query result:', rows);

    await connection.end();
    console.log('Connection closed.');
  } catch (error) {
    console.error('Connection failed:', error.message);
  }
}

testConnection();
