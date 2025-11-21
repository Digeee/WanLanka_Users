const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: false });
  const page = await browser.newPage();

  try {
    console.log('Navigating to http://127.0.0.1:8080/packages/fix');
    await page.goto('http://127.0.0.1:8080/packages/fix', { waitUntil: 'networkidle' });

    console.log('Page loaded successfully');

    // Check page title
    const title = await page.title();
    console.log(`Page title: ${title}`);

    // Check for package cards
    const packageCards = page.locator('.package-card');
    const count = await packageCards.count();
    console.log(`Found ${count} package cards`);

    if (count > 0) {
      console.log('✓ Package cards found');
    } else {
      console.log('✗ No package cards found');
    }

    // Check for footer
    const footer = page.locator('.footer');
    const isFooterVisible = await footer.isVisible();
    console.log(`Footer visible: ${isFooterVisible}`);

    if (isFooterVisible) {
      console.log('✓ Footer found');
    } else {
      console.log('✗ Footer not found');
    }

  } catch (error) {
    console.error('Error:', error.message);
  } finally {
    await browser.close();
  }
})();
