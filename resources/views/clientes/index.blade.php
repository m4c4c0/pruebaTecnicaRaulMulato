@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Clientes</h2>
    <button id="toggleForm" class="btn btn-success">Nuevo Registro</button>
</div>

<!-- Contenedor principal del formulario -->
<div id="mainFormContainer" class="form-container mb-4" style="display: none;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Seleccione el tipo de registro</h5>
        </div>
        <div class="card-body">
            <select id="tipoRegistro" class="form-select">
                <option value="">-- Seleccione --</option>
                <option value="consumidor">CONSUMIDOR FINAL</option>
                <option value="empresa">EMPRESA</option>
                <option value="extranjero">EXTRANJERO</option>
                <option value="proveedor">PROVEEDOR</option>
            </select>
        </div>
    </div>

    <!-- Formulario para Consumidor Final -->
    <div id="consumidorForm" class="form-tipo" style="display: none;">
        <form id="consumidorFormData" class="mt-3">
            @csrf
            <input type="hidden" name="tipo_cliente" value="1">
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_documento_tipo" class="form-label">Tipo Documento</label>
                    <select class="form-select" id="empresa_documento_tipo" name="cod_tipo_documento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($documentos as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->tipo_documento }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="consumidor_dui_nit" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="consumidor_dui_nit" name="dui_nit" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="consumidor_nombre" class="form-label">Razón Social / Nombre del cliente</label>
                    <input type="text" class="form-control" id="consumidor_nombre" name="nombre" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="consumidor_nombre_comercial" class="form-label">Nombre Comercial</label>
                    <input type="text" class="form-control" id="consumidor_nombre_comercial" name="nombre_comercial" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="consumidor_correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="consumidor_correo" name="correo" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="consumidor_direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="consumidor_direccion" name="direccion" required>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="cancelForm">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    
    <!-- Formulario para Empresa -->
    <div id="empresaForm" class="form-tipo" style="display: none;">
        <form id="empresaFormData" class="mt-3">
            @csrf
            <input type="hidden" name="tipo_cliente" value="2">
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_documento_tipo" class="form-label">Tipo Documento</label>
                    <select class="form-select" id="empresa_documento_tipo" name="cod_tipo_documento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($documentos as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->tipo_documento }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_documento_numero" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="empresa_documento_numero" name="dui_nit" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_nrc" class="form-label">NRC/IVA</label>
                    <input type="text" class="form-control" id="empresa_nrc" name="nrc" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_razon_social" class="form-label">Razón Social / Nombre del cliente</label>
                    <input type="text" class="form-control" id="empresa_razon_social" name="nombre" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_nombre_comercial" class="form-label">Nombre Comercial</label>
                    <input type="text" class="form-control" id="empresa_nombre_comercial" name="nombre_comercial" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="empresa_telefono" name="telefono" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="empresa_correo" name="correo" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_giro" class="form-label">Giro</label>
                    <select class="form-select" id="empresa_giro" name="cod_actividad_economica" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($giros as $giro)
                            <option value="{{ $giro->id }}">{{ $giro->actividad_economica }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_tipo_contribuyente" class="form-label">Tipo de contribuyente</label>
                    <select class="form-select" id="empresa_tipo_contribuyente" name="id_tipo_contribuyente" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($contribuyentes as $contribuyente)
                            <option value="{{ $contribuyente->id }}">{{ $contribuyente->tipo_contribuyente }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_tipo_persona" class="form-label">Tipo de persona</label>
                    <select class="form-select" id="empresa_tipo_persona" name="tipo_persona" required>
                        <option value="">-- Seleccione --</option>
                        <option value="1">NATURAL</option>
                        <option value="2">JURIDICO</option>
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_departamento" class="form-label">Departamento</label>
                    <select class="form-select" id="empresa_departamento" name="cod_departamento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->cod_mh_departamento }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="empresa_municipio" class="form-label">Municipio</label>
                    <select class="form-select" id="empresa_municipio" name="cod_municipio" required>
                        <option value="">-- Seleccione --</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="empresa_descripcion" class="form-label">Descripción adicional</label>
                    <textarea class="form-control" id="empresa_descripcion" name="descripcion_adicional" rows="2"></textarea>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="empresa_ciudad" name="ciudad" required>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="cancelForm">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    

    <!-- Formulario para Extranjero -->
    <div id="extranjeroForm" class="form-tipo" style="display: none;">
        <form id="extranjeroFormData" class="mt-3">
            @csrf
            <input type="hidden" name="tipo_cliente" value="3">
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_documento_tipo" class="form-label">Tipo Documento</label>
                    <select class="form-select" id="empresa_documento_tipo" name="cod_tipo_documento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($documentos as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->tipo_documento }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_documento_numero" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="extranjero_documento_numero" name="dui_nit" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_razon_social" class="form-label">Razón Social / Nombre del cliente</label>
                    <input type="text" class="form-control" id="extranjero_razon_social" name="nombre" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_nombre_comercial" class="form-label">Nombre Comercial</label>
                    <input type="text" class="form-control" id="extranjero_nombre_comercial" name="nombre_comercial" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="extranjero_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="extranjero_telefono" name="telefono" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="extranjero_correo" name="correo" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_pais" class="form-label">Pais</label>
                    <select class="form-select" id="extranjero_pais" name="region" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($paises as $pais)
                            <option value="{{ $pais->nombre }}">{{ $pais->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="extranjero_descripcion" class="form-label">Descripción adicional</label>
                    <textarea class="form-control" id="extranjero_descripcion" name="descripcion_adicional" rows="1"></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="extranjero_direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="extranjero_direccion" name="direccion" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="extranjero_ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="extranjero_ciudad" name="ciudad" required>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="cancelForm">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Formulario para Proveedor -->
    <div id="proveedorForm" class="form-tipo" style="display: none;">
        <form id="proveedorFormData" class="mt-3">
            @csrf
            <input type="hidden" name="tipo_cliente" value="4">
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="empresa_documento_tipo" class="form-label">Tipo Documento</label>
                    <select class="form-select" id="empresa_documento_tipo" name="cod_tipo_documento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($documentos as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->tipo_documento }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="proveedor_documento_numero" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="proveedor_documento_numero" name="dui_nit" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="proveedor_razon_social" class="form-label">Razón Social / Nombre del cliente</label>
                    <input type="text" class="form-control" id="proveedor_razon_social" name="nombre" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="proveedor_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="proveedor_telefono" name="telefono" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="proveedor_correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="proveedor_correo" name="correo" required>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="empresa_departamento" class="form-label">Departamento</label>
                    <select class="form-select" id="empresa_departamento" name="cod_departamento" required>
                        <option value="">-- Seleccione --</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->cod_mh_departamento }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="proveedor_municipio" class="form-label">Municipio</label>
                    <select class="form-select" id="proveedor_municipio" name="cod_municipio" required>
                        <option value="">-- Seleccione --</option>
                        <!-- Opciones de municipio -->
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="proveedor_descripcion" class="form-label">Descripción adicional</label>
                    <textarea class="form-control" id="proveedor_descripcion" name="descripcion_adicional" rows="1"></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="proveedor_direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="proveedor_direccion" name="direccion" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="proveedor_ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="proveedor_ciudad" name="ciudad" required>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" id="cancelForm">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de registros -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center">
        <span class="me-2">Mostrar</span>
        <select class="form-select form-select-sm" style="width: 80px;" id="perPage">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <span class="ms-2">registros</span>
    </div>
    <div class="input-group" style="width: 300px;">
        <input type="text" class="form-control" placeholder="Buscar..." id="searchInput">
        <button class="btn btn-outline-secondary" type="button" id="searchBtn">
            <i class="bi bi-search"></i>
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>Dirección</th>
                <th>N° Documento</th>
                <th>NRC</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="registrosTableBody">
            @foreach($clientes as $cliente)
            <tr id="registro-{{ $cliente->id }}">
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->nombre_comercial ?? '-' }}</td>
                <td>{{ $cliente->cod_tipo_documento }}</td>
                <td>{{ $cliente->dui_nit }}</td>
                <td>{{ $cliente->nrc ?? 'N/A' }}</td>
                <td>{{ $cliente->correo ?? '-' }}</td>
                <td class="action-buttons">
                    <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $cliente->id }}">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $cliente->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if($clientes->isEmpty())
    <div class="alert alert-info">No hay registros</div>
@endif

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Mostrar/ocultar el contenedor principal del formulario
    $('#toggleForm').click(function() {
        $('#mainFormContainer').toggle();
        $('.form-tipo').hide();
        $('#tipoRegistro').val('');
    });
    
    // Cancelar formulario
    $(document).on('click', '#cancelForm', function() {
        $('#mainFormContainer').hide();
        $('.form-tipo').hide();
        $('#tipoRegistro').val('');
        $('[id$="FormData"]').removeData('id').trigger('reset');
    });
    
    // Cambiar entre tipos de formularios
    $('#tipoRegistro').change(function() {
        const tipo = $(this).val();
        $('.form-tipo').hide();
        
        if (tipo) {
            $(`#${tipo}Form`).show();
        }
    });
    
    // Cargar municipios
    $(document).on('change', '[id$="_departamento"]', function() {
        const codDepartamento = $(this).val();
        const municipioSelect = $(this).closest('.row').find('select[name="cod_municipio"]');
        
        municipioSelect.html('<option value="">-- Seleccione --</option>');
        
        if (codDepartamento) {
            $.get(`/municipios/${codDepartamento}`, function(municipios) {
                municipios.forEach(function(municipio) {
                    municipioSelect.append(
                        `<option value="${municipio.cod_mh_municipio}">${municipio.municipio}</option>`
                    );
                });
            }).fail(function() {
                toastr.error('Error al cargar los municipios');
            });
        }
    });
    
    // Guardar cliente
    $('[id$="FormData"]').submit(function(e) {
        e.preventDefault();
        const form = $(this);
        const isEdit = form.data('id') !== undefined;
        const url = isEdit ? `/clientes/${form.data('id')}` : '/clientes';
        const method = isEdit ? 'PUT' : 'POST';
        
        $.ajax({
            url: url,
            type: method,
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    $('#mainFormContainer').hide();
                    $('.form-tipo').hide();
                    form.trigger('reset');
                    // Recargar la tabla
                    setTimeout(() => location.reload(), 1000);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    
                    $.each(errors, function(key, value) {
                        errorMessages += `<li>${value}</li>`;
                    });
                    
                    toastr.error(`<ul>${errorMessages}</ul>`, 'Error de validación');
                } else {
                    toastr.error(xhr.responseJSON?.message || 'Error en el servidor');
                }
            }
        });
    });

    // Editar cliente
    $(document).on('click', '.edit-btn', function() {
        const id = $(this).data('id');
        $.get(`/clientes/${id}/edit`, function(response) {
            $('#mainFormContainer').show();
            let formType = '';
            switch(response.tipo_cliente) {
                case 1: formType = 'consumidor'; break;
                case 2: formType = 'empresa'; break;
                case 3: formType = 'extranjero'; break;
                case 4: formType = 'proveedor'; break;
            }
            $('#tipoRegistro').val(formType).trigger('change');
            const form = $(`#${formType}FormData`);
            form.data('id', id);
            for (const key in response) {
                if (response.hasOwnProperty(key) && key !== 'municipios') {
                    const input = form.find(`[name="${key}"]`);
                    if (input.length) {
                        input.val(response[key]);
                        if (input.is('select')) {
                            input.trigger('change');
                        }
                    }
                }
            }
            if (response.cod_departamento) {
                const deptoSelect = form.find('select[name="cod_departamento"]');
                deptoSelect.trigger('change');
                setTimeout(() => {
                    const municipioSelect = form.find('select[name="cod_municipio"]');
                    if (response.cod_municipio) {
                        municipioSelect.val(response.cod_municipio);
                    }
                }, 500);
            }
            form.find('button[type="submit"]').text('Actualizar');
        }).fail(function() {
            toastr.error('Error al cargar los datos del cliente');
        });
    });

    // Eliminar cliente
    $(document).on('click', '.delete-btn', function() {
        const id = $(this).data('id');
        
        if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
            $.ajax({
                url: `/clientes/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $(`#registro-${id}`).remove();
                    }
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || 'Error al eliminar el cliente');
                }
            });
        }
    });

    // Validación del formato del teléfono
    $('[name="telefono"]').on('blur', function() {
        const telefono = $(this).val();
        const regex = /^\d{4}-\d{4}$/;
        
        if (telefono && !regex.test(telefono)) {
            $(this).addClass('is-invalid');
            $(this).after('<div class="invalid-feedback">El formato debe ser ####-#### (ej: 1111-1111)</div>');
        } else {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        }
    });
});

</script>
@endsection