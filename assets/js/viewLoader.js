export function loadView(containerId, view) {
    const url = "controllers/load_view.php?view=" + view;
    const xmlhttp = new XMLHttpRequest();
 
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(containerId).innerHTML = xmlhttp.responseText;
        }
    };
 
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}