//dynamic add 
 $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><input name='headsetcateg[]' id='headsetcateg["+i+"]' type='hidden' class='form-control input-md' /> <td><input name='headsetserial["+i+"]' type='text' placeholder='Serial #' class='form-control input-md'  /> </td><td> <select class='form-control col-md-7 col-xs-12' name='headsetstat["+i+"]'><option value='1'>Available</option><option value='2'>Active</option><option value='3'>Lost</option></select>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
       if(i>1){
     $("#addr"+(i-1)).html('');
     i--;
     }
   });
});


//datatable
$(document).ready(function() {
        var selected = [];

        var handleDataTableButtons = function() {
          if ($("#headset-table").length) {
            $("#headset-table").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ],
              order: [[ 1, "desc" ]],
              responsive: true,
              "bServerSide": true,
              "sAjaxSource": "headsetdata.php",
              "rowCallback": function( row, data ) {
            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        }
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();
        var table = $('#headset-table').DataTable();

        var data = table.row( this ).data();
        $('#headset-table tbody').on('click', 'tr', function () {
        var id = this.id;
        var index = $.inArray(id, selected);
 
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

      //editbadge
      $('#editBtn').click( function () {
      var row1 = table.row('.selected').data();
      var editbtn = $('#editBtn').val();
     $.ajax({
      dataType: "json",
      type:'post',
       url: "editHeadset.php",
       data:{row1:row1[0], editbtn:editbtn},
       success : function(data){
          //delete the row
          $('#headsetid').val(data.headsetid).end();
          $('#headsetserialedit').val(data.headsetserial).end();
          $('#editModal').modal('toggle');
        },
       error: function(xhr){
           //error handling
        }}); 

    });

      //deletebadge
      $('#removeBtn').click( function () {
      var row1 = table.row('.selected').data();
      var removebtn = $('#removeBtn').val();
     $.ajax({
      type:'post',
       url: "delHeadset.php",
       data:{row1:row1[0], removebtn:removebtn},
       success : function(data){
          //delete the row
          $('#removeHeadset').modal('hide')
          $('.dataTable').each(function() {
          dt = $(this).dataTable();
          dt.fnDraw();
})
        },
       error: function(xhr){
           //error handling
        }}); 

    });

      //editsubmit
$("#editsubmitBTN").click( function (){
  var editsubbtn = $('#editsubmitBTN').val();
  var x = document.getElementById("badgestatusedit").value;
        $.ajax({
          type: "POST",
          url: "headsetquery.php",
          data:{editsubbtn:editsubbtn,
                headsetid: $('#headsetstatusid').val(),
                headsetserialnum: $('#headsetserialedit').val(),
                headsetstatusedit:x}
                ,
       success : function(data){
          //delete the row
          $('#editModal').modal('hide')
          $('.dataTable').each(function() {
          dt = $(this).dataTable();
          dt.fnDraw();
})
        },
        })
      });
});


