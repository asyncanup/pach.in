define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id),
        compile = require("slate/templates").compile,
        _ = require("slate/utils"),
        notify = require("slate/notify");
    
    return BaseView.extend({
        log: log,
        template: compile(require("text!templates/screens/posters-screen.html")),
        
        subscriptions: {
            "posters collection loaded": {
                obj: "postersCollection",
                event: "sync",
                callback: "render"
            },
            "meets collection loaded": {
                obj: "meetsCollection",
                event: "sync",
                callback: "render"
            },
            "notifies on successful subscription": {
                obj: "subscriptionModel",
                event: "sync",
                callback: "notifySubscription"
            }
        },
        
        events: {
            "submit .subscribe-form": function (e) {
                var email = this.$(".subscribe-input").val();
                
                if (email) {
                    this.subscriptionModel
                        .set({ email: email })
                        .save();
                }
                
                return false;
            }
        },
        
        notifySubscription: function (model, response) {
            var btn = this.$(".subscribe-submit"),
                errorClass = "btn-danger",
                successClass = "btn-success";
            
            if (response.success) {
                btn.removeClass(errorClass).addClass(successClass);
                notify.success(response.message);
            } else {
                btn.removeClass(successClass).addClass(errorClass);
                notify.error(response.error);
            }
        },
        
        beforeRender: function () {
            var posters = this.postersCollection.toJSON(),
                meets = this.meetsCollection.toJSON();
                
            if (!meets.length || !posters.length) {
                return false;
            }
            
            var templateData = _.splitInRows(posters, 3, function (item) {
                var meet = _.findWhere(meets, { meet_id: item.meet_id });
                
                item.name = "PACH #" + item.meet_id;
                item.description = meet.description;
                item.title = item.name + ": " + item.description;
                
                return item;
            });
            
            console.log(templateData);
            this.templateData = templateData;
            
            return true;
        }
    });
});
