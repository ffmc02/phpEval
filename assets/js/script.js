//---------------------------------------------inscription connexion
$('#registration').show();
$('#connexion').hide();
$('.btnRegistration').hide();
$('.btnExistCompt').show();
//$('.btnExistCompt').hide();
//$('#registration').hide();
$('.btnRegistration').click(function () {
    $('#registration').show();
    $('#connexion').hide();
    $('.btnRegistration').hide();
    $('.btnExistCompt').show();
});

$('.btnExistCompt').click(function () {
    $('#registration').hide();
    $('#connexion').show();
    $('.btnRegistration').show();
    $('.btnExistCompt').hide();
});
//recuperation  de l'url pour bloquer la pages
//-------------------------------------------gestion du formulaire ajout d'un utilisateur 
$("#addUser").submit(function (e) {
    var envoi = true,
            //définition des regexs
            regexTitle = /^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/,
            regexMail = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/,
            //recupération des valeurs des inputs
            surname = $('#surname').val(),
            firstname = $('#firstname').val(),
            email = $('#email').val(),
            password = $('#password').val(),
            password2 = $('#password2').val(),
            // definition des variables d'erreurs
            firstname1 = 'veuillez rentrer votre Prénom!!',
            firstname2 = 'merci de ne rentrer que des caractères Alphabétiques!!!!',
            surname1 = 'Merci de remplir votre Nom de famille!!',
            surname2 = 'merci de ne rentrer que des caractères Alphabétiques!!!!',
            email1 = 'Merci de remplir votre email',
            email2 = 'Merci de remplir avec une adresse mail correcte de type: nom.prenom@domaine.fr !!!!',
            password1 = 'Merci de remplir votre mot de passe!',
            password3 = 'Merci de remplir la confirmation de votre mot de passe',
            password4 = 'attention les mots de passe ne sont pas identiques!!! ',
            messageRest = '';
    //vérification du formulaire 
    if (surname == '') {
        envoi = false;
        $('#surnameError').text(surname1);
    } else if (!regexTitle.test(surname)) {
        envoi = false;
        $('#surnameError').text(surname2);
    } else {
        $('#surnameError').text(messageRest);
    }
    if (firstname == '') {
        envoi = false;
        $('#firstnameError').text(firstname1);

    } else if (!regexTitle.test(firstname)) {
        envoi = false;
        $('#firstnameError').text(firstname2);
    } else {
        $('#firstnameError').text(messageRest);
    }
    if (email == '') {
        envoi = false;
        $('#mailError').text(email1);
    } else if (!regexMail.test(email)) {
        envoi = false;
        $('#mailError').text(email2);
    } else {
        $('#mailError').text(messageRest);
    }
    if (password == '') {
        envoi = false;
        $('#passwordError').text(password1);
    } else if (password2 == '') {
        envoi = false;
        $('#passwordError2').text(password3);
    } else if (password != password2) {
        $('#passwordError').text(password4);
        $('#passwordError2').text(password4);
        envoi = false;
    } else {
        $('#passwordError').text(messageRest);
        $('#passwordError2').text(messageRest);
    }
    if (envoi == true) {
        alert('Votre formulaire a bien été envoyé au service client de l\'entreprise');
    } else {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});
//formulaire de connexion d'un  utilisateur 
$('#userConnect').submit(function (e) {
    var envoi = true,
            //recupération des valeures de l'inputs mis en variable.
            email = $('#Email5').val(),
            password = $('#loginPassWord').val(),
            //definition des regex
            regexMail = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/,
            //définition des messages d'erreurs
            email1 = 'Merci de remplir votre email',
            email2 = 'Merci de remplir avec une adresse mail correcte de type: nom.prenom@domaine.fr !!!!',
            password1 = 'Merci de remplir votre mot de passe!',
            messageRest = '';

    if (email == '') {
        envoi = false;
        $('#loginemailError').text(email1);
        $('#registration').hide();
        $('#connexion').show();
        $('.btnRegistration').show();
        $('.btnExistCompt').hide();
    } else if (!regexMail.test(email)) {
        envoi = false;
        $('#loginemailError').text(email2);
        $('#registration').hide();
        $('#connexion').show();
        $('.btnRegistration').show();
        $('.btnExistCompt').hide();
    } else {
        $('#loginemailError').text(messageRest);
    }
    if (password == '') {
        envoi = false;
        $('#loginPasswordError2').text(password1);
        $('#registration').hide();
        $('#connexion').show();
        $('.btnRegistration').show();
        $('.btnExistCompt').hide();
    } else {
        $('#loginPasswordError2').text(messageRest);
    }

    //    Si aucune erreur d'input est prÃƒÂ©sente alors j'affiche un message de succÃƒÂ¨s et une alert sinon je bloque l'envoi du formulaire'.
    if (envoi == true) {
        $('#succesForm').text(SuccessForm);
//        alert('Votre formulaire a bien été envoyer au service client de l\'entreprise');
    } else {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});

//formulaire d'ajout d'un vinyle
$('#formAddDisc').submit(function (e) {
    var envoi = true,
            // je mets mes regex dans des variables
            regexTitle = /^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/,
            regexYears = /^(\d{4})$/,
            regexPrice = /^(\d{1,6})[.,](\d{0,2})$/,
            regexId = /^\d+$/,
            //je recupéres les valeurs des id 
            title = $('#title').val(),
            artist = $('#Artist').val(),
            year = $('#year').val(),
            genre = $('#genre').val(),
            label = $('#label').val(),
            price = $('#price').val(),
            picture = $('#picture').val(),
            // définition des valriables d'erreur.
            title1 = 'Merci de rentrer un titre',
            title2 = 'Merci de ne mettre que des caractères alphabétiques!!!!',
            artist1 = 'Merci de sélectionner un artiste dans la liste!',
            year1 = 'merci de remplir le champ Year',
            year2 = 'Merci de ne mettre que des chiffres ',
            year3 = 'Merci de mettre une date située entre 1960 et 2020',
            genre1 = 'Merci de remplir le champ Genre',
            genre2 = 'Merci de ne mettre que des caractères alphabétiques!!!',
            label1 = 'Merci de remplir le champ Label!!',
            label2 = 'Merci de ne mettre que des caractères alphabétiques!!!',
            price1 = 'Merci de remplir le champ price',
            price2 = 'Merci de metre des nombres comme suit : 1.2 2.22 22222.2 22 etc ',
            picture1 = 'Merci de télécharger un fichier photo',
            SuccessForm = 'test',
            messageRest = '';
    if (title == '') {
        envoi = false;
        $('#titre').text(title1);
    } else if (!regexTitle.test(title)) {
        envoi = false;
        $('#titre').text(title2);
    } else {
        $('#titre').text(messageRest);
    }
    if (artist == '0') {
        envoi = false;
        $('#artist').text(artist1);
    } else if (!regexId.test(artist)) {
        envoi = false;
        $('#artist').text(artist1);
    } else {
        $('#artist').text(messageRest);
    }
    if (year == '') {
        envoi = false;
        $('#Year').text(year1);
    } else if (!regexYears.test(year)) {
        envoi = false;
        $('#Year').text(year2)
    } else if (year <= 1960 && year >= 2020) {
        envoi = false;
        $('#Year').text(year3);
    } else {
        $('#Year').text(messageRest);
    }
    if (genre == '') {
        envoi = false;
        $('#Genre').text(genre1);
    } else if (!regexTitle.test(genre)) {
        envoi = false;
        $('#Genre').text(genre2);
    } else {
        $('#Genre').text(messageRest);
    }
    if (label == '') {
        envoi = false;
        $('#Label').text(label1)
    } else if (!regexTitle.test(label)) {
        envoi = false;
        $('#Label').text(label2);
    } else {
        $('#Label').text(messageRest);
    }
    if (price == '') {
        envoi = false;
        $('#Price').text(price1)
    } else if (!regexPrice.test(price)) {
        envoi = false;
        $('#Price').text(price2);
    } else {
        $('#Price').text(messageRest);
    }
    if (picture == '') {
        envoi = false;
        $('#Picture').text(picture1)
    } else {
        $('#Picture').text(messageRest);
    }

    ;
//    Si aucune erreur d'input est prÃƒÂ©sente alors j'affiche un message de succÃƒÂ¨s et une alert sinon je bloque l'envoi du formulaire'.
    if (envoi == true) {
        $('#succesForm').text(SuccessForm);
//        alert('Votre formulaire a bien été envoyer au service client de l\'entreprise');
    } else {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});
//formulaire de modification
$('#formModifyDisc').submit(function (e) {
    var envoi = true,
            // je mets mes regex dans des variables
            regexTitle = /^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/,
            regexYears = /^(\d{4})$/,
            regexPrice = /^(\d{1,6})[.,](\d{0,2})$/,
            regexId = /^\d+$/,
            //je recupéres les valeurs des id 
            title = $('#title').val(),
            artist = $('#Artist').val(),
            year = $('#year').val(),
            genre = $('#genre').val(),
            label = $('#label').val(),
            price = $('#price').val(),
            picture = $('#picture').val(),
            // définition des valriables d'erreur.
            title1 = 'Merci de rentrer un titre',
            title2 = 'Merci de ne mettre que des caractères alphabétiques!!!!',
            artist1 = 'Merci de sélectionner un artiste dans la liste!',
            year1 = 'merci de remplir le champ Year',
            year2 = 'Merci de ne mettre que des chiffres ',
            year3 = 'Merci de mettre une date située entre 1960 et 2020',
            genre1 = 'Merci de remplir le champ Genre',
            genre2 = 'Merci de ne mettre que des caractères alphabétiques!!!',
            label1 = 'Merci de remplir le champ Label!!',
            label2 = 'Merci de ne mettre que des caractères alphabétiques!!!',
            price1 = 'Merci de remplir le champ price',
            price2 = 'Merci de metre des nombres comme suit : 1.2 2.22 22222.2 22 etc ',
            picture1 = 'Merci de télécharger un fichier photo',
            SuccessForm = 'test',
            messageRest = '';
    if (title == '') {
        envoi = false;
        $('#titre').text(title1);
    } else if (!regexTitle.test(title)) {
        envoi = false;
        $('#titre').text(title2);
    } else {
        $('#titre').text(messageRest);
    }
    if (artist == '0') {
        envoi = false;
        $('#artist').text(artist1);
    } else if (!regexId.test(artist)) {
        envoi = false;
        $('#artist').text(artist1);
    } else {
        $('#artist').text(messageRest);
    }
    if (year == '') {
        envoi = false;
        $('#Year').text(year1);
    } else if (!regexYears.test(year)) {
        envoi = false;
        $('#Year').text(year2)
    } else if (year <= 1960 && year >= 2020) {
        envoi = false;
        $('#Year').text(year3);
    } else {
        $('#Year').text(messageRest);
    }
    if (genre == '') {
        envoi = false;
        $('#Genre').text(genre1);
    } else if (!regexTitle.test(genre)) {
        envoi = false;
        $('#Genre').text(genre2);
    } else {
        $('#Genre').text(messageRest);
    }
    if (label == '') {
        envoi = false;
        $('#Label').text(label1)
    } else if (!regexTitle.test(label)) {
        envoi = false;
        $('#Label').text(label2);
    } else {
        $('#Label').text(messageRest);
    }
    if (price == '') {
        envoi = false;
        $('#Price').text(price1)
    } else if (!regexPrice.test(price)) {
        envoi = false;
        $('#Price').text(price2);
    } else {
        $('#Price').text(messageRest);
    }
    if (picture == '') {
        envoi = false;
        $('#Picture').text(picture1)
    } else {
        $('#Picture').text(messageRest);
    }
//    Si aucune erreur d'input est prÃƒÂ©sente alors j'affiche un message de succÃƒÂ¨s et une alert sinon je bloque l'envoi du formulaire'.
    if (envoi == true) {
        $('#succesForm').text(SuccessForm);
//        alert('Votre formulaire a bien été envoyer au service client de l\'entreprise');
    } else {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});
// formulaire de contact


$('#contactForm').submit(function (e) {
    
    var envoi = true,
            //je recupéres les valeurs des id 
            surname = $('#surname').val(),
            firstname = $('#firstname').val(),
            email = $('#emailContact').val(),
            subject = $('#subject').val(),
            message = $('#message').val(),
            // je mets mes regex dans des variables
            regexMail = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/,
            surname1 = 'Merci de remplir votre Nom de famille!!',
            firstname1 = 'veuillez rentrer votre Prénom!!',
            email1 = 'Merci de remplir votre email',
            email2 = 'Merci de remplir avec une adresse mail correcte de type: nom.prenom@domaine.fr !!!!',
            subject1 = 'Vous avez oublié de remplir votre sujet!!!!',
            message = 'Vous avez oublié de remplr le contenu de votre mail!!!!',
            messageRest = '';
    if (surname == '') {
        envoi = true;
        $('#errorSurname').text(surname1);
    } else {
        $('#errorSurname').text(messageRest);
    }
    if (firstname == '') {
        envoi = true;
        $('#errorFirstname').text(firstname1);
    } else {
        $('#errorFirstname').text(messageRest);
    }
    if (email == '') {
        envoi = false;
        $('#errorMail').text(email1);
    } else if (!regexMail.test(email)) {
        envoi = false;
        $('#errorMail').text(email2);
    } else {
        $('#errorMail').text(messageRest);
    }
    if(subject == ''){
        envoi = false;
        $('#errorSubject').text(subject1); 
    }else{
        $('#errorSubject').text(messageRest);
    }
    if(message==''){
        envoi=false;
         $('#messageError').text(subject1); 
    }else{
        
    }
    //    Si aucune erreur d'input est prÃƒÂ©sente alors j'affiche un message de succÃƒÂ¨s et une alert sinon je bloque l'envoi du formulaire'.
    if (envoi == true) {
        alert('Votre formulaire a bien été envoyé à gaetan Jonard');
    } else {
        alert('erreur dans un champ merci de vous reporter à  la ligne en rouge!:!');
        return false;
        e.preventDefault();
    }
});
// test affichage de l'image telecherger
// On image change
  image.addEventListener("change", function () {
    // Creates a new FileReader
    const reader = new FileReader();

    // Handles reader on load event
    reader.onload = function (e) {
      // Sets the image preview src to the current image being selected
      imagePreview.src = e.target.result;
    };

    // Reads the file as a data URL
    reader.readAsDataURL(this.files[0]);
  });
