Ext.define('scheduleApp.store.Groups', {
    extend: 'Ext.data.Store',
    alias: 'store.groups',

    fields: [
        {name: 'id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getGroups',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});