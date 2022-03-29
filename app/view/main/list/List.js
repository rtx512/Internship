Ext.define('scheduleApp.view.main.list.List',  {
    extend: 'Ext.panel.Panel',
    xtype: 'mainlist',
    requires: [
        'scheduleApp.store.Personnel',
        'scheduleApp.store.Groups',

        'scheduleApp.view.main.list.ListController',
        'scheduleApp.view.main.list.ListModel'
    ],

    controller: 'list',
    viewModel: 'list',

    title: 'Расписание',
    items: [
        {
            margin: 10,
            xtype: 'combobox',
            fieldLabel: 'Группа',
            emptyText: 'Выберите группу',
            store: 'scheduleApp.store.Groups',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local'
        },
        {
            xtype: 'mainSchedule',
        }
    ]
});

