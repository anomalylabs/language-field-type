(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('select[data-provides="anomaly.field_type.language"].language')
    );

    fields.forEach(function (field) {
        new Choices(field);
    });
})(window, document);
