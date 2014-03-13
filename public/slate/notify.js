define(function (require) {
    
    return {
        log: humane.log.bind(humane),
        success: humane.spawn({ addnCls: "humane-jackedup-success" }),
        error: humane.spawn({ addnCls: "humane-jackedup-error" })
    };
});
