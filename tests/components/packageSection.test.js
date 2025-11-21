// @ts-check
const { test, expect } = require('@playwright/test');

test.describe('Package Section Tests', () => {
  test.beforeEach(async ({ page }) => {
    // Navigate to the fixed packages page before each test
    await page.goto('/packages/fix');
  });

  test('Verify package section visibility and content', async ({ page }) => {
    // Check if package cards are visible
    const packageCards = page.locator('.package-card');
    await expect(packageCards.first()).toBeVisible();

    // Check if package cards have required elements
    const firstCard = packageCards.first();

    // Check package title
    const packageTitle = firstCard.locator('.package-title');
    await expect(packageTitle).toBeVisible();

    // Check package image
    const packageImage = firstCard.locator('.package-image-wrapper img');
    await expect(packageImage).toBeVisible();

    // Check package price
    const packagePrice = firstCard.locator('.package-price');
    await expect(packagePrice).toBeVisible();

    // Check "Read More" button
    const readMoreButton = firstCard.locator('.btn-read-more');
    await expect(readMoreButton).toBeVisible();
  });

  test('Verify "Read More" buttons are clickable', async ({ page }) => {
    // Find all "Read More" buttons
    const readMoreButtons = page.locator('.btn-read-more');

    // Check that at least one button exists
    await expect(readMoreButtons.first()).toBeVisible();

    // Get the first button and click it
    const firstButton = readMoreButtons.first();
    await firstButton.click();

    // Verify navigation to a package details page
    await expect(page).toHaveURL(/.*packages\/\d+/);
  });

  test('Verify clicking "Read More" navigates to correct package details page', async ({ page }) => {
    // Navigate to the fixed packages page
    await page.goto('/packages/fix');

    // Find the first "Read More" button
    const readMoreButton = page.locator('.btn-read-more').first();
    await expect(readMoreButton).toBeVisible();

    // Get the href attribute to verify the link
    const linkHref = await readMoreButton.getAttribute('href');
    expect(linkHref).not.toBeNull();

    // Click the button
    await readMoreButton.click();

    // Verify we're on a specific package page
    await expect(page).toHaveURL(/.*packages\/\d+/);
  });

  test('Verify package cards flip on hover', async ({ page }) => {
    // Navigate to the home page
    await page.goto('/');

    // Find the first package card
    const firstCard = page.locator('.offer-card').first();
    await expect(firstCard).toBeVisible();

    // Hover over the card to trigger flip animation
    await firstCard.hover();

    // Check if the card back is visible after hover
    const cardBack = firstCard.locator('.card-back');
    // Note: In Playwright, we might not be able to directly test CSS transforms
    // But we can check if the back content is accessible
    await expect(cardBack).toBeVisible();
  });

  test('Verify package navigation buttons work', async ({ page }) => {
    // Navigate to the home page
    await page.goto('/');

    // Find carousel controls
    const prevButton = page.locator('#prev-btn');
    const nextButton = page.locator('#next-btn');

    // Check if navigation buttons are visible
    await expect(prevButton).toBeVisible();
    await expect(nextButton).toBeVisible();

    // Click next button
    await nextButton.click();

    // Click previous button
    await prevButton.click();
  });
});
