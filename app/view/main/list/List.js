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
            itemID: 'comboboxGroup',
            fieldLabel: 'Группа',
            emptyText: 'Выберите группу',
            store: 'scheduleApp.store.Groups',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local',
            listeners: {
                select: function (me) {
                    let gridStore = me.up('mainlist').down('mainSchedule').getStore();
                    if (me.up('mainlist').down('datefield').lastValue != null) {
                        gridStore.load({
                            params: {
                                groupId: me.getValue(),
                                date: me.up('mainlist').down('datefield').lastValue,
                            }
                        });
                    }
                }
            }
            },
        {
            margin: 10,
            xtype: 'datefield',
            fieldLabel: 'Выберите дату понедельника недели:',
            format: 'd.m.Y',
            altFormats: 'd,m,Y|d.m.Y',
            disabledDays: [0,2,3,4,5,6],
            listeners: {
                select: function (me) {
                    let gridStore = me.up('mainlist').down('mainSchedule').getStore();
                    if (me.up('mainlist').down('combobox').getValue() != null){
                        gridStore.load({
                            params: {
                                groupId: me.up('mainlist').down('combobox').getValue(),
                                date: me.lastValue
                            }
                        });
                    } else (alert('ВЫБЕРИТЕ ГРУППУ!!!'))
                }
            },
        },
        {
            xtype: 'mainSchedule',
        }
    ]
});

