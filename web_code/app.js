$(document).ready(function() {

    $('#status').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#status').change(function() {
        if ($(this).prop('checked')) {
            $('#hidden_status').val('on');
        } else {
            $('#hidden_status').val('off');
        }
        document.getElementById('action').click();

    });

    $('#insert_data').on('submit', function(event) {
        event.preventDefault();

        if ($('#hidden_status').val() != '') {
            var hidden_status = $('#hidden_status').val();


            $.ajax({

                url: "update.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {

                    if (data == 'done') {
                        $('#insert_data')[0].reset();
                        $('#status').bootstrapToggle('on');
                        alert("Data Inserted");
                    }
                }
            });
        }
    });

    // for button 2
    $('#status1').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#status1').change(function() {
        if ($(this).prop('checked')) {
            $('#hidden_status1').val('on');
        } else {
            $('#hidden_status1').val('off');
        }
        document.getElementById('action1').click();

    });

    $('#insert_data1').on('submit', function(event) {
        event.preventDefault();

        if ($('#hidden_status1').val() != '') {
            var hidden_status = $('#hidden_status1').val();


            $.ajax({

                url: "update.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {

                    if (data == 'done') {
                        $('#insert_data1')[0].reset();
                        $('#status1').bootstrapToggle('on');
                        alert("Data Inserted");
                    }
                }
            });
        }
    });

     // for button 3
     $('#status2').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#status2').change(function() {
        if ($(this).prop('checked')) {
            $('#hidden_status2').val('on');
        } else {
            $('#hidden_status2').val('off');
        }
        document.getElementById('action2').click();

    });

    $('#insert_data2').on('submit', function(event) {
        event.preventDefault();

        if ($('#hidden_status2').val() != '') {
            var hidden_status = $('#hidden_status2').val();


            $.ajax({

                url: "update.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {

                    if (data == 'done') {
                        $('#insert_data2')[0].reset();
                        $('#status2').bootstrapToggle('on');
                        alert("Data Inserted");
                    }
                }
            });
        }
    });

     // for button 4
     $('#status3').bootstrapToggle({
        on: 'on',
        off: 'off',
        onstyle: 'success',
        offstyle: 'danger'
    });

    $('#status3').change(function() {
        if ($(this).prop('checked')) {
            $('#hidden_status3').val('on');
        } else {
            $('#hidden_status3').val('off');
        }
        document.getElementById('action3').click();

    });

    $('#insert_data3').on('submit', function(event) {
        event.preventDefault();

        if ($('#hidden_status3').val() != '') {
            var hidden_status = $('#hidden_status3').val();


            $.ajax({

                url: "update.php",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {

                    if (data == 'done') {
                        $('#insert_data3')[0].reset();
                        $('#status3').bootstrapToggle('on');
                        alert("Data Inserted");
                    }
                }
            });
        }
    });

});