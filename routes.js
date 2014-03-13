var _ = require("underscore"),
    data = require("./data");

module.exports = function (app) {
    
    var allMeetResources = ["meets", "posters", "chronicles"],
        allResources = allMeetResources.concat("subscriptions");
    
    allResources.forEach(function (resource) {
        app.get("/" + resource, function (req, res) {
            res.json(data[resource].local);
        });
    });

    app.post("/subscription", function (req, res) {
        var subscription = req.query,
            found = _.findWhere(data.subscriptions.local, {
                email: subscription.email
            });
        
        if (!found) {
            data.subscriptions.cloud.push(subscription);
            res.json({
                success: true,
                message: "You have subscribed!"
            });
        } else {
            res.json({
                success: false,
                error: "Email already subscribed."
            });
        }
    });
    
    var seed = require("./seed");
    app.get("/fill/:resource?", function (req, res) {
        var routeResource = req.params.resource,
            resourcesToFill = routeResource ? [routeResource] : allMeetResources;
        
        resourcesToFill.forEach(function (resource) {
            seed[resource].forEach(function (item) {
                data[resource].cloud
                    .child(item.meet_id)
                    .set(item);
            });
        });
        res.json({ success: true });
    });
    
};
