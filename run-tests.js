const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: false }); // Set to false to see the browser
  const page = await browser.newPage();

  try {
    console.log('Navigating to http://127.0.0.1:8080/packages/fix');
    await page.goto('http://127.0.0.1:8080/packages/fix');

    console.log('Checking page title...');
    const title = await page.title();
    console.log(`Page title: ${title}`);

    console.log('Looking for package cards...');
    const packageCards = page.locator('.package-card');
    const count = await packageCards.count();
    console.log(`Found ${count} package cards`);

    if (count > 0) {
      console.log('Test PASSED: Package cards are visible');
    } else {
      console.log('Test FAILED: No package cards found');
    }

    console.log('Looking for footer...');
    const footer = page.locator('.footer');
    const footerVisible = await footer.isVisible();
    console.log(`Footer visible: ${footerVisible}`);

    if (footerVisible) {
      console.log('Test PASSED: Footer is visible');
    } else {
      console.log('Test FAILED: Footer not found');
    }

  } catch (error) {
    console.error('Test error:', error);
  } finally {
    await browser.close();
  }
})();
