const { exec } = require('child_process');
const fs = require('fs');

// Check if dist directory exists, if not create it
if (!fs.existsSync('./dist')) {
  fs.mkdirSync('./dist');
}

// Compile TypeScript
exec('npx tsc', (error, stdout, stderr) => {
  if (error) {
    console.error(`Error compiling TypeScript: ${error}`);
    return;
  }
  if (stderr) {
    console.error(`stderr: ${stderr}`);
  }
  console.log('TypeScript compilation completed successfully');
  console.log(stdout);
});
