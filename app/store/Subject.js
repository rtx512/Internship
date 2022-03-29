Ext.define('scheduleApp.store.Subject',{
    extend:'Ext.data.Store',
    alias:'store.subject',
    fields: [
        {name: 'id', type: 'int'},
        {name: 'id', type: 'string'}
    ],
    proxy: {
        type: 'ajax',
        url: 'http://127.0.0.1:8000/List/getSubjects',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});