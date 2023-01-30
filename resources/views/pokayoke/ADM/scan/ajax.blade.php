<script>
    // Deklarasi Variable
    var input1 = $("#input1");
    var input2 = $("#input2");
    var reset = $("#reset");
    // var add = $("#add");

    //input field 1
    $(document).ready(function() {
        input1.focus();
        // $('.form').submit(function() {
        // cek data
        function checkInput() {
            if (input1.val() != "") {
                // input1.strsubsring(0, 16)
                var a = input1.val()
                var dn = a.slice(0, 16);
                var job = a.slice(16, -3);
                // console.log(dn, job);
                // alert(dn, job);
                input1.focus();
                csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('validasi') }}",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        '_token': csrf_token,
                        'dn_no': dn,
                        'job_no': job
                    },
                    success: function(data) {
                        // console.log(data);
                        var a = data['0'];
                        var b = data['0']['dn_no'];
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
                            $('#dn_no').val(b);
                            $('#job_no').val(c);
                            $('#part_no').val(d);
                        }
                    },
                    // error: function() {}

                    // alert(dn, job);
                });
            } else {

                reset.removeClass("d-none")
                input1.attr("readonly", true);
            }
        }

        // });
        // Event Keykdown untuk keyboard lalu jalankan function
        input1.on("keydown", function(e) {
            // var keyCode = e.which;
            // Enter
            if (event.key === "Enter") {
                checkInput();
                return false;
            }
        });
        input2.on("change", function(e) {
            if (input2.val() != ""); {
                input1.attr("readonly", false);
                var a = input2.val();
                var arr = a.split(',');
                var part_no = arr[2];
                var nilai2 = part_no.slice(0, 10);
                // alert(part_no);
                // console.log(nilai2)
                var part = document.getElementById('part_no').value;
                var nilai1 = part.slice(0, 10);
                // console.log(nilai1)
                if (nilai2 == nilai1) {
                    csrf_token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('getEkanbanAdmoutSp1') }}",
                        method: 'POST',
                        dataType: 'json',
                        data: $('#form').serialize(),
                        // success: function(data) {

                        success: function(data) {
                            // alert(data);
                            // var a = data;
                            // play Audio
                            // play Audio
                            document.getElementById('Audiosucces').play();
                            if (data == "A01") {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Tidak Ada Periode Yang Aktif  ',
                                });
                            } else if (data == "A02") {
                                // play Audio
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    timer: 2000,
                                    title: 'Perhatian',
                                    text: 'Kanban Sudah Di Submit',
                                });

                            } else if (data == "A03") {
                                // play Audio
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'success',
                                    title: 'success',
                                    timer: 2000,
                                    text: 'Berhasil Submit',
                                });

                            } else if (data == "A04") {
                                // play Audio
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Data Excel Belum di Upload ',
                                });

                            } else if (data == "A05") {
                                // play Audio
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Quantity Scan Sudah Melebihi Quantity Pengiriman ',
                                });

                            } else if (data == "A06") {
                                // play Audio
                                document.getElementById('Audiosucces').play();
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Perhatian',
                                    timer: 2000,
                                    text: 'Kanban Belum di Scan In ',
                                });

                            }

                            // $('#input1').val("");
                            // $('#input2').val("");
                            // $('#input1').focus();
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
            input1.val("");
            input2.val("");
            input1.focus();
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
