var editor1 = new RichTextEditor("#input_link_content");

$('#addLink').submit(function (e) {
    var name = $('#input_name').val();
    var list_actor = $('#input_list_actor').val();
    var link_save = $('#input_link_save').val();
    var link_image = $('#input_link_image').val();
    var country = $('#input_country').val();
    var keyword = $('#input_keyword').val();
    var link_content = $('#input_link_content').val();

    $.ajax({
        url: './API/Link_Add.php',
        type: 'POST',
        data: {
            name: name, 
            actors: list_actor, 
            link: link_save, 
            image: link_image,
            country: country,
            description: link_content,
            key: keyword
        },
        dataType: 'json',
        success: function(data) {
            alert(data.responseText);
        },
        error: function(data) {
            alert(data.responseText);
        }
    }).done(function(result) {
        alert(result);
    });
    e.preventDefault();
});

$.ajax({
    url: './API/GetCountries.php',
    type: 'POST',
    dataType: 'json',
    error: function(data) {
        alert(data.responseText);
    }
}).done(function(result) {
    document.getElementById("countrys").innerHTML = "";
    $.each(result, function(index, value) {
        document.getElementById("countrys").innerHTML += '<option value="'+value.trim()+'">'+value.trim()+'</option>';
    });
});

$.ajax({
    url: './API/GetActors.php',
    type: 'POST',
    dataType: 'json',
    error: function(data) {
        alert(data.responseText);
    }
}).done(function(result) {
    document.getElementById("list_actors").innerHTML = "";
    $.each(result, function(index, value) {
        document.getElementById("list_actors").innerHTML += '<option value="'+value.trim()+'">'+value.trim()+'</option>';
    });
});
