$(document).ready(function () {
    $(".next").click(function () {
        var username = $("input#username").val();
        var tahap = $("input#tahap").val();
        var nilai = $("input#nilai").val();
//                    $.post("../set", {username: username,tahap: tahap, nilai: nilai});
        $.post("../set", {username: username,tahap: tahap, nilai: nilai});
    });
});
