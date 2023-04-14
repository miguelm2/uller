<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/DiagnosticoDTO.php';

class Diagnostico extends System
{
    public static function newDiagnostico($id_ticket, $numero_horas, $numero_ayudantes, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Diagnostico (id_ticket, numero_horas, numero_ayudantes, descripcion, fecha_registro) 
                                VALUES (:id_ticket, :numero_horas, :numero_ayudantes, :descripcion, :fecha_registro)");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':numero_horas', $numero_horas);
        $stmt->bindParam(':numero_ayudantes', $numero_ayudantes);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setDiagnostico($id_diagnostico, $numero_horas, $numero_ayudantes, $descripcion)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Diagnostico SET numero_horas = :numero_horas, numero_ayudantes = :numero_ayudantes, descripcion = :descripcion WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':numero_horas', $numero_horas);
        $stmt->bindParam(':numero_ayudantes', $numero_ayudantes);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }

    public static function setPrecioDiagnostico($id_diagnostico, $precio)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Diagnostico SET precio = :precio WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':precio', $precio);
        return  $stmt->execute();
    }

    public static function getLastDiagnostico()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_diagnostico FROM Diagnostico ORDER BY id_diagnostico DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch();

        return $result['id_diagnostico'];
    }

    public static function getDiagnosticoById($id_diagnostico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Diagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $diagnosticoDTO = new DiagnosticoDTO();

            $diagnosticoDTO->setId_diagnostico($result['id_diagnostico']);
            $diagnosticoDTO->setId_ticket($result['id_ticket']);
            $diagnosticoDTO->setNumero_horas($result['numero_horas']);
            $diagnosticoDTO->setNumero_ayudantes($result['numero_ayudantes']);
            $diagnosticoDTO->setDescripcion($result['descripcion']);
            $diagnosticoDTO->setPrecio($result['precio']);
            $diagnosticoDTO->setFecha_registro($result['fecha_registro']);
            $diagnosticoDTO->setLstHerramientas(HerramientaDiagnostico::listHerramientaDiagnosticoById($result['id_diagnostico']));
            $diagnosticoDTO->setLstMateriales(MaterialDiagnostico::listMaterialDiagnosticoById($result['id_diagnostico']));

            return $diagnosticoDTO;
        }
        return null;
    }

    public static function getDiagnosticoByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Diagnostico WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $diagnosticoDTO = new DiagnosticoDTO();

            $diagnosticoDTO->setId_diagnostico($result['id_diagnostico']);
            $diagnosticoDTO->setId_ticket($result['id_ticket']);
            $diagnosticoDTO->setNumero_horas($result['numero_horas']);
            $diagnosticoDTO->setNumero_ayudantes($result['numero_ayudantes']);
            $diagnosticoDTO->setDescripcion($result['descripcion']);
            $diagnosticoDTO->setPrecio($result['precio']);
            $diagnosticoDTO->setFecha_registro($result['fecha_registro']);
            $diagnosticoDTO->setLstHerramientas(HerramientaDiagnostico::listHerramientaDiagnosticoById($result['id_diagnostico']));
            $diagnosticoDTO->setLstMateriales(MaterialDiagnostico::listMaterialDiagnosticoById($result['id_diagnostico']));

            return $diagnosticoDTO;
        }
        return null;
    }

    public static function deleteComponenteDiagnostico($tabla, $campo, $id)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ".$tabla." WHERE ".$campo." = :".$campo."");
        $stmt->bindParam(':'.$campo.'', $id);
        return  $stmt->execute();
    }

    public static function getCountDiagnosticoByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_diagnostico) AS total FROM Diagnostico WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['total'];
    }

    public static function getCountDiagnosticoCotizadoByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(d.id_diagnostico) AS total FROM Diagnostico AS d, Ticket AS t 
                                WHERE d.id_ticket = :id_ticket AND d.id_ticket = t.id_ticket AND t.estado = '4'");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['total'];
    }

    public static function getIdDiagnosticoByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_diagnostico AS id FROM Diagnostico WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['id'];
    }

    public static function deleteDiagnostico($id_diagnostico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Diagnostico WHERE id_diagnostico = :id_diagnostico ");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        return  $stmt->execute();
    }
}
?>