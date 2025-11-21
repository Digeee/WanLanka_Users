const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();

  try {
    console.log('Testing connection to http://127.0.0.1:8080/packages/fix');
    const response = await page.goto('http://127.0.0.1:8080/packages/fix');
    console.log('Response status:', response.status());

    const title = await page.title();
    console.log('Page title:', title);

    // Simple check for content
    const content = await page.content();
    const hasPackage = content.includes('package');
    console.log('Page contains "package":', hasPackage);

    console.log('Test completed successfully!');
  } catch (error) {
    console.error('Test failed:', error.message);
  } finally {
    await browser.close();
  }
})();
