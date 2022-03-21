Ext.define('scheduleApp.view.main.addendum.AddendumModel', {
    extend: 'Ext.app.ViewModel',

    alias: 'viewmodel.addendum',
    data: {
        form: {
            checkbox: false,
            groupsID: null,
            subjectID: null,
            teacherID: null,
            timeID: null,
        }
    },

    formulas: {
        checkboxChecked: {
            bind: {
                bindTo: '{form.checkbox}'
            },
            get: function(checkbox) {
                return !checkbox
            }
        },
        addForm: {
            bind: {
                bindTo: '{form}',
                deep:true
            },
            get: function (form){
                if (form.groupsID && form.subjectID && form.teacherID && form.timeID){
                    return ''
                } else {
                    return 'true'
                }
            }
        }
    }
});