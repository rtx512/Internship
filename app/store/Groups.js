Ext.define('scheduleApp.store.Groups', {
    extend: 'Ext.data.Store',
    alias: 'store.groups',
    data: [
        {id: 1, name: 'KI-21-01'},
        {id: 2, name: 'KI-21-02'},
        {id: 3, name: 'KT-21-05'},
        {id: 4, name: 'KS-21-04'},
    ],
        /*teacher: [
            {id: 1, name: 'My teach1'},
            {id: 2, name: 'My teach2'},
            {id: 3, name: 'My teach3'},
            {id: 4, name: 'My teach4'},
        ],
        time: [
            {id: 1, name: '8.30 - 10.00'},
            {id: 2, name: '10.15 - 11.45'},
            {id: 3, name: '12.00 - 13.30'},
            {id: 4, name: '14.00 - 15.30'},
        ]*/
    /*proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    },*/
})
