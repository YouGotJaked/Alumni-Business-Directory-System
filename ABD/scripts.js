function populateIndividualBusinessFields($_POST) {
    // get the id of the business which is populating with
    id = $_POST["id"]
    // do a get_one with the id of the business

    console.log(id)

    // set the text of the fields
    $("#business-name").text()
    $("#business-description").text()
    $("#business-category").text()
    $("#business-street").text()
    $("#business-city").text()
    $("#business-state").text()
    $("#business-zip").text()
    $("#business-country").text()
}