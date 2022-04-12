Ext.define('scheduleApp.view.main.list.ListController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.list',

    DateFilter: function (me) {
        let gridStore = me.up('#mainlist').down('#mainSchedule').getStore();
        if (me.up('#mainlist').down('#comboboxGroup').getValue() != null){
            gridStore.load({
                params: {
                    groupId: me.up('#mainlist').down('#comboboxGroup').getValue(),
                    date: me.lastValue
                }
            });
        } else (alert('ВЫБЕРИТЕ ГРУППУ!!!'))
    },

    GroupsFilter: function (me) {
        let gridStore = me.up('#mainlist').down('#mainSchedule').getStore();
        if (me.up('#mainlist').down('#datefieldDate').lastValue != null) {
            gridStore.load({
                params: {
                    groupId: me.getValue(),
                    date: me.up('#mainlist').down('#datefieldDate').lastValue,
                }
            });
        }
    },

    getPDFSchedule: function (me) {
        me = me.up('#mainlist');
        if ((me.down('#datefieldDate').lastValue != null) && (me.down('#comboboxGroup').getValue() != null)) {
            window.open(
                'https://127.0.0.1:8000/Grid/printSchedule?'
                + 'groupId=' + me.down('#comboboxGroup').getValue()
                + '&date=' + me.down('#datefieldDate').lastValue
            );
        }
    }

});
