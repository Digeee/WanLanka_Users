"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.PackageService = void 0;
const db_config_1 = require("../config/db.config");
class PackageService {
    // Get all packages
    static async getAllPackages() {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM packages WHERE status = "active"');
            return rows;
        }
        finally {
            await connection.end();
        }
    }
    // Get package by ID
    static async getPackageById(id) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM packages WHERE id = ? AND status = "active"', [id]);
            return rows[0];
        }
        finally {
            await connection.end();
        }
    }
    // Get packages by type
    static async getPackagesByType(type) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM packages WHERE package_type = ? AND status = "active"', [type]);
            return rows;
        }
        finally {
            await connection.end();
        }
    }
    // Search packages by name
    static async searchPackagesByName(name) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM packages WHERE package_name LIKE ? AND status = "active"', [`%${name}%`]);
            return rows;
        }
        finally {
            await connection.end();
        }
    }
}
exports.PackageService = PackageService;
