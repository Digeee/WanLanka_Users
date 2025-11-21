const http = require('http');

// Check if the site is accessible
const options = {
  hostname: '127.0.0.1',
  port: 8080,
  path: '/packages/fix',
  method: 'GET'
};

const req = http.request(options, (res) => {
  console.log(`Status Code: ${res.statusCode}`);

  res.on('data', (chunk) => {
    console.log(`Body: ${chunk}`);
  });

  res.on('end', () => {
    console.log('Request completed');
  });
});

req.on('error', (error) => {
  console.error(`Problem with request: ${error.message}`);
});

req.end();
