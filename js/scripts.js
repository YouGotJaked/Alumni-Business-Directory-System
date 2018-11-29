/* 
    DESCRIPTION: This file handles functionality for the individual business and users pages as well as the 
    business and user list pages. The functions mainly add new content to the page.
*/

/* 
    NAME: populateIndividualBusinessFields
    PARAMETERS:
        business (Array): An array with a single JSON object representing the business details
        owner (Array): An array with a single JSON object representing the owner details
    RETURNS: none
    DESCRIPTION: When the individual business page loads, this function will take business and owner data and populate the 
        corresponding div elements in the DOM with the correct information.
*/
function populateIndividualBusinessFields(business, owner) {
    business = business[0]
    owner = owner[0]

    // set the text of the fields
    $("#business-name").text(business.name)
    $("#business-description").text(business.description)
    $("#business-category").text(business.category)
    $("#business-street").text(business.street)
    $("#business-city").text(business.city)
    $("#business-state").text(business.state)
    $("#business-zip").text(business.zip)
    $("#business-country").text(business.country)

    $(".container").append('<a href="individual_user.php?user_id=' + owner.id + '" id="business-owner">' + owner.first_name + " " + owner.last_name + '</a>')
}

/* 
    NAME: populateBusinessList
    PARAMETERS:
        approved (Array): An array with multiple JSON objects representing businesses
        name (String): A string of the name the user searched for
        category (String): A string of the category the user searched for
        city (String): A string of the city the user searched for
    RETURNS: none
    DESCRIPTION: This function takes an array of all approved businesses from the database and creates new cards in the HTML body.
        Each of the cards have some information about the business. The actor can click on the card to access even more information. 
        The cards are only added to the HTML body if their data matches the name, category, and city parameters.
*/
function populateBusinessList(approved, name, category, city) {
    results = []
    //approved = $.map(approved, String.toUpperCase);
    for (var i = 0; i < approved.length; ++i) {
        appr = $.map(approved[i].name, String.toUpperCase)
        if (appr.includes(name.toUpperCase()) && approved[i].category.includes(category) && approved[i].city.includes(city)) {
            results.push(approved[i])
        }
    }

    for (var i = 0; i < results.length; ++i) {
        var card_body_id = "business".concat('_', results[i].id)

        $("body").append('<div id="business_card_' + results[i].id + '" class="card border-dark mb-3 container col-lg-6 col-sm-10 col-xs-10"></div>')
        $("#business_card_" + results[i].id + "").append('<div id="' + card_body_id + '" class="card-body"></div>')
        $("#" + card_body_id + "").append('<a id="business_link_' + results[i].id +'" href="individual_business.php?business_id=' + results[i].id + '"></a>')
        $("#business_link_" + results[i].id + "").append('<h5 class="card-header bg-transparent">' + results[i].name + '</h5>')
        $("#" + card_body_id + "").append('<p class="card-body"></p>')
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].description + '</p>')
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].category + '</p>')
        $("#" + card_body_id + "").append('<p class="card-body">' + results[i].city + ', ' + results[i].state + '</p>')
    }
}

/* 
    NAME: populateIndividualUserFields
    PARAMETERS:
        user (Array): An array with a single JSON object representing the user details
        business (Array): An array with a single JSON object representing the business details
    RETURNS: none
    DESCRIPTION: When the individual user page loads, this function will take user and business data and populate the 
        corresponding div elements in the DOM with the correct information.
*/
function populateIndividualUserFields(user, business) {
    user = user[0]

    // set the text of the fields
    $("#user-name").text(user.first_name + ' ' + user.last_name)
    $("#user-degree").text(user.degree)
    $("#user-graduation-year").text(user.graduation_year)
    $("#user-email").text(user.email)
    $("#user-role").text(user.role)

    if (user.role === "Owner") {
        business = business[0]

        $(".container").append('<a href="individual_business.php?business_id=' + business.id + '" id="user-business">' + business.name + '</a>')
    }
}

/* 
    NAME: populateUserList
    PARAMETERS:
        users (Array): An array with multiple JSON objects representing users
    RETURNS: none
    DESCRIPTION: This function takes an array of all the users from the database and creates new cards in the HTML body.
        Each of the cards have some information about the user. The actor can click on the card to access even more information.
*/
function populateUserList(users) {
    for (var i = 0; i < users.length; ++i) {
        var card_body_id = "user".concat('_', users[i].id)

        $("body").append('<div id="user_card_' + users[i].id + '" class="card border-dark mb-3 container col-lg-6 col-sm-10 col-xs-10"></div>')
        $("#user_card_" + users[i].id + "").append('<div id="' + card_body_id + '" class="card-body"></div>')
        $("#" + card_body_id + "").append('<a id="user_link_' + users[i].id +'" href="individual_user.php?user_id=' + users[i].id + '"></a>')
        $("#user_link_" + users[i].id + "").append('<h5 class="card-header bg-transparent">' + users[i].first_name + ' ' + users[i].last_name + '</h5>')
        $("#" + card_body_id + "").append('<p class="card-body"></p>')
        $("#" + card_body_id + "").append('<p class="card-body">' + users[i].degree + '</p>')
        $("#" + card_body_id + "").append('<p class="card-body">' + users[i].graduation_year + '</p>')
    }
}
