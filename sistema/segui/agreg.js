const addBtnEvide = document.querySelector('#addBtnEvide');
const tableBoTr = document.querySelector('#eviComp tbody');

addBtnEvide.addEventListener('click', () => {
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="mtu[]" id="mtu" rows="1" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Factura-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select name="ftu[]" id="ftu" class="form-select">
                            <option value="Selecciona una opción">Selecciona una opción</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Falta">Falta</option>
                            <option value="NA">NA</option>
                        </select>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Proveedor 1-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="pvu[]" id="pvu" rows="1" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Carta-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select name="ctu[]" id="ctu" class="form-select">
                            <option value="Selecciona una opción">Selecciona una opción</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Falta">Falta</option>
                            <option value="NA">NA</option>
                        </select>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Proveedor 2-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="pou[]" id="pou" rows="1" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Observaciones-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="obu[]" id="obu" rows="1" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </td>
        
    `;
    tableBoTr.appendChild(newRow);
});

const btnRevProt = document.querySelector('#btnRevProt');
const tableBody = document.querySelector('#revprot tbody');

btnRevProt.addEventListener('click', () => {
    const newRo = document.createElement('tr');
    newRo.innerHTML = `
        <td>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="rpu[]" id="rpu[]" rows="1" class="form-control" placeholder="Maximo '' caracteres"></textarea>
                    </div>
                </div>
            </div>
        </td>
        <td><!--lugar de uso-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select name="rlu[]" id="rlu[]" class="form-select">
                            <option value="Selecciona una opción">Selecciona una opción</option>
                            <option value="Caja">Caja</option>
                            <option value="Etiqueta">Etiqueta</option>
                            <option value="Empaque">Empaque</option>
                            <option value="Costal">Costal</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
            </div>
        </td>
        <td><!--Ancho prototipo-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="rau[]" name="rau[]" type="number" class="form-control" step="0.01">
                    </div>
                </div>
            </div>
        </td>
        <td><!--Medida actual-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="rmu[]" name="rmu[]" type="number" class="form-control" step="0.01">
                    </div>
                </div>
            </div>
        </td>
        <td><!--Medida correcta-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="rlu[]" name="rlu[]" type="number" class="form-control" step="0.01">
                    </div>
                </div>
            </div>
        </td>
        <td><!--Observaciones-->
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea name="rou[]" id="rou[]" rows="1" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </td>
    `;
    tableBody.appendChild(newRo);
});

/*const deleteRowBtn = document.querySelectorAll('.deleteRowBtn');
const tableBod = document.querySelector('#eviComp tbody');

deleteRowBtn.forEach( (btn) => {
    btn.addEventListener('click', () => {
        const row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    });
});*/