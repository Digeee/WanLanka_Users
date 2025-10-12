"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.onServerReady = exports.onServerStarted = void 0;
const db_config_1 = require("./config/db.config");
const place_service_1 = require("./services/place.service");
const package_service_1 = require("./services/package.service");
let dbConnection = null;
const initializeModule = async () => {
    try {
        dbConnection = await (0, db_config_1.createDBConnection)();
        // Using bp.logger instead of console if available, or just logging directly
        console.log('Database connector module initialized successfully');
    }
    catch (error) {
        console.error('Failed to initialize database connector module:', error);
    }
};
const onServerStarted = async (bp) => {
    await initializeModule();
    // Make services available to Botpress
    bp.events.registerMiddleware({
        name: 'db-connector.middleware',
        order: 100,
        handler: async (event, next) => {
            // Add services to event state for use in skills
            event.state = {
                placeService: place_service_1.PlaceService,
                packageService: package_service_1.PackageService
            };
            next();
        }
    });
};
exports.onServerStarted = onServerStarted;
const onServerReady = async (bp) => {
    bp.logger.info('Database connector module is ready');
    // Example of how to register actions that can be used in flows
    bp.http.createRouterForBot('db-connector').post('/search-places', async (req, res) => {
        try {
            const { query } = req.body;
            const results = await place_service_1.PlaceService.searchPlacesByName(query);
            res.send(results);
        }
        catch (error) {
            bp.logger.error('Error searching places: ' + (error.message || error));
            res.status(500).send({ error: 'Failed to search places' });
        }
    });
    bp.http.createRouterForBot('db-connector').post('/search-packages', async (req, res) => {
        try {
            const { query } = req.body;
            const results = await package_service_1.PackageService.searchPackagesByName(query);
            res.send(results);
        }
        catch (error) {
            bp.logger.error('Error searching packages: ' + (error.message || error));
            res.status(500).send({ error: 'Failed to search packages' });
        }
    });
    bp.http.createRouterForBot('db-connector').get('/place/:id', async (req, res) => {
        try {
            const { id } = req.params;
            const place = await place_service_1.PlaceService.getPlaceById(id);
            res.send(place);
        }
        catch (error) {
            bp.logger.error('Error fetching place: ' + (error.message || error));
            res.status(500).send({ error: 'Failed to fetch place' });
        }
    });
    bp.http.createRouterForBot('db-connector').get('/package/:id', async (req, res) => {
        try {
            const { id } = req.params;
            const pkg = await package_service_1.PackageService.getPackageById(id);
            res.send(pkg);
        }
        catch (error) {
            bp.logger.error('Error fetching package: ' + (error.message || error));
            res.status(500).send({ error: 'Failed to fetch package' });
        }
    });
};
exports.onServerReady = onServerReady;
