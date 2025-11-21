# Playwright Component Tests for WanLanka

This directory contains automated tests for the WanLanka website using Playwright.

## Test Structure

- `components/packageSection.test.js` - Tests for the Package Section
- `components/footerSection.test.js` - Tests for the Footer Section

## Prerequisites

1. Make sure you have Node.js installed
2. Install project dependencies:
   ```bash
   npm install
   ```

## Running Tests

### Run all tests
```bash
npm run test
```

### Run tests in UI mode (for development)
```bash
npm run test:ui
```

### Run specific test file
```bash
npx playwright test tests/components/packageSection.test.js
npx playwright test tests/components/footerSection.test.js
```

## Test Reports

After running tests, you can view the HTML report:
```bash
npm run test:report
```

## What's Tested

### Package Section Tests
1. Verify package headings, images, descriptions, and amounts are visible
2. Verify "Read More" buttons are visible and clickable
3. Verify clicking "Read More" navigates to the correct package details page
4. Verify package cards flip on hover
5. Verify package navigation buttons work

### Footer Section Tests
1. Verify footer visibility, logo, contact details, email, and phone number
2. Verify all footer links navigate to the correct pages (Home, About Us, Testimonials, Book Now, FAQ)
3. Verify the copyright text and WanLanka hyperlink
4. Verify social media icons are visible

## Configuration

The tests are configured in `playwright.config.js` with:
- Base URL set to `http://localhost:8080`
- Screenshots on failure
- HTML reporter
- Support for Chromium, Firefox, and WebKit browsers

## Test Environment

Make sure your WanLanka website is running locally at `http://localhost:8080` before running tests.
