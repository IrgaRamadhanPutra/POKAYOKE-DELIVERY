<script>
    // Deklarasi Variable
    var input1 = $("#input1");
    var input2 = $("#input2");
    var reset = $("#reset");

    //input field 1
    $(document).ready(function() {
        input1.focus();
        // $('.form').submit(function() {
        // cek data
        function checkInput() {
            if (input1.val() != "") { // input1.strsubsring(0, 16)
                var a = input1.val()
                // console.log(a);
                // console.log(dn, job);
                // alert(dn, job);
                input1.focus();
            } else if (input1.val() == "") {
                alert("Harap isi input 1");
                input1.focus();
            }
        }
        //input field 1
        input1.on("keydown", function(e) {
            // var keyCode = e.which;
            // Enter
            if (event.key === "Enter") {
                checkInput();
                input1.attr("readonly", true);
                input2.attr("readonly", false);
                input2.focus();
            }
        });
        //input field 2
        input2.on("change", function(e) {
            if (input2.val() != ""); {
                input1.attr("readonly", false);
                var a = input2.val();
                var arr = a.split(',');
                var part_no = arr[2];
                var text = part_no.replace("-", "");
                // console.log(part_no);
                var part = text.replace("-", "");
                var nilai2 = part.slice(0, 10);
                // console.log(nilai2);
                // var nilai1 = document.getElementById('').value;
                var par = input1.val()
                var nilai1 = par.slice(0, 10);
                // console.log(nilai1);

                // alert(nilai1);
                if (nilai1 == nilai2) {
                    document.getElementById('Audiosucces').play();
                    // alert('sama');
                    input1.val("");
                    input2.val("");
                    input1.focus();
                    swal.fire({
                        icon: 'success',
                        title: 'success',
                        timer: 2000,
                        text: 'Part no Sama',
                    });


                } else {
                    document.getElementById('Audioerror').play();
                    input1.val("");
                    input2.val("");
                    input1.focus();
                    swal.fire({
                        icon: 'error',
                        timer: 2000,
                        title: 'Error',
                        text: 'Part no Tidak Sama',
                    });
                }


                //     // $('#input1').val("");
                //     // $('#input2').val("");
                //     // $('#input1').focus();

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
