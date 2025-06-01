<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Paises;
use App\Models\Municipio;
use App\Models\Contribuyente;
use App\Models\Documento;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id')->paginate(10);
        $departamentos = Departamento::where('estado', '1')->get();
        $paises = Paises::all();
        $contribuyentes = Contribuyente::all();
        $documentos = Documento::all();
        $giros = Actividad::all();
        return view('clientes.index', compact('clientes', 'departamentos', 'paises', 'contribuyentes', 'documentos', 'giros'));
    }

    public function store(Request $request)
    {
        // Validacion general
        $rules = [
            'tipo_cliente' => 'required|in:1,2,3,4',
            'cod_tipo_documento' => 'required|in:1,2,3,4',
            'dui_nit' => 'required|string|max:20',
            'nombre' => 'required|string|max:255',
            'nombre_comercial' => 'nullable|string|max:255',
            'correo' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500',
            'telefono' => [
                'nullable',
                'string',
                'max:9',
                'regex:/^\d{4}-\d{4}$/'
            ],
        ];
        // Validacion según el tipo de cliente
        switch ($request->tipo_cliente) {
            case 2: // Empresa
                $rules['nrc'] = 'nullable|string|max:20';
                $rules['telefono'] = 'nullable|string|max:9|regex:/^\d{4}-\d{4}$/';
                $rules['cod_actividad_economica'] = 'nullable|string|max:100';
                $rules['id_tipo_contribuyente'] = 'nullable|integer';
                $rules['tipo_persona'] = 'nullable|integer';
                $rules['cod_departamento'] = 'nullable|string|max:10';
                $rules['cod_municipio'] = 'nullable|string|max:10';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
                
            case 3: // Extranjero
                $rules['telefono'] = 'nullable|string|max:9|regex:/^\d{4}-\d{4}$/';
                $rules['region'] = 'nullable|string|max:100';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
                
            case 4: // Proveedor
                $rules['telefono'] = 'nullable|string|max:9|regex:/^\d{4}-\d{4}$/';
                $rules['cod_departamento'] = 'nullable|string|max:10';
                $rules['cod_municipio'] = 'nullable|string|max:10';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
        }
        
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'in' => 'El valor seleccionado para :attribute no es válido.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'email' => 'El campo :attribute debe ser una dirección de correo válida.',
            'unique' => 'El número de documento ya está registrado.',
            'telefono.regex' => 'El formato del teléfono debe ser ####-#### (ej: 7817 7786)',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Por favor corrige los errores en el formulario',
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $cliente = Cliente::create($request->all());
            
            return response()->json([
                'success' => true,
                'message' => 'Cliente creado exitosamente',
                'cliente' => $cliente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(Cliente $cliente)
    {
        if ($cliente->cod_departamento) {
            $municipios = Municipio::where('cod_mh_departamento', $cliente->cod_departamento)->get();
            $cliente->municipios = $municipios;
        }
        return response()->json($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validacion general
        $rules = [
            'tipo_cliente' => 'nullable|integer',
            'cod_tipo_documento' => 'nullable|integer',
            'dui_nit' => 'required|string|max:20',
            'nombre' => 'required|string|max:255',
            'nombre_comercial' => 'nullable|string|max:255',
            'correo' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500',
        ];
        switch ($request->tipo_cliente) {
            case 2: // Empresa
                $rules['nrc'] = 'nullable|string|max:20';
                $rules['telefono'] = 'nullable|string|max:20';
                $rules['cod_actividad_economica'] = 'nullable|string|max:100';
                $rules['id_tipo_contribuyente'] = 'nullable|integer';
                $rules['tipo_persona'] = 'nullable|integer';
                $rules['cod_departamento'] = 'required|string|max:20';
                $rules['cod_municipio'] = 'required|string|max:20';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
                
            case 3: // Extranjero
                $rules['telefono'] = 'nullable|string|max:20';
                $rules['region'] = 'nullable|string|max:100';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
                
            case 4: // Proveedor
                $rules['telefono'] = 'nullable|string|max:20';
                $rules['cod_departamento'] = 'required|string|max:20';
                $rules['cod_municipio'] = 'nullable|string|max:2';
                $rules['descripcion_adicional'] = 'nullable|string|max:500';
                $rules['ciudad'] = 'nullable|string|max:100';
                break;
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $cliente->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Cliente actualizado exitosamente',
                'cliente' => $cliente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return response()->json([
                'success' => true,
                'message' => 'Cliente eliminado exitosamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }
}