// Example Botpress skill using the database connector module
// This file should be placed in your Botpress bot's skills directory

/**
 * Search for packages by name
 * @param {string} searchTerm - The term to search for
 * @returns {Array} Array of matching packages
 */
const searchPackages = async (searchTerm) => {
  // In a real Botpress skill, you would access the service like this:
  // const packages = await event.state.packageService.searchPackagesByName(searchTerm);
  // return packages;

  // For demonstration purposes, we're just showing the structure
  console.log(`Searching for packages with term: ${searchTerm}`);
  return [];
};

/**
 * Get package details by ID
 * @param {number} packageId - The ID of the package to retrieve
 * @returns {Object} Package details
 */
const getPackageDetails = async (packageId) => {
  // In a real Botpress skill, you would access the service like this:
  // const pkg = await event.state.packageService.getPackageById(packageId);
  // return pkg;

  // For demonstration purposes, we're just showing the structure
  console.log(`Getting details for package ID: ${packageId}`);
  return {};
};

module.exports = {
  searchPackages,
  getPackageDetails
};
