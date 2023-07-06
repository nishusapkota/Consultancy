$(document).ready(function() {
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
      removeItemButton: true,
      maxItemCount: -1, // Set to -1 to allow selecting any number of items
      searchResultLimit: 5,
      renderChoiceLimit: 5
    });
  });
  