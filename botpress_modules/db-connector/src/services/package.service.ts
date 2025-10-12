import { createDBConnection } from '../config/db.config';

export class PackageService {
  // Get all packages
  static async getAllPackages() {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM packages WHERE status = "active"');
      return rows as any[];
    } finally {
      await connection.end();
    }
  }

  // Get package by ID
  static async getPackageById(id: number) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM packages WHERE id = ? AND status = "active"', [id]);
      return (rows as any[])[0];
    } finally {
      await connection.end();
    }
  }

  // Get packages by type
  static async getPackagesByType(type: string) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute('SELECT * FROM packages WHERE package_type = ? AND status = "active"', [type]);
      return rows as any[];
    } finally {
      await connection.end();
    }
  }

  // Search packages by name
  static async searchPackagesByName(name: string) {
    const connection = await createDBConnection();
    try {
      const [rows] = await connection.execute(
        'SELECT * FROM packages WHERE package_name LIKE ? AND status = "active"',
        [`%${name}%`]
      );
      return rows as any[];
    } finally {
      await connection.end();
    }
  }
}
