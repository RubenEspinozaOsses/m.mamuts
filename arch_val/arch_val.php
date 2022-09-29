<?php

function tipo_arc($grupo) {
    $tipo_grupo = '';
    if ($grupo == 1) {
        $tipo_grupo = "Documento Contable";
    }
    if ($grupo == 2) {
        $tipo_grupo = "Validador";
    }
    if ($grupo == 3) {
        $tipo_grupo = "Acta Recepción";
    }
    if ($grupo == "fot") {
        $tipo_grupo = "Fotografía";
    }
    if ($grupo == "fot-1") {
        $tipo_grupo = "Fotografía Evaluación";
    }
    if ($grupo == "fot-2") {
        $tipo_grupo = "Fotografía Formalización";
    }
    if ($grupo == "fot-3") {
        $tipo_grupo = "Fotografía Adquisición";
    }
    if ($grupo == "fot-4") {
        $tipo_grupo = "Fotografía Seguimiento";
    }
    if ($grupo == "doc") {
        $tipo_grupo = "Documento Ejecución";
    }
    if ($grupo == "doc-1") {
        $tipo_grupo = "Contrato de Ejecución";
    }
    if ($grupo == "doc-2") {
        $tipo_grupo = "Plan de Inversión";
    }
    if ($grupo == "doc-3") {
        $tipo_grupo = "Solicitud Modificación Plan de Inversión";
    }
    if ($grupo == "doc-4") {
        $tipo_grupo = "Respuesta Modificación Plan de Inversión";
    }
    if ($grupo == "doc-5") {
        $tipo_grupo = "Solicitud Ampliación Plazo de Ejecución";
    }
    if ($grupo == "doc-6") {
        $tipo_grupo = "Respuesta Ampliación Plazo de Ejecución";
    }
    if ($grupo == "doc-7") {
        $tipo_grupo = "Acta de Asesoría";
    }
    if ($grupo == "doc-8") {
        $tipo_grupo = "Informe de Cierre";
    }
    if ($grupo == "doc-9") {
        $tipo_grupo = "Aporte Empresarial";
    }
    if ($grupo == "doc-10") {
        $tipo_grupo = "Solicitud Renuncia IVA";
    }
    if ($grupo == "doc-11") {
        $tipo_grupo = "Respuesta Renuncia IVA";
    }
    if ($grupo == "doc-12") {
        $tipo_grupo = "F29 Valida Exención IVA";
    }
    if ($grupo == "doc-13") {
        $tipo_grupo = "Solicitud Compra Bien Usado";
    }
    if ($grupo == "doc-14") {
        $tipo_grupo = "Respuesta Compra Bien Usado";
    }

    return $tipo_grupo;
}

function tipo_ext($extension_archivo) {

    $tipo_archivo = "Sin Información";
    $extension_archivo = strtolower($extension_archivo);

    if ($extension_archivo == "txt") {
        $tipo_archivo = "Texto Plano";
    }
    if ($extension_archivo == "doc") {
        $tipo_archivo = "Procesador Word";
    }
    if ($extension_archivo == "docx") {
        $tipo_archivo = "Procesador Word";
    }
    if ($extension_archivo == "xls") {
        $tipo_archivo = "Hoja Cálculo Excel";
    }
    if ($extension_archivo == "xlsx") {
        $tipo_archivo = "Hoja Cálculo Excel";
    }
    if ($extension_archivo == "xlm") {
        $tipo_archivo = "Macro Excel";
    }
    if ($extension_archivo == "ppt") {
        $tipo_archivo = "Presentación Powerpoint";
    }
    if ($extension_archivo == "pptx") {
        $tipo_archivo = "Presentación Powerpoint";
    }
    if ($extension_archivo == "pps") {
        $tipo_archivo = "Presentación Powerpoint";
    }
    if ($extension_archivo == "pdf") {
        $tipo_archivo = "Adobe Acrobat";
    }
    if ($extension_archivo == "bmp") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "gif") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "jpg") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "jpeg") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "png") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "tif") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "tiff") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "jfif") {
        $tipo_archivo = "Imagen";
    }
    if ($extension_archivo == "zip") {
        $tipo_archivo = "Winzip";
    }
    if ($extension_archivo == "rar") {
        $tipo_archivo = "Winrar";
    }
    return $tipo_archivo;
}

function tipo_doc($doc) {
    $tipo_doc = 'Sin Información';
    if ($doc == "Boleta de Honorarios") {
        $tipo_doc = "BH";
    }
    if ($doc == "Boleta de Honorario") {
        $tipo_doc = "BH";
    }
    if ($doc == "Factura de Compra") {
        $tipo_doc = "FC";
    }
    if ($doc == "Contrato Compra Venta Notarial") {
        $tipo_doc = "CN";
    }
    if ($doc == "Formulario 29 SII") {
        $tipo_doc = "F29";
    }
    if ($doc == "Otro") {
        $tipo_doc = "OT";
    }
    if ($doc == "Nota de Crédito") {
        $tipo_doc = "NC";
    }
    if ($doc == "Factura Electrónica") {
        $tipo_doc = "FE";
    }
    if ($doc == "Factura Exenta Electrónica") {
        $tipo_doc = "FEE";
    }
    if ($doc == "Liquidación de Sueldo") {
        $tipo_doc = "LS";
    }
    if ($doc == "Recibo de Arriendo") {
        $tipo_doc = "RA";
    }
    if ($doc == "Comprobante Contable Ingreso") {
        $tipo_doc = "CCI";
    }
    if ($doc == "Invoice u Otro Documento País de Origen") {
        $tipo_doc = "DPO";
    }
    if ($doc == "Boleta Electrónica") {
        $tipo_doc = "BE";
    }
    if ($doc == "Fotografía Evaluación") {
        $tipo_doc = "Fotografía_Evaluación";
    }
    if ($doc == "Fotografía Formalización") {
        $tipo_doc = "Fotografía_Formalización";
    }
    if ($doc == "Fotografía Adquisición") {
        $tipo_doc = "Fotografía_Adquisición";
    }
    if ($doc == "Fotografía Seguimiento") {
        $tipo_doc = "Fotografía_Seguimiento";
    }
    if ($doc == "Contrato de Ejecución") {
        $tipo_doc = "Contrato";
    }
    if ($doc == "Plan de Inversión") {
        $tipo_doc = "Plan_Inversión";
    }
    if ($doc == "Solicitud Modificación Plan de Inversión") {
        $tipo_doc = "Solicitud_Modificación_Plan";
    }
    if ($doc == "Respuesta Modificación Plan de Inversión") {
        $tipo_doc = "Respuesta_Modificación_Plan";
    }
    if ($doc == "Solicitud Ampliación Plazo de Ejecución") {
        $tipo_doc = "Solicitud_Ampliación_Plazo";
    }
    if ($doc == "Respuesta Ampliación Plazo de Ejecución") {
        $tipo_doc = "Respuesta_Ampliación_Plazo";
    }
    if ($doc == "Acta de Asesoría") {
        $tipo_doc = "Acta_Asesoría";
    }
    if ($doc == "Informe de Cierre") {
        $tipo_doc = "Informe_Cierre";
    }
    if ($doc == "Aporte Empresarial") {
        $tipo_doc = "Aporte_Empresarial";
    }
    if ($doc == "Solicitud Renuncia IVA") {
        $tipo_doc = "Solicitud_Renuncia_IVA";
    }
    if ($doc == "Respuesta Renuncia IVA") {
        $tipo_doc = "Respuesta_Renuncia_IVA";
    }
    if ($doc == "F29 Valida Exención IVA") {
        $tipo_doc = "F29_Valida_Exención_IVA";
    }
    if ($doc == "Solicitud Compra Bien Usado") {
        $tipo_doc = "Solicitud_Compra_Bien_Usado";
    }
    if ($doc == "Respuesta Compra Bien Usado") {
        $tipo_doc = "Respuesta_Compra_Bien_Usado";
    }
    return $tipo_doc;
}
