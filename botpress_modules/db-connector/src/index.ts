import { createDBConnection } from './config/db.config';
import { PlaceService } from './services/place.service';
import { PackageService } from './services/package.service';

let dbConnection: any = null;

const initializeModule = async () => {
  try {
    dbConnection = await createDBConnection();
    // Using bp.logger instead of console if available, or just logging directly
    console.log('Database connector module initialized successfully');
  } catch (error: any) {
    console.error('Failed to initialize database connector module:', error);
  }
};

// Simplified types for Botpress API
interface BotpressAPI {
  events: {
    registerMiddleware: (middleware: any) => void;
  };
  http: {
    createRouterForBot: (name: string) => {
      post: (path: string, handler: Function) => void;
      get: (path: string, handler: Function) => void;
    };
  };
  logger: {
    info: (msg: string) => void;
    error: (msg: string) => void;
  };
}

const onServerStarted = async (bp: BotpressAPI) => {
  await initializeModule();

  // Make services available to Botpress
  bp.events.registerMiddleware({
    name: 'db-connector.middleware',
    order: 100,
    handler: async (event: any, next: any) => {
      // Add services to event state for use in skills
      event.state = {
        placeService: PlaceService,
        packageService: PackageService
      };
      next();
    }
  });
};

const onServerReady = async (bp: BotpressAPI) => {
  bp.logger.info('Database connector module is ready');

  // Example of how to register actions that can be used in flows
  bp.http.createRouterForBot('db-connector').post('/search-places', async (req: any, res: any) => {
    try {
      const { query } = req.body;
      const results = await PlaceService.searchPlacesByName(query);
      res.send(results);
    } catch (error: any) {
      bp.logger.error('Error searching places: ' + (error.message || error));
      res.status(500).send({ error: 'Failed to search places' });
    }
  });

  bp.http.createRouterForBot('db-connector').post('/search-packages', async (req: any, res: any) => {
    try {
      const { query } = req.body;
      const results = await PackageService.searchPackagesByName(query);
      res.send(results);
    } catch (error: any) {
      bp.logger.error('Error searching packages: ' + (error.message || error));
      res.status(500).send({ error: 'Failed to search packages' });
    }
  });

  bp.http.createRouterForBot('db-connector').get('/place/:id', async (req: any, res: any) => {
    try {
      const { id } = req.params;
      const place = await PlaceService.getPlaceById(id);
      res.send(place);
    } catch (error: any) {
      bp.logger.error('Error fetching place: ' + (error.message || error));
      res.status(500).send({ error: 'Failed to fetch place' });
    }
  });

  bp.http.createRouterForBot('db-connector').get('/package/:id', async (req: any, res: any) => {
    try {
      const { id } = req.params;
      const pkg = await PackageService.getPackageById(id);
      res.send(pkg);
    } catch (error: any) {
      bp.logger.error('Error fetching package: ' + (error.message || error));
      res.status(500).send({ error: 'Failed to fetch package' });
    }
  });
};

export { onServerStarted, onServerReady };
