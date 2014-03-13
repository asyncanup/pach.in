define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id),
        compile = require("slate/templates").compile,
        ajax = require("slate/ajax"),
        notify = require("slate/notify");
    
    return BaseView.extend({
        log: log,
        template: compile(require("text!templates/screens/chronicles-screen.html")),
        
        // TODO: Due to `sync` event here, render is called multiple times
        subscriptions: {
            "chronicles collection loaded": {
                obj: "chroniclesCollection",
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
            var chronicles = this.chroniclesCollection.toJSON(),
                meets = this.meetsCollection.toJSON();
            
            if (!chronicles.length || !meets.length) {
                return false;
            }
            
            var templateData = _.splitInRows(chronicles, 3, function (item) {
                var meet = _.findWhere(meets, { meet_id: item.meet_id });
                
                item.name = "PACH #" + item.meet_id;
                item.description = meet && meet.description;
                item.title = item.name + ": " + item.description;
                
                return item;
            });
            
            this.templateData = templateData;
            
            return true;
        }
    });
});
