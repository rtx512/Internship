Ext.define('scheduleApp.store.Time',{
    extend: 'Ext.data.Store',
    alias: 'store.time',

    fields: [
        {name: 'id', type: 'int'},
        {name: 'id', type: 'string'}
    ],
    proxy: {
        type: 'ajax',
        url: 'http://127.0.0.1:8000/List/getTimes',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});