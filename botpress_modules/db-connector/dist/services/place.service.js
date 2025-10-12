"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.PlaceService = void 0;
const db_config_1 = require("../config/db.config");
class PlaceService {
    // Get all places
    static async getAllPlaces() {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM places WHERE status = "active"');
            return rows;
        }
        finally {
            await connection.end();
        }
    }
    // Get place by ID
    static async getPlaceById(id) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM places WHERE id = ? AND status = "active"', [id]);
            return rows[0];
        }
        finally {
            await connection.end();
        }
    }
    // Get places by province
    static async getPlacesByProvince(province) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM places WHERE province = ? AND status = "active"', [province]);
            return rows;
        }
        finally {
            await connection.end();
        }
    }
    // Search places by name
    static async searchPlacesByName(name) {
        const connection = await (0, db_config_1.createDBConnection)();
        try {
            const [rows] = await connection.execute('SELECT * FROM places WHERE name LIKE ? AND status = "active"', [`%${name}%`]);
            return rows;
        }
        finally {
            await connection.end();
        }
    }
}
exports.PlaceService = PlaceService;
