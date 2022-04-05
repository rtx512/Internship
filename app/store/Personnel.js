Ext.define('scheduleApp.store.Personnel', {
    extend: 'Ext.data.Store',

    alias: 'store.personnel',

    fields: [
        '№', 'Понидельник', 'Вторник', 'Среда', 'Четверг', 'Пятница'
    ],

    data: {
        items: [
            {
                time: '8:30 - 10:00',
                days: {
                    1: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2312',
                        teacher: 'My teach1'
                    },
                    2: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2204',
                        teacher: 'My teach2'
                    },
                    3: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach3',
                    },
                    4: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach4'
                    },
                    5: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach3',
                    }
                },
            },
            {
                time: '10:30 - 11:00',
                days: {
                    1: {
                        subject: 'не матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach2'
                    },
                    2: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach1'
                    },
                    3: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach2'
                    },
                    4: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach3'
                    },
                    5: {
                        subject: 'матан',
                        group: 'КИ-21-01',
                        cabinet: '2404',
                        teacher: 'My teach4'
                    }
                },
            },
        ]
    },
    proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
});
