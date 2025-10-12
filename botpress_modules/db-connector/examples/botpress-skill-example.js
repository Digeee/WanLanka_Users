// Example Botpress skill using the database connector module
// Place this file in your bot's skills directory

/**
 * Place Search Skill
 * This skill demonstrates how to use the PlaceService to search for places
 */
async function placeSearchSkill(event, context) {
  const bp = context.bp;

  // Extract search term from user input
  const searchTerm = event.preview.trim();

  if (!searchTerm) {
    await bp.cms.renderElement('builtin_text', {
      text: 'Please provide a place name to search for.',
      typing: true
    }, event);
    return;
  }

  try {
    // Access the PlaceService through event state
    const places = await event.state.placeService.searchPlacesByName(searchTerm);

    if (places && places.length > 0) {
      // Format the response
      let responseText = `I found ${places.length} place(s) matching "${searchTerm}":\n\n`;

      // Limit to first 5 results for readability
      const displayPlaces = places.slice(0, 5);

      displayPlaces.forEach((place, index) => {
        responseText += `${index + 1}. ${place.name}\n`;
        responseText += `   Location: ${place.province}\n`;
        if (place.price) {
          responseText += `   Price: Rs ${parseFloat(place.price).toFixed(2)}\n`;
        }
        responseText += '\n';
      });

      if (places.length > 5) {
        responseText += `... and ${places.length - 5} more places.\n`;
      }

      responseText += 'Would you like more details about any specific place?';

      await bp.cms.renderElement('builtin_text', {
        text: responseText,
        typing: true
      }, event);
    } else {
      await bp.cms.renderElement('builtin_text', {
        text: `Sorry, I couldn't find any places matching "${searchTerm}". Please try a different search term.`,
        typing: true
      }, event);
    }
  } catch (error) {
    console.error('Error in place search skill:', error);
    await bp.cms.renderElement('builtin_text', {
      text: 'Sorry, I encountered an error while searching for places. Please try again later.',
      typing: true
    }, event);
  }
}

/**
 * Package Details Skill
 * This skill demonstrates how to use the PackageService to get package details
 */
async function packageDetailsSkill(event, context) {
  const bp = context.bp;

  // Extract package ID from intent slots or user input
  let packageId = null;

  // Try to get from NLU slots first
  if (event.nlu && event.nlu.slots && event.nlu.slots.packageId) {
    packageId = event.nlu.slots.packageId.value;
  }

  // Fallback to extracting from text if not in slots
  if (!packageId) {
    const text = event.preview.toLowerCase();
    const idMatch = text.match(/package (\d+)/) || text.match(/id (\d+)/);
    if (idMatch) {
      packageId = idMatch[1];
    }
  }

  if (!packageId) {
    await bp.cms.renderElement('builtin_text', {
      text: 'Please provide a package ID to look up. For example: "Show me package 123"',
      typing: true
    }, event);
    return;
  }

  try {
    // Access the PackageService through event state
    const pkg = await event.state.packageService.getPackageById(packageId);

    if (pkg) {
      // Format the response
      let responseText = `📦 Package Details\n\n`;
      responseText += `Name: ${pkg.package_name}\n`;
      responseText += `Type: ${pkg.package_type}\n`;
      if (pkg.price) {
        responseText += `Price: Rs ${parseFloat(pkg.price).toFixed(2)}\n`;
      }
      if (pkg.description) {
        responseText += `Description: ${pkg.description}\n`;
      }

      await bp.cms.renderElement('builtin_text', {
        text: responseText,
        typing: true
      }, event);
    } else {
      await bp.cms.renderElement('builtin_text', {
        text: `Sorry, I couldn't find a package with ID ${packageId}.`,
        typing: true
      }, event);
    }
  } catch (error) {
    console.error('Error in package details skill:', error);
    await bp.cms.renderElement('builtin_text', {
      text: 'Sorry, I encountered an error while fetching package details. Please try again later.',
      typing: true
    }, event);
  }
}

/**
 * List All Places Skill
 * This skill demonstrates how to use the PlaceService to get all places
 */
async function listAllPlacesSkill(event, context) {
  const bp = context.bp;

  try {
    // Access the PlaceService through event state
    const places = await event.state.placeService.getAllPlaces();

    if (places && places.length > 0) {
      // Format the response
      let responseText = `Here are all available places:\n\n`;

      // Limit to first 10 results for readability
      const displayPlaces = places.slice(0, 10);

      displayPlaces.forEach((place, index) => {
        responseText += `${index + 1}. ${place.name} (${place.province})\n`;
      });

      if (places.length > 10) {
        responseText += `\n... and ${places.length - 10} more places.`;
      }

      responseText += '\n\nYou can ask for details about any specific place!';

      await bp.cms.renderElement('builtin_text', {
        text: responseText,
        typing: true
      }, event);
    } else {
      await bp.cms.renderElement('builtin_text', {
        text: 'No places are currently available.',
        typing: true
      }, event);
    }
  } catch (error) {
    console.error('Error in list all places skill:', error);
    await bp.cms.renderElement('builtin_text', {
      text: 'Sorry, I encountered an error while fetching the list of places. Please try again later.',
      typing: true
    }, event);
  }
}

// Export the skills
module.exports = {
  placeSearchSkill,
  packageDetailsSkill,
  listAllPlacesSkill
};
