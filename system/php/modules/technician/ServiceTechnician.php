<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServiceTechnician extends System
{
    public static function newTechnician($nombre, $correo, $telefono, $cedula, $pass)
    {
        $nombre = parent::limpiarString($nombre);
        $correo = parent::limpiarString($correo);
        $telefono = parent::limpiarString($telefono);
        $cedula = parent::limpiarString($cedula);
        $pass = parent::limpiarString($pass);
        $pass_hash = parent::hash($pass);
        $estado = 1;
        $tipo = 3;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Tecnico::newTecnico($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $fecha_registro);
            if ($result) {
                return  '<script>swal("' . Constants::$TECHNICIAN_NEW . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setTechnician($id_tecnico, $nombre, $correo, $telefono, $cedula, $estado)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);
        $nombre     = parent::limpiarString($nombre);
        $correo     = parent::limpiarString($correo);
        $telefono   = parent::limpiarString($telefono);
        $cedula     = parent::limpiarString($cedula);
        $estado     = parent::limpiarString($estado);


        try {
            $result = Tecnico::setTecnico($id_tecnico, $nombre, $correo, $telefono, $cedula, $estado);
            if ($result) {
                return  '<script>swal("' . Constants::$TECHNICIAN_UPDATE . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    static function setPassTechnician($id_tecnico, $pass, $confirmPass)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);
        $pass = parent::limpiarString($pass);
        $confirmPass = parent::limpiarString($confirmPass);

        try {
            $pass_hash = parent::hash($pass);
            $result = Tecnico::setTecnicoPass($id_tecnico, $pass_hash);
            if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTechnician($id_tecnico)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);

        try {
            $modelResponse = Tecnico::getTecnicoById($id_tecnico);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteTechnician($id_tecnico)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);

        try {
            $result = Tecnico::deleteTecnico($id_tecnico);
            if ($result) header('Location:technicians?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableTechnicians()
    {
        if (basename($_SERVER['PHP_SELF']) == 'technicians.php') {
            $tableHtml = "";
            $modelResponse = Tecnico::listTecnicos();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                $tableHtml .= '<td>' . $valor->getTelefono() . '</td>';
                $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("technician", $valor->getId_tecnico()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getSelectTechnicians()
    {
        if (basename($_SERVER['PHP_SELF']) == 'tickets.php' || basename($_SERVER['PHP_SELF']) == 'ticket.php') {
            $tableHtml = "";

            $modelResponse = Tecnico::listTecnicosActivos();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_tecnico() . '">' . $valor->getNombre() . '</option>';
            }
            return $tableHtml;
        }
    }
}
