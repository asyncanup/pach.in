define(function (require) {

    return Backbone.View.extend({
        className: "slate-view",
        
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
            this.beforeRender && this.beforeRender();
            
            this.$el.html(this.template(this.templateData));
            this.log("Rendered");
            
            this.afterRender && this.afterRender();
            return this;
        }
    });
});