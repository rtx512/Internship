Ext.define('scheduleApp.store.Time',{
    extend: 'Ext.data.Store',
    alias: 'store.time',

    fields: [
        {name: 'id', type: 'int'},
        {name: 'name', type: 'string'}
    ],
    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getTimes',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});