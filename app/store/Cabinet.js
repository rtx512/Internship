Ext.define('scheduleApp.store.Cabinet', {
    extend: 'Ext.data.Store',
    alias: 'store.cabinet',

    fields: [
        {name: 'id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getCabinet',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});