"use strict";

// Resources/Public/assets/js/src/loader.ts
var Selectors = {
  Loader: "loader"
};
function showLoader() {
  const loader = document.getElementById(Selectors.Loader);
  if (loader) {
    loader.style.display = "block";
  } else {
    console.error("Loader element not found.");
  }
}
function hideLoader() {
  const loader = document.getElementById(Selectors.Loader);
  if (loader) {
    loader.style.display = "none";
  } else {
    console.error("Loader element not found.");
  }
}

// Resources/Public/assets/js/src/ajax.ts
var AjaxRequest = class {
  constructor(url, data) {
    this.url = url;
    this.data = data;
    this.responseData = document.getElementById("table-data" /* TableData */);
  }
  sendRequest() {
    const http = new XMLHttpRequest();
    http.open("POST", this.url, true);
    this.responseData.innerHTML = "";
    showLoader();
    http.onreadystatechange = () => {
      if (http.readyState === 4 && http.status === 200) {
        this.handleResponse(http.responseText);
        hideLoader();
      }
    };
    http.onerror = (e) => {
      console.log(e);
      hideLoader();
    };
    http.send(this.data);
  }
  handleResponse(responseText) {
    const template = document.createElement("template");
    template.innerHTML = responseText;
    const dataElement = template.content.querySelector("#" + "table-data" /* TableData */);
    if (dataElement) {
      this.responseData.innerHTML = dataElement.innerHTML;
    } else {
      this.responseData.innerHTML = "<h2 class='text-center'>No data Found<h2>";
    }
  }
};

// Resources/Public/assets/js/src/filter.ts
var Filter = class {
  constructor() {
    var _a;
    this.form = document.getElementById("myForm" /* Form */);
    this.url = (_a = this.form.getAttribute("action")) != null ? _a : "";
  }
  getSelectValue(id) {
    return document.getElementById(id).value;
  }
  prepareFormData() {
    const data = new FormData();
    data.append("modelName" /* ModelName */, this.getSelectValue("select1"));
    data.append("technologyName" /* TechnologyName */, this.getSelectValue("select2"));
    data.append("brandName" /* BrandName */, this.getSelectValue("select3"));
    return data;
  }
  applyFilter() {
    const data = this.prepareFormData();
    const ajaxRequest = new AjaxRequest(this.url, data);
    ajaxRequest.sendRequest();
  }
};

// Resources/Public/assets/js/src/pagination.ts
function jsPagination(data, model, technology, brandName) {
  var _a;
  if (data === "test")
    return;
  const id = `page${data}`;
  const url = (_a = document.getElementById(id).getAttribute("atr")) != null ? _a : "";
  const formData = new FormData();
  formData.append("modelName" /* ModelName */, model);
  formData.append("technologyName" /* TechnologyName */, technology);
  formData.append("brandName" /* BrandName */, brandName);
  const ajaxRequest = new AjaxRequest(url, formData);
  ajaxRequest.sendRequest();
}

// Resources/Public/assets/js/src/index.ts
var form = document.getElementById("filter" /* FilterButton */);
var filterInstance = new Filter();
form.addEventListener("click", () => filterInstance.applyFilter());
var resetButton = document.getElementById("reset" /* ResetButton */);
resetButton.addEventListener("click", function() {
  location.reload();
});
jsPagination("test", "modelName" /* ModelName */, "brandName" /* BrandName */, "technologyName" /* TechnologyName */);
