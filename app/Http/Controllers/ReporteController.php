<?php

namespace App\Http\Controllers;


use App\Exports\PostulanteExport;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as Format;
use Illuminate\Support\Facades\Schema;

class ReporteController extends Controller
{
    public function inicio()
    {
        $columnase = ['genero','estadocivil','fechanac','ID_Cargo','ID_Departamento'];
        $columnasu = ['id','name','email','ci','telefono','direccion'];
        $columnasp = ['fecha_de_nacimiento','nacionalidad','habilidades','puntos','ID_Fuente_De_Contratacion','ID_Puesto_Disponible','ID_Idioma'];
        //dd($columnas);
        return (view('reportes.inicio',compact('columnase','departamentos','columnasp','columnasu')));
    }
    
    //Personalizado
    public function reporteempleadopersonalizado(Request $request)
    {
        // Obtener las columnas seleccionadas de empleados y usuarios
        $columnase = $request->input('columnasempleados', []);
        $columnasu = $request->input('columnasusuarios', []);

    }
    public function reportedepartamentoempleadopersonalizado(Request $request)
    {
        $columnase = $request->input('columnasempleados', []);
        $columnasu = $request->input('columnasusuarios', []);
     
    }
    public function reportepostulantepersonalizado(Request $request)
    {
        // Obtener las columnas seleccionadas de empleados y usuarios
        $columnasp = $request->input('columnaspostulantes', []);
        $columnasu = $request->input('columnasusuarios', []);

     
    }

   
   

}
