<script>
    // Deklarasi Variable
    var input1 = $("#input1");
    var input2 = $("#input2");
    var reset = $("#reset");

    //input field 1
    $(document).ready(function() {
        input1.focus();
        // chechk / validasi data
        function checkInput() {
            if (input1.val() != "") {
                var a = input1.val()
                input1.focus();
                csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('validasitoyota') }}",
                    method: 'get',
                    dataType: 'json',
                    data: $('#form').serialize(),
                    success: function(data) {
                        // console.log(data);
                        var a = data['0'];

                        var c = data['0']['job_no'];
                        var d = data['0']['part_no'];
                        // console.log(a);
                        if (data == '-') {
                            document.getElementById('Audioerror').play();
                            swal.fire({
                                icon: 'error',
                                timer: 2000,
                                title: 'Error',
                                text: 'Data Not Found',
                            });
                            $('#input1').val("");
                            $('#input1').focus();
                        } else {
                            input1.attr("readonly", true);
                            input2.attr("readonly", false);
                            input2.focus();

                            $('#job_no').val(c);
                            $('#part_no').val(d);
                        }
                    },
                });
            } else {
                reset.removeClass("d-none")
                input1.attr("readonly", true);
            }
        }

        // });
        // Event Keykdown untuk keyboard lalu jalankan function
        input1.on("keydown", function(e) {
            // Enter
            if (event.key === "Enter") {
                checkInput();
            }
        });
        input2.on("change", function(e) {
            if (input2.val() != ""); {
                input1.attr("readonly", false);
                var a = input2.val();
                var arr = a.split(',');
                var part_no = arr[2];
                var text = part_no.replace("-", "");
                // console.log(part_no);
                var b = text.replace("-", "");
                var nilai2 = b.slice(0, 10);
                // console.log(nilai2);
                var z = document.getElementById('part_no').value;
                var nilai1 = z.slice(0, 10);
                // console.log(nilai1);
                // alert(nilai1);
                if (nilai1 == nilai2) {
                    // alert('sama');
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('getEkanbanAdmoutSp6') }}",
                        method: 'POST',
                        dataType: 'json',
                        data: $('#form').serialize(),
                        // success: function(data) {

                        success: function(data) {
                            document.getElementById('Audiosucces').play();
                            if (data == "A01") {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Tidak Ada Periode Yang Aktif  ',
                                });
                            } else if (data == "A02") {
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    timer: 2000,
                                    title: 'Perhatian',
                                    text: 'Kanban Sudah Di Submit',
                                });
                            } else if (data == "A03") {
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'success',
                                    title: 'success',
                                    timer: 2000,
                                    text: 'Berhasil Submit',
                                });

                            } else if (data == "A04") {
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Data Excel Belum di Upload ',
                                });

                            } else if (data == "A05") {
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Quantity Scan Sudah Melebihi Quantity Pengiriman ',
                                });

                            } else if (data == "A06") {
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Kanban Belum di Scan In ',
                                });

                            }
                        }
                    });

                } else {
                    input1.val("");
                    input2.val("");
                    input1.focus();
                    document.getElementById('Audioerror').play();
                    swal.fire({
                        icon: 'error',
                        timer: 2000,
                        title: 'Error',
                        text: 'Part no Tidak Sama',
                    });
                }
                input1.val("");
                input2.val("");
                input1.focus();
            }
            // input1.val("");
            // input2.val("");
            // input1.focus();
        });
        // Reset Form
        reset.on("click", function() {
            reset.addClass("d-none");
            input1.attr("readonly", false);
            input1.focus();

            input1.val("")
            input2.val("")

        });
    });

    // });
</script>
