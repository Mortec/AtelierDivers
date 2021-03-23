var app = {
  init: function () {
      // ajout de la gestion de l'event click sur le bouton d'ajout de liste
      $('#addListButton').click(app.displayAddListModal);

      // en jQuery
      // Pour chaque élément dont la classe est "close"
      // on ajoute un écouteur d'événement
      $('#addListModal .close').click(app.closeAddListModal);
  },
  displayAddListModal: function () {
      // Ajout de la classe active sur l'élément #addListModal
      $('#addListModal').addClass('is-active');
  },
  closeAddListModal: function () {
      $('#addListModal').removeClass('is-active');
  }
};
// Appel de app.init au chargement du DOM
$(app.init);