<script>
    var input = $('#input');
    var reset = $("#reset");
    var table = $('#myTable');
    $(document).ready(function() {

        input.focus();

        function checkInput() {
            if (input.val() != "") {
                // input1.strsubsring(0, 16)
                $('#myTable').DataTable().clear().destroy();
                var a = input.val()
                var dn = a.slice(0, 16);
                // console.log(dn);
                input.focus();
                csrf_token = $('meta[name="csrf-token"]').attr('content');
                var table = $('#myTable').DataTable({
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    responsive: true,

                    ajax: {
                        url: "{{ route('tampil') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            '_token': csrf_token,
                            'dn_no': dn,
                        },
                        success: function(data) {
                            // var a = data['0'];
                            // console.log(data);
                            var b = data[0].length
                            // Process the data table and display it on the page
                            if (b == 0) {
                                document.getElementById('Audioerror').play();
                                swal.fire({
                                    icon: 'error',
                                    timer: 2000,
                                    title: 'Error',
                                    text: 'Data Not Found',
                                });
                                $('#myTable').DataTable().clear().destroy();
                                $('#input').val("");
                                $('#input').focus();
                            } else {
                                // console.log(data[0].length);
                                var detailDataset = [];
                                for (var i = 0; i < data[0].length; i++) {
                                    var quantity = data[0][i].quantity;
                                    var qty = parseInt(data[0][i].qty);
                                    var balance = quantity - qty;
                                    // console.log(balance);
                                    detailDataset.push([

                                        data[0][i].part_no,
                                        data[0][i].quantity,
                                        data[0][i].qty,
                                        balance,
                                    ]);
                                }
                                // console.log(detailDataset);
                                $('#myTable').DataTable().clear().destroy();
                                $('#myTable').DataTable({
                                    "paging": false,
                                    "scrollY": '250px',
                                    "scrollCollapse": true,
                                    "columnDefs": [{
                                            "targets": 0,
                                            // "responsivePriority": 0,
                                            "name": 'PART_NO',
                                            "className": "text-tabel-white text-center text-dark",
                                            "style": "font-size:5px",
                                            "createdCell": function(th, cellData,
                                                rowData, row, col) {
                                                $(th).css('background-color',
                                                    'LightSkyBlue')
                                            }

                                        },
                                        {
                                            "targets": 1,
                                            // "responsivePriority": 1,
                                            "name": 'QTY_DEL',
                                            "visible": false,
                                            "className": "text-center text-dark",
                                            "style": "font-size:5px",
                                        },
                                        {
                                            "targets": 2,
                                            // "responsivePriority": 2,
                                            "name": 'QTY_DEL',
                                            "visible": false,
                                            "className": "text-center text-dark",
                                            "style": "font-size:5px",
                                        },
                                        {
                                            "targets": 3,
                                            // "responsivePriority": 3,
                                            "name": 'BALANCE',
                                            "className": "text-center text-dark",
                                            // "style": "bg-color: red",
                                            "createdCell": function(th, cellData,
                                                rowData, row, col) {
                                                $(th).css('background-color',
                                                    'PaleGreen')
                                            }
                                            // "style": "font-size:5px",
                                        }
                                    ],
                                    data: detailDataset,


                                });
                                var Rm = $('#myTable').DataTable();
                                var convrtArr = Rm.rows().data().toArray();
                                var len = convrtArr.length;
                                // console.log(convrtArr);
                                for (var i = 0; i < len; i++) {
                                    var a = convrtArr[i][3];
                                    // console.log(a);
                                    if (a == 0) {
                                        document.getElementById('Audiosucces').play();
                                        swal.fire({
                                            icon: 'success',
                                            title: 'success',
                                            timer: 2000,
                                            text: ' Data Complete ',
                                        });
                                    } else {
                                        document.getElementById('Audioerror').play();
                                        swal.fire({
                                            icon: 'error',
                                            title: 'error',
                                            timer: 2000,
                                            text: ' DN Not Complete',
                                        });
                                    }
                                }
                                // input.attr("readonly", true);
                                input.focus();
                                input.val("")


                                // $('#myTable').DataTable().clear().destroy();
                            }

                            // $('#myTable').DataTable().clear().destroy();
                        },


                    }
                });

            } else {
                reset.removeClass("d-none")
                input1.attr("readonly", true);
            }

        }
        input.on("change", function(e) {
            // var keyCode = e.which;
            checkInput();
            // Enter
            // if (event.key === "Enter") {
            //     checkInput();

            // }
        });

        // reset.on("click", function() {
        //     reset.addClass("d-none");
        //     // table.DataTable().clear();
        //     input.attr("readonly", false);
        //     input.focus();
        //     input.val("")
        //     // table.DataTable().clear();
        //     // table.api().page.len(50).draw();
        //     table.clear();

        // });
        // });
    });
    $('#reset').click(function() {
        $('#myTable').DataTable().clear().destroy();
        // clearvaluecreate();
        // table.ajax.reload();
        input.attr("readonly", false);
        input.focus();
        input.val("")
        //     // table.DataTable().clear();
        //     // table.api().page.len(50).draw();
        //     table.clear();
    });
</script>
