"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.createDBConnection = void 0;
const dotenv_1 = __importDefault(require("dotenv"));
const promise_1 = require("mysql2/promise");
dotenv_1.default.config();
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
const createDBConnection = async () => {
    try {
        const connection = await (0, promise_1.createConnection)(dbConfig);
        console.log('Database connection established successfully');
        return connection;
    }
    catch (error) {
        console.error('Error connecting to database:', error);
        throw error;
    }
};
exports.createDBConnection = createDBConnection;
