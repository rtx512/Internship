Ext.define('scheduleApp.store.Groups', {
    extend: 'Ext.data.Store',
    alias: 'store.groups',

    model: 'scheduleApp.model.IdNameModel',

    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getGroups',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});