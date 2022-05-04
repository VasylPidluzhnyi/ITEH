document.getElementsByTagName("form")[0]
        .setAttribute("action", "update-query.php?id=" + id);
document.getElementById("btnSubmit")
        .setAttribute("value", "Change");

document.getElementById("1")
        .value = prevData.title;
document.getElementById("2")
        .value = prevData.link;
document.getElementById("3")
        .value = prevData.login;
document.getElementById("4")
        .value = prevData.pwd;
document.getElementById("6")
        .value = prevData.note;