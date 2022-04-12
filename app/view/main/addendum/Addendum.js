Ext.define('scheduleApp.view.main.addendum.Addendum', {
    extend: 'Ext.form.Panel',
    xtype: 'mainAddendum',
    itemId: 'mainAddendum',
    requires: [

        'scheduleApp.view.main.addendum.AddendumModel',
        'scheduleApp.view.main.addendum.AddendumController'

    ],
    controller: 'addendum',
    viewModel: 'addendum',
    title: 'Добавление новой пары',
    items: [
        {
            margin: 10,
            xtype: 'combobox',
            name: 'groupsId',
            fieldLabel: 'Группа:',
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
            margin: 10,
            xtype: 'combo',
            name: 'subjectId',
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
            margin: 10,
            xtype: 'combobox',
            name:'cabinetId',
            fieldLabel: 'Кабинет:',
            emptyText: 'Выберите кабинет',
            store: 'scheduleApp.store.Cabinet',
            valueField: 'id',
            displayField: 'name',
            queryMode: 'local',
            bind: {
                value: "{form.cabinetID}",
            }
        },
        {
            margin: 10,
            xtype: 'combo',
            name: 'teacherId',
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
            margin: 10,
            xtype: 'combo',
            name: 'timeId',
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
            xtype: 'datefield',
            fieldLabel: 'Дата',
            name: 'date',
            format: 'd.m.Y',
            altFormats: 'd,m,Y|d.m.Y',
            bind: {
                value: '{form.date}'
            }
        },
        {
            margin: 10,
            xtype: 'checkbox',
            fieldLabel: 'Повторять:',
            name: 'isRepeatable',
            bind: {
                value: '{form.checkbox}'
            }
        },
        {
            margin: 10,
            xtype: 'combo',
            fieldLabel: 'Переодичность:',
            name: 'period',
            store: 'scheduleApp.store.Period',
            queryMode: 'local',
            valueField: 'id',
            displayField: 'name',
            bind: {
                value: '{form.period}',
                disabled: '{checkboxChecked}'
            }
        },
        {
            margin: 10,
            xtype: 'textfield',
            name: 'manyCouples',
            fieldLabel: 'Сколько пар:',
            bind: {
                value: '{form.manyCouples}',
                disabled: '{checkboxChecked}'
            },
        },
        {
            xtype: 'button',
            text: 'Добавить',
            bind: {
                disabled: '{addForm}',
            },
            listeners: {
                click: 'addPara',
            }
        }
    ],
});