<?php
class Alumnomdl
{
    public static function mdlObtenerAlumno()
    {
        try {
            $db = Conexion::getInstance();
            $stmt = $db->prepare("SELECT * FROM infoalumnos");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error en mdlMostrar: " . $e->getMessage());
            return [];
        }
    }

    public static function mdlGuardarAlumno($datos)
    {
        $db = Conexion::getInstance();
        $stmt = $db->prepare("INSERT INTO infoalumnos (Matricula, Nom, App, Apm, Grup, TutorCel, CelAlum) 
                                                  VALUES (:Matricula, :Nom, :App, :Apm, :Grup,  :TutorCel, :CelAlum)");
        $stmt->bindParam(":Matricula", $datos["Matricula"], PDO::PARAM_STR);
        $stmt->bindParam(":Nom", $datos["Nom"], PDO::PARAM_STR);
        $stmt->bindParam(":App", $datos["App"], PDO::PARAM_STR);
        $stmt->bindParam(":Apm", $datos["Apm"], PDO::PARAM_STR);
        $stmt->bindParam(":Grup", $datos["Grup"], PDO::PARAM_STR);
        $stmt->bindParam(":TutorCel", $datos["TutorCel"], PDO::PARAM_STR);
        $stmt->bindParam(":CelAlum", $datos["CelAlum"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "correcto";
        } else {
            return "error";
        }
    }


    public static function obtenerInfoAlumnoDesdeExcel($matricula)
    {
        $archivo_csv = 'Excel/Relacion definitiva 19-9-23.csv';

        if (($handle = fopen($archivo_csv, 'r')) !== false) {
            $columnas = fgetcsv($handle);

            var_dump('Columnas:', $columnas);

            $matriculaIndice = array_search('Matricula', $columnas);

            while (($fila = fgetcsv($handle)) !== false) {
                var_dump('Datos de la fila:', $fila);

                if ($matriculaIndice !== false && strcasecmp(trim($fila[$matriculaIndice]), trim($matricula)) === 0) {
                    fclose($handle);
                    return [
                        'Matricula' => $fila[$matriculaIndice],
                        'nombre' => $fila[array_search('Nombre', $columnas)],
                        'primer_apellido' => $fila[array_search('Primer apellido', $columnas)],
                        'segundo_apellido' => $fila[array_search('Segundo apellido', $columnas)],
                        'grupo_referente' => $fila[array_search('Grupo Referente', $columnas)],
                        'tutor_telefono' => $fila[array_search('Tutor telefono', $columnas)],
                        'tel_celular' => $fila[array_search('Tel Celular', $columnas)],
                    ];
                } else {
                    var_dump('Matrícula no coincide. Matrícula buscada:', $matricula, 'Matrícula actual:', trim($fila[$matriculaIndice]));
                }
            }

            fclose($handle);
        }

        return null;
    }



}

