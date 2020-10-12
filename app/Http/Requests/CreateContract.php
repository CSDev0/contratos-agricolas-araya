<?php

namespace App\Http\Requests;

use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateContract extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'inscriptionNumber' => 'required|string|max:255',
            'buyerName' => 'required|string|max:150',
            'buyerRut' => 'required|string|max:12|min:9',
            'sellerName' => 'required|string|max:150',
            'sellerRut' => 'required|string|max:12|min:9',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'file' => 'max:50000|required|mimes:pdf'
        ];
    }

    public function attributes() {
        return [
            'inscriptionNumber' => 'número de inscripción del contrato',
            'buyerName' => 'Nombre del comprador',
            'buyerRut' => 'RUT del comprador',
            'sellerName' => 'Nombre del vendedor',
            'sellerRut' => 'RUT del vendedor',
            'startDate' => 'Fecha de inicio del contrato',
            'endDate' => 'Fecha de termino del contrato',
            'observations' => 'Observaciones',
            'file' => 'Documento del contrato'
            ];
    }

//    public function messages() {
//        return [
//            'inscriptionNumber.required' => 'Debes ingresar el número de inscripción.',
//            'buyerName.required' => 'Debes ingresar el nombre del comprador.',
//                        'buyerName.max' => 'El nombre del comprador debe ser maximo 150 caracteres.',
//            'buyerRut.required' => 'Debes ingresar un rut.',
//            'file.required' => 'Debes subir un archivo del contrato.',
//            'file.max' => 'El archivo no debe exceder los 20MB de tamaño.',
//            'file.uploaded' => 'El archivo no pudo ser cargado.',
//            'file.mimes' => 'Debes subir un archivo de tipo PDF.',
//                // ..
//        ];
//    }

    public function response(array $errors) {
        return response()->json($errors, 422);
    }

}
