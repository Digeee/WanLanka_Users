// @ts-check
const { test, expect } = require('@playwright/test');

test('Basic page load test', async ({ page }) => {
  // Navigate to the fixed packages page
  await page.goto('/packages/fix');

  // Check if the page title contains "Fixed Packages"
  await expect(page).toHaveTitle(/Fixed Packages/);

  // Check if package cards are visible
  const packageCards = page.locator('.package-card');
  await expect(packageCards.first()).toBeVisible();

  console.log('Basic test passed!');
});
