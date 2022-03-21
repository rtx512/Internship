Ext.define('scheduleApp.view.main.addendum.Addendum', {
    extend:'Ext.form.Panel',
    xtype: 'mainAddendum',
    requires: [
        'scheduleApp.store.Personnel',

        'scheduleApp.view.main.addendum.AddendumModel',
        'scheduleApp.view.main.addendum.AddendumController'

    ],
    controller: 'addendum',
    viewModel: 'addendum',
    title:'Добавление новой пары',
    items: [
        {
            margin:10,
            xtype:'combobox',
            fieldLabel:'Группа:',
            emptyText: 'Выберите группу',
            store: 'scheduleApp.store.Groups',
            valueField: 'id',
            displayField: 'name',
            allowBlank: true,
            queryMode: 'local',
            bind: {
                value: "{form.groupsID}"
            }

        },
        {
            margin:10,
            xtype:'combo',
            fieldLabel: 'Предмет:',
            emptyText: 'Выберите предмет',
            store: 'scheduleApp.store.Subject',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local',
            bind: {
                value: "{form.subjectID}",
            }
        },
        {
            margin:10,
            xtype:'combo',
            fieldLabel: 'Препод:',
            emptyText: 'Выберите преподавателя',
            store: 'scheduleApp.store.Teacher',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local',
            bind: {
                value: "{form.teacherID}"
            }
        },
        {
            margin:10,
            xtype:'combo',
            fieldLabel: 'Время:',
            emptyText: 'Выберите время',
            store: 'scheduleApp.store.Time',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local',
            bind: {
                value: '{form.timeID}'
            }
        },
        {
            margin: 10,
            xtype:'checkbox',
            fieldLabel: 'Повторять:',
            bind: {
                value: '{form.checkbox}'
            }
        },
        {
            margin: 10,
            xtype:'textfield',
            fieldLabel: 'Переодичность:',
            bind: {
                disabled: '{checkboxChecked}'
            }
        },
        {
            margin:10,
            xtype:'textfield',
            fieldLabel: 'Сколько недель:',
            bind: {
                disabled: '{checkboxChecked}'
            },
        },
            {
                xtype: 'button',
                text: 'Добавить',
                bind: {
                    disabled: '{addForm}',
                },
            }
    ]
});