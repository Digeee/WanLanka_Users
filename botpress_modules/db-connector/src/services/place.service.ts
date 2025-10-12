import { createDBConnection } from '../config/db.config';

export class PlaceService {
  // Get all places
  static async getAllPlaces() {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM places WHERE status = "active"');
      return rows as any[];
    } finally {
      await connection.end();
    }
  }

  // Get place by ID
  static async getPlaceById(id: number) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM places WHERE id = ? AND status = "active"', [id]);
      return (rows as any[])[0];
    } finally {
      await connection.end();
    }
  }

  // Get places by province
  static async getPlacesByProvince(province: string) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM places WHERE province = ? AND status = "active"', [province]);
      return rows as any[];
    } finally {
      await connection.end();
    }
  }

  // Search places by name
  static async searchPlacesByName(name: string) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute(
        'SELECT * FROM places WHERE name LIKE ? AND status = "active"',
        [`%${name}%`]
      );
      return rows as any[];
    } finally {
      await connection.end();
    }
  }
}
