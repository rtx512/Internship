Ext.define('scheduleApp.model.IdNameModel', {
    extend: 'Ext.data.Model',
    alias: 'model.idName',
    fields: [
        {name: 'id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
});
