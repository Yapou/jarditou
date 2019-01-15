$(document).ready(function() {//Début ready

    //Sous-cat avec $.post
    $('#pcat').on("change", function() {
        var subCat = $(this).find('option:selected').val();
        $.post("http://localhost/ci/index.php/produits/subcat", "cat_id=" + subCat,
                //Envoie en post ce que je stock dans catId (récup ensuite avec $_POST['catId'])
                        function(response) {
                            console.log(response);
                            $("#psubcat").html(response);
                        }
                );
            });//Sous-cat

});//fin ready


// $(document).ready(function() {
//
//
//
//
//     $("#pcat").change(function() { //Quand on change l'option du champ cat
//
//
//
//         var cat_id = $(this).val(); //Récupération de la valeur de cat_id
//         $.post({
//             url: baseURL + 'subCat', //Definition de l'url
//             data: {
//                 cat_id: cat_id
//             }
//             ,
//             success: function(result) //En cas de succes
//             {
//                 var contenu = '';
//                 $.each(JSON.parse(result), function(key, val) { // parse Car ca  ne marche que sur les objets
//                     contenu += "<option value='" + val.cat_id + "'>" + val.cat_nom + "</option>"; //Formatage de la réponse HTML
//                 });
//                 $("#sousCat").html(contenu); //On charge le contenu dans le champ sousCat
//             }//function(result)
//
//         }); //post
//
//         return false;
//     });
// }); //ready
