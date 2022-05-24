var btn_new = document.querySelector("#new_element");
var table = document.querySelector("table");
var btns_supprimer = document.querySelectorAll(".btn-danger");
var btns_modifier = document.querySelectorAll(".btn-warning");


// console.log(document.querySelector(".sjklk"));
if (btn_new != null) {
    btn_new.addEventListener("click", (e) => {
        switch (btn_new.getAttribute("data-name")) {
            case "classe":
                // alert("classe");
                newLineClasse(table);
                break;
            case "professeur":
                showFormInscription(e, table);
                break;
            case "module":
                newLineModule(table);
                break;
            case "inscription":
                showFormInscriptionEtudiant(e);
                break;
            default:
                break;
        }
    })

}

if (btns_supprimer != null) {
    btns_supprimer.forEach(btn => {
        btn.addEventListener("click", (e) => {
            // console.log(e.target.value); 
            switch (table.getAttribute("data-name")) {
                case "classe":
                    delete_classe(e);
                    break;
                case "professeur":
                    delete_professeur(e);
                    break;
                case "module":
                    delete_module(e);
                    break;
                default:
                    break;
            }

        })
    });
}

if (btns_modifier != null) {
    btns_modifier.forEach(btn => {
        btn.addEventListener("click", (e) => {
            // console.log(e.target.value); 
            switch (table.getAttribute("data-name")) {
                case "classe":
                    modifier_classe(e);
                    break;
                    // case "professeur":
                    //     delete_professeur(e);
                    //     break;
                    // case "module":
                    //     delete_module(e);
                    //     break;
                default:
                    break;
            }

        })
    });
}

async function delete_professeur(e) {
    let result = await fetch_delete_professeur(e.target.value);
    console.log(result);
    if (result > 0) {
        // console.log(e.target.parentElement.parentElement);
        let alert = document.querySelector(".alert-success");
        alert.innerHTML = "Professeur supprimé avec succés";
        alert.classList.remove("hide");
        e.target.parentElement.parentElement.classList.add("pulse");
        setTimeout(() => {
            e.target.parentElement.parentElement.parentElement.removeChild(e.target.parentElement.parentElement);
        }, 2000)
        setTimeout(() => {
            alert.classList.add("hide");
        }, 8000);
    }

    async function fetch_delete_professeur(object) {
        const form = new FormData()
        form.append("idSupprimer", object);
        try {
            let response = await fetch(`http://localhost:8002/Professeur/supprimer`, {
                method: "POST",
                body: form
            });
            return await response.text();
        } catch (error) {
            console.log(error);
        }
    }
}

async function delete_classe(e) {
    let result = await fetch_delete_classe(e.target.value);
    console.log(result);
    if (result > 0) {
        // console.log(e.target.parentElement.parentElement);
        let alert = document.querySelector(".alert-success");
        alert.innerHTML = "Classe supprimé avec succés";
        alert.classList.remove("hide");
        e.target.parentElement.parentElement.classList.add("pulse");
        setTimeout(() => {
            e.target.parentElement.parentElement.parentElement.removeChild(e.target.parentElement.parentElement);
        }, 2000)
        setTimeout(() => {
            alert.classList.add("hide");
        }, 8000);
    }

    async function fetch_delete_classe(object) {
        const form = new FormData()
        form.append("idSupprimer", object)
        try {
            let response = await fetch(`http://localhost:8002/Classe/supprimer`, {
                method: "POST",
                body: form
            });
            return await response.text();

        } catch (error) {
            console.log(error);
        }
    }
}


async function delete_module(e) {
    let result = await fetch_delete_module(e.target.value);
    console.log(result);
    if (result > 0) {
        // console.log(e.target.parentElement.parentElement);
        let alert = document.querySelector(".alert-success");
        alert.innerHTML = "Module supprimé avec succés";
        alert.classList.remove("hide");
        e.target.parentElement.parentElement.classList.add("pulse");
        setTimeout(() => {
            e.target.parentElement.parentElement.parentElement.removeChild(e.target.parentElement.parentElement);
        }, 2000)
        setTimeout(() => {
            alert.classList.add("hide");
        }, 8000);
    }

    async function fetch_delete_module(object) {
        const form = new FormData()
        form.append("idSupprimer", object)

        try {

            let response = await fetch(`http://localhost:8002/Module/supprimer`, {
                method: "POST",
                body: form
            });

            return await response.text();

        } catch (error) {
            console.log(error);
        }

    }
}

function newLineClasse(table) {
    let tr = document.createElement("tr");
    for (let i = 0; i < 3; i++) {
        let td = document.createElement("td");
        let input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("class", "input-td");
        input.setAttribute("name", "classes[]");
        input.placeholder = "Champ Obligatoire";


        td.appendChild(input);
        tr.appendChild(td);

        input.addEventListener("focus", () => {
            input.style.border = "1px solid blue";
        });
        input.addEventListener("blur", () => {
            if (input.value == "") {
                input.style.border = "1px solid red";
                // alert("Please");
            } else {
                input.style.border = "1px solid green";
            }
        })
    }
    let td = document.createElement("td");
    td.classList.add("td-action");
    let btn_ajouter = document.createElement("button");
    let btn_annuler = document.createElement("button");
    btn_ajouter.innerHTML = "Ajouter";
    btn_annuler.innerHTML = "Annuler";
    btn_ajouter.setAttribute("class", "btn btn-success");
    btn_annuler.setAttribute("class", "btn btn-primary");
    td.appendChild(btn_ajouter);
    td.appendChild(btn_annuler);
    tr.appendChild(td);
    // table.appendChild(tr);
    table.querySelector("tbody").appendChild(tr);

    btn_ajouter.addEventListener("click", async() => {
        let inputs = tr.querySelectorAll("input[name='classes[]']");
        var errors = 0;
        // var data_classe = []
        inputs.forEach(el => {
            if (el.value == "") {
                el.style.border = '1px solid red';
                el.classList.add("bounce");
                setTimeout(() => {
                    el.classList.remove("bounce");
                    el.style.border = '';
                    el.placeholder = "Champ Obligatoire";
                }, 3000);
                errors++;
            } else {
                el.style.border = '1px solid green';
            }
        });
        if (errors == 0) {
            var data_classe = {
                libelle: inputs[0].value,
                filiere: inputs[1].value,
                niveau: inputs[2].value
            };

            let result = await fetch_classe(data_classe);
            if (result > 0) {
                // console.log(result);
                let alert = document.querySelector(".alert-success");
                alert.classList.remove("hide");
                setTimeout(() => {
                    alert.classList.add("hide");
                }, 8000);

                inputs.forEach(elt => {
                    elt.parentElement.innerHTML = elt.value;
                });

                td.innerHTML = "";
                let btn_modifier = document.createElement("button");
                let btn_supprimer = document.createElement("button");
                btn_modifier.setAttribute("class", "btn btn-warning");
                btn_supprimer.setAttribute("class", "btn btn-danger");
                btn_modifier.innerHTML = "Modifier";
                btn_supprimer.innerHTML = "Supprimer";
                btn_modifier.value = result;
                btn_supprimer.value = result;
                td.appendChild(btn_modifier);
                td.appendChild(btn_supprimer);
                td.parentElement.classList.add("pulse");
                setTimeout(() => {
                    td.parentElement.classList.remove("pulse");
                }, 3000);

                btn_supprimer.addEventListener("click", async(e) => {
                    delete_classe(e)
                })
            }
        }
        // console.log(inputs);
    });


    btn_annuler.addEventListener("click", () => {
        table.querySelector("tbody").removeChild(tr)
    });

    async function fetch_classe(object) {
        const form = new FormData()
        form.append("data", JSON.stringify(object))
        try {
            let response = await fetch("http://localhost:8002/Classe/add", {
                method: "POST",
                body: form
            });
            return await response.text();

        } catch (error) {
            console.log(error);
        }
    }
}



function newLineModule(table) {
    // alert(table)
    console.log(table);
    let tr = document.createElement("tr");
    let td = document.createElement("td");
    let input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "input-td");
    input.setAttribute("name", "module");
    input.placeholder = "Champ Obligatoire";

    td.appendChild(input);
    tr.appendChild(td);

    input.addEventListener("focus", () => {
        input.style.border = "1px solid blue";
    });
    input.addEventListener("blur", () => {
        if (input.value == "") {
            input.style.border = "1px solid red";
            // alert("Please");
        } else {
            input.style.border = "1px solid green";
        }
    })

    let td1 = document.createElement("td");
    td1.classList.add("td-action");
    let btn_ajouter = document.createElement("button");
    let btn_annuler = document.createElement("button");
    btn_ajouter.innerHTML = "Ajouter";
    btn_annuler.innerHTML = "Annuler";
    btn_ajouter.setAttribute("class", "btn btn-success");
    btn_annuler.setAttribute("class", "btn btn-primary");
    td1.appendChild(btn_ajouter);
    td1.appendChild(btn_annuler);
    tr.appendChild(td1);
    // table.appendChild(tr);
    table.querySelector("tbody").appendChild(tr);

    btn_ajouter.addEventListener("click", async() => {
        let inputs = tr.querySelectorAll("input[name='module']");
        var errors = 0;
        // var data_classe = []
        inputs.forEach(el => {
            if (el.value == "") {
                el.style.border = '1px solid red';
                el.classList.add("bounce");
                setTimeout(() => {
                    el.classList.remove("bounce");
                    el.style.border = '';
                    el.placeholder = "Champ Obligatoire";
                }, 3000);
                errors++;
            } else {
                el.style.border = '1px solid green';
            }
        });
        if (errors == 0) {
            var data_module = {
                libelle: inputs[0].value
            };

            let result = await fetch_module(data_module);
            if (result > 0) {
                let alert = document.querySelector(".alert-success");
                alert.classList.remove("hide");
                inputs.forEach(elt => {
                    elt.parentElement.innerHTML = elt.value;
                });
                td1.innerHTML = "";
                let btn_modifier = document.createElement("button");
                let btn_supprimer = document.createElement("button");
                btn_modifier.setAttribute("class", "btn btn-warning");
                btn_supprimer.setAttribute("class", "btn btn-danger");
                btn_modifier.innerHTML = "Modifier";
                btn_supprimer.innerHTML = "Supprimer";
                btn_modifier.value = result;
                btn_supprimer.value = result;
                td1.appendChild(btn_modifier);
                td1.appendChild(btn_supprimer);

                td1.parentElement.classList.add("pulse");
                setTimeout(() => {
                    td1.parentElement.classList.remove("pulse");
                }, 3000);

                btn_supprimer.addEventListener("click", async(e) => {
                    delete_module(e)
                })

            } else {
                let alert = document.querySelector(".alert-danger");
                alert.classList.remove("hide");
                setTimeout(() => {
                    alert.classList.add("hide");
                }, 8000);
            }


        }
        // console.log(inputs);
        async function fetch_module(object) {
            const form = new FormData()
            form.append("data", JSON.stringify(object))
            try {
                let response = await fetch("http://localhost:8002/Module/add", {
                    method: "POST",
                    body: form
                });
                return await response.text();

            } catch (error) {
                console.log(error);
            }
        }
    })

    btn_annuler.addEventListener("click", () => {
        table.querySelector("tbody").removeChild(tr);
    })



}

async function showFormInscription(e, table) {
    document.querySelector(".titre").innerHTML = "Nouveau Professeur";
    table.classList.add("hide");
    document.querySelector(".form-prof").classList.remove("hide");
    btn_new.parentElement.classList.add("hide");

    data_modules = await getDataModule();
    data_classes = await getDataClasse();
    // console.log(data_modules[0].id);

    data_modules.forEach(module => {
        newCheckbox(module);
    });

    data_classes.forEach(classe => {
        newCheckboxClasse(classe);
    });

    document.querySelector("button[name='ajout-professeur']").addEventListener("click", async(e) => {
        e.preventDefault();
        let form = new FormData(document.querySelector("#form-inscription-prof"))
        let result = await fetchProfesseur(form);

        if (result > 0) {
            document.querySelector(".alert-success").classList.remove("hide");
            setTimeout(() => {
                document.querySelector(".alert-success").classList.add("hide");
            }, 8000);
        } else {
            document.querySelector(".alert-danger").classList.remove("hide");
            setTimeout(() => {
                document.querySelector(".alert-danger").classList.add("hide");
            }, 8000);

        }

    })

    async function getDataModule() {
        try {
            let reponse = await fetch("http://localhost:8002/Module/lister", {
                method: "POST"
            });
            return await reponse.json();
        } catch (error) {
            console.log(error);
        }
    }

    async function fetchProfesseur(form) {
        try {
            let response = await fetch("http://localhost:8002/Professeur/add", {
                method: "POST",
                body: form
            });
            if (response.status == 200) {
                return await response.text();
            } else {
                return 0;
            }

        } catch (error) {
            console.log(error);
        }
    }

}


function newCheckbox(module) {
    /*
        <div class="form-check form-check-inline">
                              <input type="checkbox" class="form-check-input" name="module[]" id="" value="checkedValue">
                              <label class="form-check-label" for="">
                                Display value
                              </label>
                        </div>
    */

    let div_checkbox = document.createElement("div");
    let input_checkbox = document.createElement("input");
    let label_checkbox = document.createElement("label");
    div_checkbox.setAttribute("class", "form-check form-check-inline");
    input_checkbox.setAttribute("type", "checkbox");
    input_checkbox.setAttribute("class", "form-check-input");
    input_checkbox.setAttribute("name", "modules[]");
    label_checkbox.setAttribute("class", "form-check-label");
    input_checkbox.value = module.id;
    label_checkbox.innerHTML = module.libelle;
    div_checkbox.appendChild(input_checkbox);
    div_checkbox.appendChild(label_checkbox);

    document.querySelector('.info-module').appendChild(div_checkbox);

}

function newCheckboxClasse(classe) {
    let div_checkbox = document.createElement("div");
    let input_checkbox = document.createElement("input");
    let label_checkbox = document.createElement("label");
    div_checkbox.setAttribute("class", "form-check form-check-inline");
    input_checkbox.setAttribute("type", "checkbox");
    input_checkbox.setAttribute("class", "form-check-input");
    input_checkbox.setAttribute("name", "classes[]");
    label_checkbox.setAttribute("class", "form-check-label");
    input_checkbox.value = `${classe.id}`;
    label_checkbox.innerHTML = `${classe.libelle} Filiere: ${classe.filiere} Niveau: ${classe.niveau}`;
    div_checkbox.appendChild(input_checkbox);
    div_checkbox.appendChild(label_checkbox);

    document.querySelector('.info-classe').appendChild(div_checkbox);

}


async function showFormInscriptionEtudiant(e) {
    document.querySelector(".titre").innerHTML = "Nouvelle Inscription";
    table.classList.add("hide");
    let form_ins = document.querySelector(".form-insc");
    form_ins.classList.remove("hide");
    btn_new.parentElement.classList.add("hide");

    // data_modules = await getDataModule();
    data_classes = await getDataClasse();

    data_classes.forEach(classe => {
        option = document.createElement("option");
        option.innerHTML = `${classe.libelle} ${classe.niveau} ${classe.filiere}`;
        option.value = classe.id
        console.log(form_ins.querySelector(".select-classe"));
        form_ins.querySelector(".select-classe").appendChild(option);
    });

    document.querySelector("button[name='ajout-inscription-etu']").addEventListener("click", async(e) => {
        e.preventDefault();
        let form = new FormData(document.querySelector("#form-inscription-etu"))
        let result = await fetchInscription(form);

        if (result > 0) {
            document.querySelector(".alert-success").classList.remove("hide");
            setTimeout(() => {
                document.querySelector(".alert-success").classList.add("hide");
            }, 8000);
        } else {
            document.querySelector(".alert-danger").classList.remove("hide");
            setTimeout(() => {
                document.querySelector(".alert-danger").classList.add("hide");
            }, 8000);

        }

    })

    async function fetchInscription(form) {
        try {
            let response = await fetch("http://localhost:8002/Inscription/add", {
                method: "POST",
                body: form
            });
            if (response.status == 200) {
                return await response.text();
            } else {
                return 0;
            }

        } catch (error) {
            console.log(error);
        }
    }



}

async function getDataClasse() {
    try {
        let reponse = await fetch("http://localhost:8002/Classe/lister", {
            method: "POST"
        });
        return await reponse.json();
    } catch (error) {
        console.log(error);
    }
}

function modifier_classe(e) {

}