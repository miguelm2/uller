<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TecnicoTicket.php';

class ServiceTechnician extends System
{

    //FUNCION PARA VALIDAR EL USUARIO QUE ACCEDE POR URL
    public static function validateSessionTechnician()
    {
        if ($_SESSION['tipo'] != 3) {
            parent::logout();
        }
    }

    public static function setProfile($nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta)
    {
        $nombre     = parent::limpiarString($nombre);
        $correo     = parent::limpiarString($correo);
        $telefono   = parent::limpiarString($telefono);
        $cedula     = parent::limpiarString($cedula);
        $fecha_nacimiento   = parent::limpiarString($fecha_nacimiento);
        $direccion          = parent::limpiarString($direccion);
        $ciudad             = parent::limpiarString($ciudad);
        $estado_civil       = parent::limpiarString($estado_civil);
        $numero_hijos       = parent::limpiarString($numero_hijos);
        $banco              = parent::limpiarString($banco);
        $tipo_cuenta        = parent::limpiarString($tipo_cuenta);
        $numero_cuenta      = parent::limpiarString($numero_cuenta);
        $id_tecnico = $_SESSION['id'];

        if (Tecnico::setTecnicoProfile($id_tecnico, $nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta)) {
            $tecnico = Tecnico::getTecnicoById($id_tecnico);
            $_SESSION['id']     =   $tecnico->getId_tecnico();
            $_SESSION['nombre'] =   $tecnico->getNombre();
            $_SESSION['correo'] =   $tecnico->getCorreo();
            $_SESSION['cedula'] =   $tecnico->getCedula();
            $_SESSION['telefono'] = $tecnico->getTelefono();
            $_SESSION['tipo']   =   $tecnico->getTipo();
            $_SESSION['fecha_registro'] = $tecnico->getFecha_registro();
            return  '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
        } else {
            return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
        }
    }

    public static function setPassProfile($pass, $newPass, $confirmPass)
    {
        $pass        = parent::limpiarString($pass);
        $newPass     = parent::limpiarString($newPass);
        $confirmPass = parent::limpiarString($confirmPass);

        try {
            $cedula     = $_SESSION['cedula'];
            $pass_hash  = parent::hash($pass);
            $result     = Tecnico::getTecnico($cedula, $pass_hash);

            if ($result) {
                $id_tecnico = $_SESSION['id'];
                $pass_hash  = parent::hash($newPass);
                $result     = Tecnico::setTecnicoPass($id_tecnico, $pass_hash);
                if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function newTechnician($nombre, $correo, $telefono, $cedula, $pass, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta)
    {
        $nombre             = parent::limpiarString($nombre);
        $correo             = parent::limpiarString($correo);
        $telefono           = parent::limpiarString($telefono);
        $cedula             = parent::limpiarString($cedula);
        $pass               = parent::limpiarString($pass);
        $fecha_nacimiento   = parent::limpiarString($fecha_nacimiento);
        $direccion          = parent::limpiarString($direccion);
        $ciudad             = parent::limpiarString($ciudad);
        $estado_civil       = parent::limpiarString($estado_civil);
        $numero_hijos       = parent::limpiarString($numero_hijos);
        $banco              = parent::limpiarString($banco);
        $tipo_cuenta        = parent::limpiarString($tipo_cuenta);
        $numero_cuenta      = parent::limpiarString($numero_cuenta);

        $pass_hash = parent::hash($pass);
        $estado = 1;
        $tipo = 3;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Tecnico::newTecnico($nombre, $correo, $telefono, $cedula, $pass_hash, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta, $estado, $tipo, $fecha_registro);
            if ($result) {
                return  '<script>swal("' . Constants::$TECHNICIAN_NEW . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setTechnician($id_tecnico, $nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta, $estado)
    {
        $id_tecnico         = parent::limpiarString($id_tecnico);
        $nombre             = parent::limpiarString($nombre);
        $correo             = parent::limpiarString($correo);
        $telefono           = parent::limpiarString($telefono);
        $cedula             = parent::limpiarString($cedula);
        $fecha_nacimiento   = parent::limpiarString($fecha_nacimiento);
        $direccion          = parent::limpiarString($direccion);
        $ciudad             = parent::limpiarString($ciudad);
        $estado_civil       = parent::limpiarString($estado_civil);
        $numero_hijos       = parent::limpiarString($numero_hijos);
        $banco              = parent::limpiarString($banco);
        $tipo_cuenta        = parent::limpiarString($tipo_cuenta);
        $numero_cuenta      = parent::limpiarString($numero_cuenta);
        $estado             = parent::limpiarString($estado);


        try {
            $result = Tecnico::setTecnico($id_tecnico, $nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta, $estado);
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

    public static function getPerfilTecnico()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users-profile.php' && $_SESSION['tipo'] == 3) {
                $id_tecnico = $_SESSION['id'];
                $result = Tecnico::getTecnicoById($id_tecnico);
                return $result;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteTechnician($id_tecnico)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);

        try {
            $validateTecnico = TecnicoTicket::getValidateTecnicoTicketByTecnico($id_tecnico);

            if (!$validateTecnico) {
                $result = Tecnico::deleteTecnico($id_tecnico);
                if ($result) header('Location:technicians?delete');
            } else {
                return  '<script>swal("El técnico no se puede eliminar", "Existen servicios asociados al técnico", "warning");</script>';
            }
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
        $tableHtml = "";

        $modelResponse = Tecnico::listTecnicosActivos();

        foreach ($modelResponse as $valor) {
            $tableHtml .= '<option value="' . $valor->getId_tecnico() . '">' . $valor->getNombre() . '</option>';
        }
        return $tableHtml;
    }

    public static function getSelectTechniciansById()
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";
            $id_tecnico = $_SESSION['id'];

            $modelResponse = Tecnico::listTecnicosActivosById($id_tecnico);

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_tecnico() . '">' . $valor->getNombre() . '</option>';
            }
            return $tableHtml;
        }
    }
}
