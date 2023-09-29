DICTIONNAIRE



ENTITE:


    ARTICLE: titre, descriptionCourte, textArticle, image

    COMMENTAIRE: texteCommentaire

    UTILISATEUR: nom, prenom, motDePasse, email

    ROLE: membre, gestionnaire



RELATIONS:

    Un ARTICLE est ecrit par un minimum 1 UTILISATEUR et au maximum 1 UTILISATEUR
    un UTILISATEUR peut ecrere au minimum 0 ARTICLE et au maximum N ARTICLEs

    un COMMENTAIRE est ecrit par au minimum 1 UTILISATEUR et au maximum 1 UTILISATEUR
    un UTILISATEUR peut ecrire au minimum 0 COMMENTAIRE et au maximum N COMMENTAIREs

    un COMMENTAIRE concerne au minimum 1 ARTICLE et au maximum 1 ARTICLE
    un ARTICLE peut etre concerne par au minimum 0 COMMENTAIRE et au maximum N COMMENTAIRE

    un UTILISATEUR possede au minimum 1 ROLE et au maximum 1 ROLE
    un ROLE peut etre attribue au minimum a 0 UTILISATEUR et au maximum a N UTILISATEURs
