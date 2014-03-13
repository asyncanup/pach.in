define(function (require) {
    
    var BaseModel = require("slate/model");
    
    return BaseModel.extend({
        idAttribute: "meet_id"
    });
});
