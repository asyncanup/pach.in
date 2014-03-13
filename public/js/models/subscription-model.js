define(function (require) {
    
    var BaseModel = require("slate/model");
    
    return BaseModel.extend({
        url: function () {
            return "/subscription?email=" + this.get("email");
        }
    });
});