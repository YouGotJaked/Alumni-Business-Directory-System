function populateIndividualBusinessFields(business) {   
    business = business[0]

    // set the text of the fields
    $("#business-name").text(business.name)
    $("#business-description").text(business.description)
    $("#business-category").text(business.category)
    $("#business-street").text(business.street)
    $("#business-city").text(business.city)
    $("#business-state").text(business.state)
    $("#business-zip").text(business.zip)
    $("#business-country").text(business.country)
}

function populateBusinessList(approved, name, category, city) {
    results = []
    
    for (var i = 0; i < approved.length; ++i) {
        if (approved[i].name.includes(name) && approved[i].category.includes(category) && approved[i].city.includes(city)) {
            results.push(approved[i])
        }
    }

    for (var i = 0; i < results.length; ++i) {
        var card_body_id = "business".concat('_', results[i].id)

        $("body").append('<div id="business_card_' + results[i].id + '" class="card border-dark mb-3 container col-4"></div>')
        $("#business_card_" + results[i].id + "").append('<div id="' + card_body_id + '" class="card-body"></div>')
        $("#" + card_body_id + "").append('<a id="business_link_' + results[i].id +'" href="individual_business.php?business_id=' + results[i].id + '"></a>')   
        $("#business_link_" + results[i].id + "").append('<h5 class="card-header bg-transparent">' + results[i].name + '</h5>')
        $("#" + card_body_id + "").append('<p class="card-body"></p>') 
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].description + '</p>') 
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].category + '</p>') 
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].city + ', ' + results[i].state + '</p>') 
    }
}