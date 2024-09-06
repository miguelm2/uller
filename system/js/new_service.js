let count_cassette = count_floor = count_window = count_split = count_mini = count_other = 0;

document.getElementById("add_cassette").addEventListener("click", function () {
    count_cassette++;
    let table = document.getElementById("service-table-cassette");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");

    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_cassette === 1 ? "cassette_install" : "cassette_uninstall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_cassette === 1) {
        serviceType = "Instalar";
    } else if (count_cassette === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_cassette").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});
document.getElementById("add_floor").addEventListener("click", function () {
    count_floor++;
    let table = document.getElementById("service-table-floor");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");
    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_floor === 1 ? "floor_install" : "floor_unistall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_floor === 1) {
        serviceType = "Instalar";
    } else if (count_floor === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_floor").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});
document.getElementById("add_window").addEventListener("click", function () {
    count_window++;
    let table = document.getElementById("service-table-window");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");
    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_window === 1 ? "window_install" : "window_unistall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_window === 1) {
        serviceType = "Instalar";
    } else if (count_window === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_window").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});

document.getElementById("add_split").addEventListener("click", function () {
    count_split++;
    let table = document.getElementById("service-table-split");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");
    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_split === 1 ? "split_install" : "split_uninstall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_split === 1) {
        serviceType = "Instalar";
    } else if (count_split === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_split").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});

document.getElementById("add_mini").addEventListener("click", function () {
    count_mini++;
    let table = document.getElementById("service-table-mini");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");
    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_mini === 1 ? "mini_install" : "mini_uninstall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_mini === 1) {
        serviceType = "Instalar";
    } else if (count_mini === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_mini").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});

document.getElementById("add_other").addEventListener("click", function () {
    count_other++;
    let table = document.getElementById("service-table-other");
    let newRow = document.createElement("tr");

    let cell1 = document.createElement("td");
    let input = document.createElement("input");
    input.type = "number";
    input.className = "form-control";
    input.placeholder = "Cantidad";
    input.name = count_other === 1 ? "other_install" : "other_uninstall";
    cell1.appendChild(input);

    let cell2 = document.createElement("td");
    let serviceType;
    if (count_other === 1) {
        serviceType = "Instalar";
    } else if (count_other === 2) {
        serviceType = "Desinstalar";
        document.getElementById("add_other").style.display = "none";
    }
    cell2.textContent = serviceType;

    newRow.appendChild(cell1);
    newRow.appendChild(cell2);

    table.appendChild(newRow);
});