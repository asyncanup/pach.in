define(function (require) {
    
    var BaseModel = require("slate/model");
    
    return BaseModel.extend({
        url: function () {
            return "/subscriptions?email=" + this.get("email");
        }
    });
});