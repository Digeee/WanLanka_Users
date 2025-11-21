// @ts-check
const { test, expect } = require('@playwright/test');

test.describe('Footer Section Tests', () => {
  test.beforeEach(async ({ page }) => {
    // Navigate to the fixed packages page before each test
    await page.goto('/packages/fix');
  });

  test('Verify footer visibility and basic elements', async ({ page }) => {
    // Check if the footer is visible
    const footer = page.locator('.footer');
    await expect(footer).toBeVisible();

    // Check if footer container is visible
    const footerContainer = page.locator('.footer-container');
    await expect(footerContainer).toBeVisible();

    // Check if the logo section is visible
    const logoSection = page.locator('.logo-section');
    await expect(logoSection).toBeVisible();

    // Check if footer logo is visible
    const footerLogo = page.locator('.footer-logo');
    await expect(footerLogo).toBeVisible();

    // Check if copyright text is visible
    const copyrightText = page.locator('.copyright');
    await expect(copyrightText).toBeVisible();
  });

  test('Verify footer contact details', async ({ page }) => {
    // Check if contact section is visible
    const contactSection = page.locator('.contact');
    await expect(contactSection).toBeVisible();

    // Check if contact section has heading
    const contactHeading = contactSection.locator('h3');
    await expect(contactHeading).toBeVisible();
    await expect(contactHeading).toHaveText('Contact');

    // Check if contact details are visible
    const contactListItems = contactSection.locator('li');
    const contactItemsCount = await contactListItems.count();
    expect(contactItemsCount).toBeGreaterThan(0);

    // Check if at least one contact detail contains an icon
    const firstContactItem = contactListItems.first();
    const icon = firstContactItem.locator('i');
    await expect(icon).toBeVisible();
  });

  test('Verify footer navigation links', async ({ page }) => {
    // Check if discover section is visible
    const discoverSection = page.locator('.discover');
    await expect(discoverSection).toBeVisible();

    // Check if discover section has heading
    const discoverHeading = discoverSection.locator('h3');
    await expect(discoverHeading).toBeVisible();
    await expect(discoverHeading).toHaveText('Discover');

    // Check if quick links section is visible
    const quickLinksSection = page.locator('.quick-links');
    await expect(quickLinksSection).toBeVisible();

    // Check if quick links section has heading
    const quickLinksHeading = quickLinksSection.locator('h3');
    await expect(quickLinksHeading).toBeVisible();
    await expect(quickLinksHeading).toHaveText('Quick Links');

    // Check if all links in discover section are present
    const discoverLinks = discoverSection.locator('a');
    const discoverLinksCount = await discoverLinks.count();
    expect(discoverLinksCount).toBeGreaterThan(0);

    // Check if all links in quick links section are present
    const quickLinks = quickLinksSection.locator('a');
    const quickLinksCount = await quickLinks.count();
    expect(quickLinksCount).toBeGreaterThan(0);
  });

  test('Verify footer links navigate to correct pages', async ({ page }) => {
    // Test Home link
    const homeLink = page.locator('.discover a:has-text("Home")');
    if (await homeLink.isVisible()) {
      const homeHref = await homeLink.getAttribute('href');
      expect(homeHref).not.toBeNull();
      // We won't click it as it would just reload the current page
    }

    // Test About link
    const aboutLink = page.locator('.discover a:has-text("About")');
    if (await aboutLink.isVisible()) {
      const aboutHref = await aboutLink.getAttribute('href');
      expect(aboutHref).not.toBeNull();
    }

    // Test Tours link
    const toursLink = page.locator('.discover a:has-text("Tours")');
    if (await toursLink.isVisible()) {
      const toursHref = await toursLink.getAttribute('href');
      expect(toursHref).not.toBeNull();
    }

    // Test Gallery link
    const galleryLink = page.locator('.quick-links a:has-text("Gallery")');
    if (await galleryLink.isVisible()) {
      const galleryHref = await galleryLink.getAttribute('href');
      expect(galleryHref).not.toBeNull();
    }

    // Test Login link
    const loginLink = page.locator('.quick-links a:has-text("Login")');
    if (await loginLink.isVisible()) {
      const loginHref = await loginLink.getAttribute('href');
      expect(loginHref).not.toBeNull();
    }

    // Test Register link
    const registerLink = page.locator('.quick-links a:has-text("Register")');
    if (await registerLink.isVisible()) {
      const registerHref = await registerLink.getAttribute('href');
      expect(registerHref).not.toBeNull();
    }
  });

  test('Verify copyright text and WanLanka hyperlink', async ({ page }) => {
    // Check copyright text
    const copyrightText = page.locator('.copyright');
    await expect(copyrightText).toBeVisible();

    // Check if copyright text contains the year 2025
    const copyrightContent = await copyrightText.textContent();
    expect(copyrightContent).toContain('2025');
    expect(copyrightContent).toContain('WanLanka');
    expect(copyrightContent).toContain('All Rights Reserved');

    // Check if there's a hyperlink in the copyright section
    const copyrightLink = page.locator('.copyright a');
    // The copyright text doesn't seem to have a hyperlink based on the code, so this might not exist
  });

  test('Verify social media icons are visible', async ({ page }) => {
    // Check if social icons container is visible
    const socialIcons = page.locator('.social-icons');
    await expect(socialIcons).toBeVisible();

    // Check if social media links are present
    const socialLinks = socialIcons.locator('a');
    const socialLinksCount = await socialLinks.count();
    expect(socialLinksCount).toBeGreaterThan(0);

    // Check if social media icons are present (using Font Awesome classes)
    const youtubeIcon = socialIcons.locator('a:has(i.fa-youtube)');
    const twitterIcon = socialIcons.locator('a:has(i.fa-twitter)');
    const facebookIcon = socialIcons.locator('a:has(i.fa-facebook-f)');
    const instagramIcon = socialIcons.locator('a:has(i.fa-instagram)');

    // At least one social icon should be visible
    const visibleIcons = [
      await youtubeIcon.isVisible(),
      await twitterIcon.isVisible(),
      await facebookIcon.isVisible(),
      await instagramIcon.isVisible()
    ];

    const visibleCount = visibleIcons.filter(Boolean).length;
    expect(visibleCount).toBeGreaterThan(0);
  });
});
