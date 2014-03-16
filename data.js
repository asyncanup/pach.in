var Firebase = require("firebase"),
    _ = require("underscore"),
    debug = console.log;

var pkg = require("./package.json"),
    db = new Firebase(process.env.FIREBASE).child(pkg.name.replace(".", "_"));
    
var data = {};

["posters", "chronicles", "subscriptions", "meets"].forEach(function (type) {
    data[type] = {};
    data[type].local = [];
    data[type].cloud = db.child(type);
    
    data[type].cloud.on("child_added", function (snap) {
        data[type].local.push(snap.val());
    });
    
    data[type].cloud.on("child_removed", function (snap) {
        var localItems = data[type].local,
            localItemIndex = findLocalItemIndex(snap.val(), localItems, type);
        
        if (~localItemIndex) {
            debug("Removed " + type + ": " + JSON.stringify(localItemIndex));
            localItems.splice(localItemIndex, 1);
        } else {
            debug("Removed " + type + " not in local: " + JSON.stringify(remoteItem));
        }
    });
    
    data[type].cloud.on("child_changed", function (snap) {
        var remoteItem = snap.val(),
            localItems = data[type].local,
            localItemIndex = findLocalItemIndex(remoteItem, localItems, type);

        if (~localItemIndex) {
            debug("Changed " + type + ": " + JSON.stringify(localItemIndex));
            localItems[localItemIndex] = remoteItem;
        } else {
            debug("Changed " + type + " doesn't exist in local: " + JSON.stringify(remoteItem));
        }
    });
});

function findLocalItemIndex(remoteItem, localItems, type) {
    var idAttributeForType = {
        "subscriptions": "email",
        "meets": "meet_id",
        "posters": "meet_id",
        "chronicles": "meet_id"
    };

    var idAttribute = idAttributeForType[type];

    return _.pluck(localItems, idAttribute).indexOf(remoteItem[idAttribute]);
}

module.exports = data;
