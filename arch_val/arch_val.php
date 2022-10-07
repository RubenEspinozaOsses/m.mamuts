<?php

function tipoArc($grupo)
{
    $tipoGrupo = '';

    switch ($grupo) {
        case 1:
            $tipoGrupo = "Documento Contable";
            break;
        case 2:
            $tipoGrupo = "Validador";
            break;
        case 3:
            $tipoGrupo = "Acta Recepción";
            break;
        case "fot":
            $tipoGrupo = "Fotografía";
            break;
        case "fot-1":
            $tipoGrupo = "Fotografía Evaluación";
            break;
        case "fot-2":
            $tipoGrupo = "Fotografía Formalización";
            break;
        case "fot-3":
            $tipoGrupo = "Fotografía Adquisición";
            break;
        case "fot-4":
            $tipoGrupo = "Fotografía Seguimiento";
            break;
        case "doc":
            $tipoGrupo = "Documento Ejecución";
            break;
        case "doc-1":
            $tipoGrupo = "Contrato de Ejecución";
            break;
        case "doc-2":
            $tipoGrupo = "Plan de Inversión";
            break;
        case "doc-3":
            $tipoGrupo = "Solicitud Modificación Plan de Inversión";
            break;
        case "doc-4":
            $tipoGrupo = "Respuesta Modificación Plan de Inversión";
            break;
        case "doc-5":
            $tipoGrupo = "Solicitud Ampliación Plazo de Ejecución";
            break;
        case "doc-6":
            $tipoGrupo = "Respuesta Ampliación Plazo de Ejecución";
            break;
        case "doc-7":
            $tipoGrupo = "Acta de Asesoría";
            break;
        case "doc-8":
            $tipoGrupo = "Informe de Cierre";
            break;
        case "doc-9":
            $tipoGrupo = "Aporte Empresarial";
            break;
        case "doc-10":
            $tipoGrupo = "Solicitud Renuncia IVA";
            break;
        case "doc-11":
            $tipoGrupo = "Respuesta Renuncia IVA";
            break;
        case "doc-12":
            $tipoGrupo = "F29 Valida Exención IVA";
            break;
        case "doc-13":
            $tipoGrupo = "Solicitud Compra Bien Usado";
            break;
        case "doc-14":
            $tipoGrupo = "Respuesta Compra Bien Usado";
            break;
        default:
            break;
    }


    return $tipoGrupo;
}

function tipoExt($extArch)
{

    $tipoArchivo = "Sin Información";
    $extArch = strtolower($extArch);
    $tipoPpt = "Presentación Powerpoint";
    switch ($extArch) {
        case "txt":
            $tipoArchivo = "Texto Plano";
            break;
        case "doc":
            $tipoArchivo = "Procesador Word";
            break;
        case "docx":
            $tipoArchivo = "Procesador Word";
            break;
        case "xls":
            $tipoArchivo = "Hoja Cálculo Excel";
            break;
        case "xlsx":
            $tipoArchivo = "Hoja Cálculo Excel";
            break;
        case "xlm":
            $tipoArchivo = "Macro Excel";
            break;
        case "ppt":
            $tipoArchivo = $tipoPpt;
            break;
        case "pptx":
            $tipoArchivo = $tipoPpt;
            break;
        case "pps":
            $tipoArchivo = $tipoPpt;
            break;
        case "pdf":
            $tipoArchivo = "Adobe Acrobat";
            break;
        case "bmp":
            $tipoArchivo = "Imagen";
            break;
        case "gif":
            $tipoArchivo = "Imagen";
            break;
        case "jpg":
            $tipoArchivo = "Imagen";
            break;
        case "jpeg":
            $tipoArchivo = "Imagen";
            break;
        case "png":
            $tipoArchivo = "Imagen";
            break;
        case "tif":
            $tipoArchivo = "Imagen";
            break;
        case "tiff":
            $tipoArchivo = "Imagen";
            break;
        case "jfif":
            $tipoArchivo = "Imagen";
            break;
        case "zip":
            $tipoArchivo = "Winzip";
            break;
        case "rar":
            $tipoArchivo = "Winrar";
            break;
        default:
            break;
    }
    return $tipoArchivo;
}

function tipoDoc($doc)
{
    $tipoDoc = 'Sin Información';
    switch ($doc) {
        case "Boleta de Honorarios":
            $tipoDoc = "BH";
            break;

        case "Boleta de Honorario":
            $tipoDoc = "BH";
            break;

        case "Factura de Compra":
            $tipoDoc = "FC";
            break;

        case "Contrato Compra Venta Notarial":
            $tipoDoc = "CN";
            break;

        case "Formulario 29 SII":
            $tipoDoc = "F29";
            break;

        case "Otro":
            $tipoDoc = "OT";
            break;

        case "Nota de Crédito":
            $tipoDoc = "NC";
            break;

        case "Factura Electrónica":
            $tipoDoc = "FE";
            break;

        case "Factura Exenta Electrónica":
            $tipoDoc = "FEE";
            break;

        case "Liquidación de Sueldo":
            $tipoDoc = "LS";
            break;

        case "Recibo de Arriendo":
            $tipoDoc = "RA";
            break;

        case "Comprobante Contable Ingreso":
            $tipoDoc = "CCI";
            break;

        case "Invoice u Otro Documento País de Origen":
            $tipoDoc = "DPO";
            break;

        case "Boleta Electrónica":
            $tipoDoc = "BE";
            break;

        case "Fotografía Evaluación":
            $tipoDoc = "Fotografía_Evaluación";
            break;

        case "Fotografía Formalización":
            $tipoDoc = "Fotografía_Formalización";
            break;
        case "Fotografía Adquisición":
            $tipoDoc = "Fotografía_Adquisición";
            break;
        case "Fotografía Seguimiento":
            $tipoDoc = "Fotografía_Seguimiento";
            break;
        case "Contrato de Ejecución":
            $tipoDoc = "Contrato";
            break;

        case "Plan de Inversión":
            $tipoDoc = "Plan_Inversión";
            break;
        case "Solicitud Modificación Plan de Inversión":
            $tipoDoc = "Solicitud_Modificación_Plan";
            break;

        case "Respuesta Modificación Plan de Inversión":
            $tipoDoc = "Respuesta_Modificación_Plan";
            break;

        case "Solicitud Ampliación Plazo de Ejecución":
            $tipoDoc = "Solicitud_Ampliación_Plazo";
            break;

        case "Respuesta Ampliación Plazo de Ejecución":
            $tipoDoc = "Respuesta_Ampliación_Plazo";
            break;

        case "Acta de Asesoría":
            $tipoDoc = "Acta_Asesoría";
            break;

        case "Informe de Cierre":
            $tipoDoc = "Informe_Cierre";
            break;

        case "Aporte Empresarial":
            $tipoDoc = "Aporte_Empresarial";
            break;

        case "Solicitud Renuncia IVA":
            $tipoDoc = "Solicitud_Renuncia_IVA";
            break;

        case "Respuesta Renuncia IVA":
            $tipoDoc = "Respuesta_Renuncia_IVA";
            break;

        case "F29 Valida Exención IVA":
            $tipoDoc = "F29_Valida_Exención_IVA";
            break;

        case "Solicitud Compra Bien Usado":
            $tipoDoc = "Solicitud_Compra_Bien_Usado";
            break;

        case "Respuesta Compra Bien Usado":
            $tipoDoc = "Respuesta_Compra_Bien_Usado";
            break;

        default:
            break;
    }
    return $tipoDoc;
}
