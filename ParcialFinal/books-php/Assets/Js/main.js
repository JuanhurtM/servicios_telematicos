let dataTable;
let dataTableIsInitialized = false;

const initDataTable = async () => {
  if (dataTableIsInitialized) {
    dataTable.destroy();
  }

  dataTable = $("#tableInicio").DataTable({});
  dataTableIsInitialized = true;
};

window.addEventListener("load", async () => {});
