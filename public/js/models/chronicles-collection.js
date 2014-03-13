define(function (require) {
    
    var BaseCollection = require("slate/collection"),
        MeetResourcesModel = require("models/meet-resources-model");
    
    return BaseCollection.extend({
        url: "/chronicles",
        model: MeetResourcesModel
    });
});
