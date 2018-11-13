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