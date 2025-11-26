<?php

    include_once "config/db_connection.php";
    include_once "app/models/ReportModel.php";
    include_once "public/libraries/phplot/phplot.php";
    include_once "public/libraries/fpdf/fpdf.php";

    class ReportController{

        private $model;

        public function __construct($connection){
            $this -> model = new ReportModel($connection);
        }

        public function generarGrafica(){

            $data = $this -> model -> consultarProductos();

            // Generar gráfica
            $plot = new PHPlot(800, 600);
            $plot->SetImageBorderType('plain');
            $plot->SetPlotType('bars'); // Tipo de gráfica
            $plot->SetDataType('text-data');
            $plot->SetDataValues($data);

            $plot->SetTitle('Marcas producto');
            $plot->SetXTitle('Nombre');
            $plot->SetYTitle('Marca');
            $plot->SetShading(5); 
            $plot->SetDataColors(['#007bff']);

            $filename = 'public/media/graphs/grafica_marca.png';
            $plot->SetOutputFile($filename);
            $plot->SetIsInline(true); // Guardar como archivo
            $plot->DrawGraph();

            // Generar reporte PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Reporte de Ventas', 0, 1, 'C');

            $pdf->Image($filename, 30, 30, 150, 100);
            $pdf-> Ln(115);

             // CABECERA DE TABLA
            $pdf->setFont('Arial', 'B', 12);
            $pdf->SetFillColor(0,0,0);
            $pdf->SetTextColor(255,255,255);

            $pdf->Cell(40,10,'ID',1,0,'C',true);
            $pdf->Cell(50,10,'Nombre',1,0,'C',true);
            $pdf->Cell(50,10,'Edad',1,0,'C',true);
            $pdf->Cell(50,10,'Fecha',1,0,'C',true);
            $pdf->Ln();

            $pdf->Output();

        }

        public function generarPDF(){
            $usuarios = $this -> model -> consultarUsuarios();

            $pdf = new FPDF();
            $pdf->AddPage();

            // TÍTULO DEL DOCUMENTO 
            $pdf->SetFont('Arial','B',16);
            $pdf -> Cell(0, 10, "Usuarios en la Base de Datos", 0,1,'C');
            $pdf -> Ln(10); // Salto de línea

            
            // CABECERA DE TABLA
            $pdf->setFont('Arial', 'B', 12);
            $pdf->SetFillColor(0,0,0);
            $pdf->SetTextColor(255,255,255);

            $pdf->Cell(40,10,'ID',1,0,'C',true);
            $pdf->Cell(50,10,'Nombre',1,0,'C',true);
            $pdf->Cell(50,10,'Edad',1,0,'C',true);
            $pdf->Cell(50,10,'Fecha',1,0,'C',true);
            $pdf->Ln();

            // CONTENIDO DE TABLA
            $pdf->setFont('Arial', 'B', 12);
            $pdf->SetTextColor(0,0,0);

            $edades = 0;
            $i = 0;

            foreach($usuarios as $u){
                $pdf->Cell(40,10,$u['id_list'],1,0,'C');
                $pdf->Cell(50,10,$u['nombre'],1,0,'C');
                $pdf->Cell(50,10,$u['edad'],1,0,'C');
                $pdf->Cell(50,10,$u['fecha'],1,0,'C');
                $pdf->Ln();

                $edades += (int) $u['edad'];
                $i++;
            }

            $promedioEdad = $edades/$i;

            $pdf -> Ln(10);
            $pdf -> Cell(0,10,'Promedio edad: ' .
            number_format($promedioEdad,2),0,1);

            $pdf->Output('D', 'reporte_usuarios');

        }

        public function generarPastel(){
            $data = $this->model->consultarMarcas();

            $plot = new PHPlot(600, 400);

            $plot->SetDataValues($data);
            $plot->SetPlotType('pie'); 
            $plot->SetDataType('text-data-single');


            $plot->SetTitle('Porcentaje de Productos por Marca');

            //$plot->SetPieLabelType('percent');

            $plot->SetLegend(array_column($data, 0));

            $filename = 'public/media/graphs/grafica_marcas.png';
            $plot->SetOutputFile($filename);
            $plot->SetIsInline(true); // Guardar como archivo
            $plot->DrawGraph();


            // Generar PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 10, 'Si', 0, 1, 'C');

            $pdf->Image($filename, 30, 30, 150, 100);
            $pdf-> Ln(115);

            
            $pdf -> Output();
    
    }

    }