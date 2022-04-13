Ext.define('scheduleApp.store.Period', {
    extend: 'Ext.data.Store',

    alias: 'store.period',

    model: 'scheduleApp.model.IdNameModel',

    data: [
        {id: '1', name: 'Раз в неделю'},
        {id: '2', name: 'Раз в 2 недели'}
    ],
});