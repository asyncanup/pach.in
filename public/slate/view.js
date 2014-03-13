define(function (require) {

    var _ = require("slate/utils");

    return Backbone.View.extend({
        className: "slate-view",
        
        initialize: function (opts) {
            // first extend
            _.extend(this, opts);
            
            // then look for subscriptions
            this.initSubscriptions();
            
            // then run custom setup
            this.setup && this.setup(opts);
        },
        
        initSubscriptions: function () {
            _.each(this.subscriptions, function (sub, description) {
                this.listenTo(this[sub.obj], sub.event, this[sub.callback]);
                this.log && this.log("Subscribed to: " + description);
            }.bind(this));
        },
        
        hide: function () {
            this.log("Starting to hide");
            this.$(".animated.fadeInDown")
                .removeClass("fadeInDown")
                .addClass("fadeOutUp");
                
            this.$(".animated.fadeIn")
                .removeClass("fadeIn")
                .addClass("fadeOut");
                
            this.$(".animated.fadeInUp")
                .removeClass("fadeInUp")
                .addClass("fadeOutDown");
            
            var timeToAnimate = 1000;
            setTimeout(function () {
                this.log("Removing from DOM");
                this.remove();
            }.bind(this), timeToAnimate);
            
            return timeToAnimate;
        },
        
        render: function () {
            // If this.beforeRender exists, then it should return true for
            // rendering to continue
            var stopRendering;
            
            if (this.beforeRender && (this.beforeRender() === false)) {
                stopRendering = true;
            }
            
            if (!stopRendering) {
                this.$el.html(this.template(this.templateData));
                this.log("Rendered");
                
                this.afterRender && this.afterRender();
            }

            return this;
        }
    });
});
