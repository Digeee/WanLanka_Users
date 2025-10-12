import dotenv from 'dotenv';
import { createConnection } from 'mysql2/promise';

dotenv.config();

// Database configuration - adjust these values to match your Laravel database settings
const dbConfig = {
  host: process.env.DB_HOST || '127.0.0.1',
  port: parseInt(process.env.DB_PORT || '3306'),
  user: process.env.DB_USERNAME || 'root',
  password: process.env.DB_PASSWORD || '',
  database: process.env.DB_DATABASE || 'wanlanka',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
};

export const createDBConnection = async () => {
  try {
    const connection = await createConnection(dbConfig);
    console.log('Database connection established successfully');
    return connection;
  } catch (error) {
    console.error('Error connecting to database:', error);
    throw error;
  }
};
